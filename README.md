# Livewire Starter Kit

A type-safe Laravel Livewire starter kit with modern tooling and best practices.

## Features

- **Laravel 12** - The latest version of Laravel
- **Livewire 4** - Full-stack framework for Laravel
- **Flux UI** - Beautiful UI components for Livewire
- **Tailwind CSS 4** - Utility-first CSS framework
- **Type Safety** - 100% type coverage with PHPStan (level max)
- **Code Quality** - Laravel Pint, Rector, and Prettier for consistent code style
- **Testing** - Pest PHP with browser testing support
- **Dark Theme** - Modern dark UI with customizable accent colors

## Requirements

- PHP 8.4+
- Node.js 18+
- Composer

## Installation

```bash
composer create-project marekmiklusek/livewire-starter-kit --prefer-dist app-name
```

Navigate to the project directory and run the setup:

```bash
cd app-name
composer setup
```

## Development

Start the development server:

```bash
composer dev
```

This will concurrently run:
- Laravel development server
- Queue listener
- Vite for asset compilation

## Available Scripts

### Composer Scripts

| Command | Description |
|---------|-------------|
| `composer setup` | Install dependencies, generate key, run migrations, build assets |
| `composer dev` | Start development server with hot reload |
| `composer lint` | Run Rector, Pint, and Prettier to fix code style |
| `composer test` | Run all tests (type coverage, unit, lint, static analysis) |
| `composer test:unit` | Run Pest unit tests |
| `composer test:types` | Run PHPStan static analysis |
| `composer test:lint` | Check code style without fixing |
| `composer test:type-coverage` | Check type coverage (min 100%) |

### NPM Scripts

| Command | Description |
|---------|-------------|
| `npm run dev` | Start Vite development server |
| `npm run build` | Build assets for production |
| `npm run lint` | Format code with Prettier |

## Project Structure

```
app/
├── Actions/          # Single-action classes
├── Enums/            # PHP enums
├── Http/Controllers/ # HTTP controllers
├── Models/           # Eloquent models
├── Providers/        # Service providers
└── Services/         # Service classes

resources/views/
├── components/       # Livewire Volt components
│   ├── auth/         # Authentication pages
│   ├── ⚡dashboard    # Dashboard page
│   ├── ⚡profile      # Profile settings
│   └── ⚡sample       # Sample page
└── layouts/          # Layout templates

tests/
├── Browser/          # Browser tests (Pest Plugin Browser)
├── Feature/          # Feature tests
└── Unit/             # Unit tests
```

## Included Pages

- **Login** - User authentication
- **Register** - User registration
- **Dashboard** - Main dashboard with stats
- **Profile** - User profile settings
- **Sample** - Sample page with components

## Tech Stack

### Backend
- Laravel 12
- Livewire 4
- Flux UI

### Frontend
- Tailwind CSS 4
- Alpine.js
- Vite 7

### Development Tools
- PHPStan (level max)
- Laravel Pint
- Rector
- Pest PHP
- Prettier

## License

This project is open-sourced software licensed under the [MIT license](LICENSE).
