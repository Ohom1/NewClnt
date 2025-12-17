# Marinexa Shipping - Website & Lead Management System

![Marinexa Shipping](public/images/logo.png)

## About Marinexa Shipping

Marinexa Shipping Pvt Ltd is a global shipping and logistics company specializing in international cargo transportation, freight forwarding, and supply chain solutions. This repository contains the codebase for the company's website and integrated Lead Management System (LMS).

## Project Overview

The Marinexa Shipping Website & LMS is a comprehensive platform that combines:

1. **Public-Facing Website**: Modern, SEO-optimized business website showcasing the company's services, shipping routes, and allowing customers to request quotes.

2. **Lead Management System**: An integrated admin panel for managing customer inquiries, tracking leads through the sales pipeline, and automating customer communications.

## Features

### Public Website

- **Homepage**: Company introduction, services overview, quick quote form, and key selling points
- **Services Pages**: Detailed information about shipping services, with images and benefits
- **Routes Pages**: Information about popular shipping routes with transit times and details
- **Quote Request System**: Comprehensive form for customers to request shipping quotes
- **Responsive Design**: Mobile-first approach ensuring optimal viewing on all devices
- **SEO Optimization**: Meta tags, structured data, and performance optimizations

### Admin Panel / Lead Management System

- **Dashboard**: Overview of lead statistics, recent activities, and performance metrics
- **Lead Management**: Create, view, edit, and delete leads with full pipeline visibility
- **User Management**: Admin control over system users with role-based permissions
- **Email Integration**: Automated emails using Brevo (formerly Sendinblue) for customer communications
- **WhatsApp Integration**: Send WhatsApp notifications to customers about quote status
- **Reports & Analytics**: Performance reporting on lead conversion rates, sales pipeline, and user activity

## Technology Stack

- **Backend**: Laravel 10.x (PHP 8.x)
- **Frontend**: Blade Templates with Tailwind CSS
- **Database**: MySQL / MariaDB
- **Caching & Queue**: Redis
- **Mail Service**: Brevo API Integration
- **Messaging**: WhatsApp API Integration

## Installation

### Prerequisites

- PHP 8.1 or higher
- Composer
- Node.js & NPM
- MySQL/MariaDB
- Redis (optional, for queue and cache)

### Setup Instructions

1. **Clone the repository**

```bash
git clone https://github.com/your-organization/marinexa-shipping.git
cd marinexa-shipping
```

2. **Install dependencies**

```bash
composer install
npm install
```

3. **Environment configuration**

```bash
cp .env.example .env
php artisan key:generate
```

4. **Configure environment variables**

See `env-setup.md` for required environment variables, including database and API credentials.

5. **Database setup**

```bash
php artisan migrate --seed
```

6. **Build assets**

```bash
npm run dev
```

7. **Start the development server**

```bash
php artisan serve
```

## Usage

### Accessing the Website

Visit `http://localhost:8000` in your browser to view the public-facing website.

### Accessing the Admin Panel

1. Visit `http://localhost:8000/admin/login`
2. Use the default admin credentials:
   - Email: admin@marinexa.com
   - Password: password

**Important**: Change the default password immediately after your first login.

## System Architecture

- **MVC Pattern**: Following Laravel's Model-View-Controller architecture
- **Repository Pattern**: For data access abstraction
- **Service Layer**: For business logic separation
- **Queue Workers**: For handling email and WhatsApp notifications asynchronously
- **Scheduled Tasks**: For periodic lead follow-ups and system maintenance

## API Documentation

The system includes API endpoints for lead creation and webhook processing:

- `POST /api/leads`: Create a new lead programmatically
- `POST /api/webhooks/brevo`: Handle Brevo email events
- `POST /api/webhooks/whatsapp`: Handle WhatsApp message events

API authentication is done via API tokens, which can be generated in the admin panel.

## License

This project is proprietary and confidential. Unauthorized copying, distribution, or use is strictly prohibited.

© 2025 Marinexa Shipping Pvt Ltd. All Rights Reserved.
