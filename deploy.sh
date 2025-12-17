#!/bin/bash

# Marinexa Shipping Website Deployment Script
# This script automates the deployment process for the Marinexa Shipping website

# Display banner
echo "======================================================"
echo "  Marinexa Shipping Website Deployment Script"
echo "  $(date)"
echo "======================================================"

# Check if running with correct permissions
if [ "$EUID" -ne 0 ]; then
  echo "Please run as root or with sudo"
  exit 1
fi

# Configuration
APP_DIR=$(pwd)
COMPOSER=$(which composer)
NPM=$(which npm)
PHP=$(which php)

echo "Deployment directory: $APP_DIR"

# 1. Update repository
echo -e "\n\n[1/8] Updating repository..."
git pull origin main || { echo "Failed to pull latest code"; exit 1; }

# 2. Install/update composer dependencies
echo -e "\n\n[2/8] Installing Composer dependencies..."
$COMPOSER install --no-interaction --optimize-autoloader --no-dev || { echo "Failed to install Composer dependencies"; exit 1; }

# 3. Install/update npm dependencies
echo -e "\n\n[3/8] Installing NPM dependencies..."
$NPM install || { echo "Failed to install NPM dependencies"; exit 1; }

# 4. Build frontend assets
echo -e "\n\n[4/8] Building frontend assets..."
$NPM run build || { echo "Failed to build frontend assets"; exit 1; }

# 5. Run database migrations
echo -e "\n\n[5/8] Running database migrations..."
$PHP artisan migrate --force || { echo "Failed to run database migrations"; exit 1; }

# 6. Clear and cache configurations
echo -e "\n\n[6/8] Optimizing application..."
$PHP artisan optimize:clear
$PHP artisan config:cache
$PHP artisan route:cache
$PHP artisan view:cache

# 7. Set proper permissions
echo -e "\n\n[7/8] Setting proper permissions..."
chown -R www-data:www-data $APP_DIR
chmod -R 755 $APP_DIR/storage
chmod -R 755 $APP_DIR/bootstrap/cache

# 8. Restart services
echo -e "\n\n[8/8] Restarting services..."
systemctl restart php8.1-fpm
systemctl restart nginx
systemctl restart redis-server

# Queue workers
echo -e "\n\nRestarting queue workers..."
$PHP artisan queue:restart

echo -e "\n\nDeployment completed successfully at $(date)"
echo "======================================================"

# Optional health check
echo -e "\nPerforming health check..."
HEALTH_STATUS=$(curl -s -o /dev/null -w "%{http_code}" http://localhost)
if [ "$HEALTH_STATUS" -eq 200 ]; then
  echo "Health check passed: Application is responding with HTTP 200"
else
  echo "Health check failed: Application returned HTTP $HEALTH_STATUS"
fi
