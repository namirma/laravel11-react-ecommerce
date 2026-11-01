# E-Commerce Backend — Laravel 11 API + Blade Admin

This directory is the backend of the `laravel11-react-ecommerce` monorepo.
The project overview, architecture diagram and full setup guide live in the
[repository root README](../README.md) — start there.

## What lives here

- **REST API** (`routes/api.php`): Sanctum-authenticated user, product,
  coupon, order and review endpoints. Product browsing endpoints are public;
  ordering, payment and reviews require authentication.
- **Blade admin panel** (`routes/web.php`, `resources/views/admin/`):
  login, dashboard, and CRUD for products, colors, sizes, coupons, orders
  and reviews. Served by the backend itself at `/`.
- **Stripe checkout** (`app/Http/Controllers/Api/OrderController.php`,
  `payOrderByStripe`): creates a Stripe PaymentIntent. It needs real test
  keys in `.env` (`STRIPE_KEY` / `STRIPE_SECRET`); without them, payment
  cannot complete.
- **Database**: migrations in `database/migrations/`, SQLite by default
  (see `.env.example`), MySQL optional. Seeders create an admin account
  only — there is no product seed data.

## Setup

```bash
composer install
cp .env.example .env
php artisan key:generate
php artisan migrate --seed
php artisan serve --port=8000
```

The React storefront in `../frontend/` talks to this API at
`http://localhost:8000/api` by default.
