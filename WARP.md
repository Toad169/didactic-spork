# WARP.md

This file provides guidance to WARP (warp.dev) when working with code in this repository.

## Project Overview

This is a **Laravel 12 application** built as a financial management system with **Livewire** and **Filament** admin panels. The project appears to be a savings and transaction management system with role-based access control (admin, staff, user).

## Development Commands

### Initial Setup
```bash
composer install
npm install --save-dev concurrently
cp .env.example .env
php artisan key:generate
php artisan migrate
```

### Development Server
```bash
# Start all services (Laravel server, queue worker, Vite dev server)
composer run dev
```

**Note**: The `composer run dev` command uses `bun run dev` by default. If Bun is not installed, either:
1. Install Bun: https://bun.sh/docs/installation
2. Or modify the composer script to use `npm run dev` instead

### Individual Services
```bash
# Laravel development server
php artisan serve

# Queue worker
php artisan queue:listen --tries=1

# Asset compilation (development)
npm run dev
# or with Bun
bun run dev

# Asset compilation (production)
npm run build
```

### Testing
```bash
# Run all tests
composer run test
# or
php artisan test

# Run specific test types
./vendor/bin/phpunit tests/Unit
./vendor/bin/phpunit tests/Feature

# Browser tests with Dusk
php artisan dusk
```

### Code Quality
```bash
# Laravel Pint (code formatting)
./vendor/bin/pint

# Clear caches
php artisan config:clear
php artisan cache:clear
php artisan route:clear
php artisan view:clear
```

### Database Operations
```bash
# Fresh migration (development)
php artisan migrate:fresh

# Migration with seeding
php artisan migrate:fresh --seed

# Create admin user
php artisan make:user-admin

# Create staff user
php artisan make:user-staff
```

## Architecture Overview

### Core Stack
- **Backend**: Laravel 12 with Livewire 3
- **Admin Panels**: Filament 4 (dual panels: admin + staff)
- **Frontend**: Tailwind CSS 4, Vite, TypeScript
- **Authentication**: Laravel Sanctum
- **Queue**: Laravel Queue system
- **Monitoring**: Laravel Telescope, Laravel Pulse
- **Payments**: Laravel Cashier (Stripe integration)

### Multi-Panel Architecture

The application uses **dual Filament panels**:
- **Admin Panel**: `/admin` - Full system access
- **Staff Panel**: `/staff` - Limited administrative access

Both panels use the **Filament Awin Theme** and share similar configurations but with different resource discovery paths.

### Role-Based System

Three user roles with distinct permissions:
- **Admin**: Full system access, can manage all resources
- **Staff**: Limited administrative capabilities
- **User**: End-user access to their own data

### Domain Models

The application revolves around financial entities:
- **User**: Central entity with role-based access
- **Account**: User financial accounts
- **Saving**: Savings management
- **Transaction**: Financial transactions
- **Contract**: User agreements/contracts
- **Payment**: Payment processing (Cashier integration)
- **Fee**: System fees and charges
- **ProfitDistribution**: Profit sharing system
- **Zakat**: Islamic tax calculations
- **Profile**: Extended user information
- **AuditLog**: System activity tracking

### Service Layer Architecture

Each domain has a dedicated service class in `app/Services/`:
- Services handle business logic separate from controllers
- Controllers remain thin, delegating to services
- Services follow a consistent interface pattern

### Livewire Integration

- **Authentication**: Custom Livewire components for login/signin
- **Forms**: Livewire form components
- **Volt**: Laravel Volt for file-based Livewire components

### API Structure

The application supports both web and API routes with role-based middleware:
- Web routes use session-based authentication
- API routes likely use Sanctum tokens
- Role middleware: `role.admin`, `role.staff`, `role.user`

## Key Conventions

### File Organization
- **Controllers**: Thin controllers that delegate to services
- **Services**: Business logic layer in `app/Services/`
- **Filament Resources**: Split between admin and staff directories
- **Middleware**: Custom role-based middleware for access control

### Development Workflow
- The project includes **Laravel Telescope** for debugging
- **Laravel Pulse** for application monitoring  
- **Queue system** is integrated for background processing
- **Dusk** is configured for browser testing

### Asset Management
- **Tailwind CSS 4** with Vite plugin
- **TypeScript** support configured
- Custom theme integration with Filament Awin Theme
- Assets are processed through Vite with hot reloading

## Special Considerations

### Codacy Integration
The project includes Codacy MCP Server integration rules in `.github/copilot-instructions.md`. When editing files:
- Always run `codacy_cli_analyze` after file edits
- Check for security vulnerabilities when adding dependencies
- Follow the automated analysis workflow

### Environment Setup
- Uses **SQLite** for testing (in-memory)
- **Laragon** appears to be the local development environment
- **Bun** is preferred for frontend package management but **npm** works as fallback

### Testing Strategy
- PHPUnit configured for unit and feature tests
- Laravel Dusk for browser testing
- In-memory SQLite for fast test execution
- Telescope and Pulse disabled during testing

## Important Notes

- This is described as a "school project" and is still in development
- The application handles financial data, so security and audit logging are critical
- Role-based access control is fundamental to the application's security model
- The dual Filament panel setup allows for different administrative interfaces