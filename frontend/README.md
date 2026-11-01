# E-Commerce Frontend — React 18 + Vite Storefront

This directory is the React storefront of the `laravel11-react-ecommerce`
monorepo. The project overview and full setup guide live in the
[repository root README](../README.md) — start there.

## What lives here

- React 18 + Vite SPA with React Router, Redux Toolkit (`redux-persist`
  for cart/user state) and Bootstrap 5.
- Routes (`src/App.jsx`): home, product detail, cart, checkout, register,
  login, profile, user orders, Stripe payment (`/pay/order`) and a 404 page.
- Checkout uses Stripe Elements (`src/components/checkout/`). Card data
  is handled by Stripe, not stored by this app.
- API client (`src/helpers/config.js`): Axios instance pointed at the
  Laravel API. The base URL comes from `VITE_API_BASE_URL` and defaults
  to `http://localhost:8000/api`.

## Setup

```bash
npm install
npm run dev
```

Environment variables (see `.env.example`):

```bash
VITE_API_BASE_URL=http://localhost:8000/api
VITE_STRIPE_PUBLIC_KEY=pk_test_your_test_key_here
```

Without a real Stripe test publishable key, checkout cannot complete a
payment — the code falls back to a `pk_test_sample` placeholder, which is
not a working key. Lint with `npm run lint`; build with `npm run build`.
