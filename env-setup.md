# Environment Setup for Marinexa Shipping Website

This document provides guidance on setting up the necessary environment variables for the Marinexa Shipping Website.

## Required Environment Variables

Copy these variables to your `.env` file and provide appropriate values:

```
# Application Settings
APP_NAME="Marinexa Shipping"
APP_ENV=local
APP_KEY=base64:your-app-key
APP_DEBUG=true
APP_URL=http://localhost:8000

# Database Configuration
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=marinexa
DB_USERNAME=root
DB_PASSWORD=

# Redis for Cache and Queue
REDIS_HOST=127.0.0.1
REDIS_PASSWORD=null
REDIS_PORT=6379
CACHE_DRIVER=redis
QUEUE_CONNECTION=redis

# Mail Configuration
MAIL_MAILER=smtp
MAIL_HOST=smtp.brevo.com
MAIL_PORT=587
MAIL_USERNAME=your-username
MAIL_PASSWORD=your-password
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS=info@marinexa.com
MAIL_FROM_NAME="${APP_NAME}"

# Brevo API Integration
BREVO_API_KEY=your-brevo-api-key
BREVO_WEBHOOK_SECRET=your-webhook-secret

# WhatsApp API Integration
WHATSAPP_API_URL=https://api.whatsapp-gateway.com
WHATSAPP_API_TOKEN=your-whatsapp-api-token
WHATSAPP_SENDER_NUMBER=+918800XXXXXX
WHATSAPP_WEBHOOK_SECRET=your-webhook-secret
```

## Setting Up Services

### Brevo Email Service

1. Sign up for a [Brevo account](https://www.brevo.com/)
2. Get your API key from the Brevo dashboard
3. Set up webhook endpoints in Brevo with your webhook secret for tracking email events

### WhatsApp API Integration

1. Register with a WhatsApp Business API provider
2. Set up your WhatsApp Business account and get API credentials
3. Configure webhook endpoints with your webhook secret for receiving incoming messages and delivery reports

## Local Development

For local development, you can use the following commands:

```bash
# Generate application key
php artisan key:generate

# Run database migrations
php artisan migrate

# Seed the database with sample data
php artisan db:seed

# Start the development server
php artisan serve
```

## Queue Processing

The application uses Redis queues for processing background tasks. Start the queue worker with:

```bash
php artisan queue:work
```

## Scheduled Tasks

The application uses Laravel's scheduler for periodic tasks. Set up a cron job to run:

```bash
* * * * * cd /path-to-project && php artisan schedule:run >> /dev/null 2>&1
```
