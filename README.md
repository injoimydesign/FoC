# Flag Subscription Management Application

A Laravel-based flag subscription management system with Stripe payment integration for US and Military flag services. This application allows customers to subscribe to professional flag installation services for patriotic holidays.

## Features

- **Two Flag Types**: US Flags and Military Branch Flags (Army, Navy, Air Force, Marines)
- **Flexible Payment Options**: One-time payment or yearly subscription
- **Stripe Integration**: Secure payment processing with Stripe Checkout
- **Admin Dashboard**: Manage flags, events, subscriptions, and routes
- **Customer Dashboard**: View subscriptions, locations, and payment history
- **Holiday Management**: Track 5 major patriotic holidays throughout the year
- **Location Management**: Manage service locations with GPS coordinates
- **Route Planning**: Organize service routes for efficient flag installation
- **Discount System**: Automatic pricing discounts based on holiday progression

## Technology Stack

- **Framework**: Laravel 10.x
- **Database**: MySQL
- **Payment Gateway**: Stripe
- **Frontend**: Blade Templates, Tailwind CSS, Alpine.js
- **Authentication**: Laravel Breeze/Sanctum

## Database Schema

### Core Tables:
- `users` - Customer and admin accounts
- `flags` - Flag products (US and Military)
- `flag_events` - Patriotic holidays (Memorial Day, Flag Day, Independence Day, Labor Day, Veterans Day)
- `locations` - Customer service addresses
- `routes` - Service route organization
- `subscriptions` - Customer flag subscriptions
- `payments` - Payment transaction records

## Installation

### Prerequisites
- PHP 8.1 or higher
- MySQL 5.7 or higher
- Composer
- Node.js and NPM
- Stripe Account

### Step 1: Clone and Setup

```bash
# Navigate to the project directory
cd flag-subscription-app

# Install PHP dependencies
composer install

# Install NPM dependencies
npm install

# Copy environment file
cp .env.example .env

# Generate application key
php artisan key:generate
```

### Step 2: Database Configuration

Edit `.env` file with your MySQL credentials:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=flag_subscription
DB_USERNAME=your_username
DB_PASSWORD=your_password
```

### Step 3: Create Database

```bash
# Create the database
mysql -u root -p

# In MySQL prompt:
CREATE DATABASE flag_subscription;
exit;
```

### Step 4: Run Migrations and Seeders

```bash
# Run database migrations
php artisan migrate

# Seed the database with initial data
php artisan db:seed
```

This will create:
- Admin user: `admin@flagservice.com` / `password`
- Test customer: `customer@example.com` / `password`
- 5 flag types (1 US flag, 4 military flags)
- 5 patriotic holiday events

### Step 5: Stripe Configuration

Add your Stripe keys to `.env`:

```env
STRIPE_KEY=pk_test_your_publishable_key
STRIPE_SECRET=sk_test_your_secret_key
STRIPE_WEBHOOK_SECRET=whsec_your_webhook_secret
```

### Step 6: Build Frontend Assets

```bash
# Compile assets
npm run dev

# Or for production:
npm run build
```

### Step 7: Start the Application

```bash
# Start Laravel development server
php artisan serve
```

Visit: `http://localhost:8000`

## Default Credentials

**Admin Account:**
- Email: admin@flagservice.com
- Password: password

**Customer Account:**
- Email: customer@example.com
- Password: password

## Key Routes

### Public Routes
- `/` - Homepage
- `/flags` - Browse all flags
- `/flags/us-flags` - US flags only
- `/flags/military-flags` - Military flags only
- `/services` - Service information
- `/pricing` - Pricing information
- `/about` - About us
- `/contact` - Contact page

### Authenticated Routes
- `/dashboard` - Customer dashboard
- `/checkout` - Checkout page
- `/profile` - User profile

### Admin Routes
- `/admin/dashboard` - Admin dashboard
- `/admin/flags` - Flag management
- `/admin/flag-events` - Holiday event management
- `/admin/subscriptions` - Subscription management
- `/admin/routes` - Route management
- `/admin/users` - User management

## Payment Flow

1. Customer selects flag type (US or Military)
2. Chooses payment option:
   - **One-time payment**: Single flag installation
   - **Yearly subscription**: All 5 holidays (20% discount)
3. Enters address and customer information
4. Redirected to Stripe Checkout
5. Payment processed securely through Stripe
6. Subscription/order created in database
7. Customer receives confirmation

## Pricing Structure

- **US Flag**: $45 base price
- **Military Flags**: $50 base price
- **Processing Fee**: 2.9% + $0.30 (Stripe fee)
- **Yearly Subscription**: 20% discount on annual billing
- **Dynamic Discounting**: 15% off per holiday after the 2nd event (max 45%)

## Flag Events (Holidays)

1. **Memorial Day** (May 26, 2025)
2. **Flag Day** (June 14, 2025)
3. **Independence Day** (July 4, 2025)
4. **Labor Day** (September 1, 2025)
5. **Veterans Day** (November 11, 2025)

## API Integration

### Stripe Webhook Setup

1. Go to Stripe Dashboard → Developers → Webhooks
2. Add endpoint: `https://yourdomain.com/stripe/webhook`
3. Select events:
   - `checkout.session.completed`
   - `customer.subscription.created`
   - `customer.subscription.updated`
   - `customer.subscription.deleted`
   - `payment_intent.succeeded`
   - `payment_intent.payment_failed`

## Admin Features

- **Flag Management**: Create, edit, delete flag products
- **Event Management**: Manage holiday dates and descriptions
- **Subscription Overview**: View all active subscriptions
- **Route Planning**: Organize service locations into routes
- **User Management**: View customer accounts
- **Reports**: Generate revenue and subscription reports

## Customer Features

- **Browse Flags**: View US and military flag options
- **Flexible Payment**: One-time or subscription options
- **Location Management**: Save multiple service addresses
- **Subscription History**: View past and current subscriptions
- **Payment History**: Track all payments
- **Profile Management**: Update account information

## Security Features

- CSRF Protection
- Password Hashing (bcrypt)
- SQL Injection Prevention (Eloquent ORM)
- XSS Protection
- Secure Payment Processing (Stripe PCI Compliance)
- Role-Based Access Control

## Testing

```bash
# Run tests
php artisan test

# Run specific test
php artisan test --filter=FlagTest
```

## Deployment

### Production Checklist

1. Set `APP_ENV=production` in `.env`
2. Set `APP_DEBUG=false` in `.env`
3. Run `php artisan config:cache`
4. Run `php artisan route:cache`
5. Run `php artisan view:cache`
6. Set up proper database backups
7. Configure SSL certificate
8. Set up Stripe webhook in production
9. Configure email service (SMTP/Mailgun/SES)
10. Set up queue workers for background jobs

## Maintenance

### Database Backup
```bash
# Backup database
php artisan backup:run --only-db

# Restore from backup
mysql -u username -p flag_subscription < backup.sql
```

### Clear Cache
```bash
php artisan cache:clear
php artisan config:clear
php artisan route:clear
php artisan view:clear
```

## Support & Documentation

- Laravel Documentation: https://laravel.com/docs
- Stripe Documentation: https://stripe.com/docs
- Tailwind CSS: https://tailwindcss.com/docs

## License

This project is proprietary software. All rights reserved.

## Changelog

### Version 1.0.0 (Initial Release)
- Basic flag subscription management
- Stripe payment integration
- Admin dashboard
- Customer dashboard
- Location and route management
- 5 patriotic holiday tracking
- US and Military flag support

---

**Developed by**: [Your Company Name]
**Contact**: info@flagservice.com
**Website**: https://flagservice.com
