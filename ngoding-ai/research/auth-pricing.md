# Public account and pricing reference

Inspected `https://www.ngodingpakeai.com` using a separate Chromium page through the existing authenticated network proxy. All three public paths returned HTTP 200. No Google sign-in or payment was submitted.

## Sign in and sign up

- `/sign-in`: title “Sign in”, subtitle “Sign in to your account to continue”, outlined Google button “Sign in with Google”, and “Don't have an account? Sign up” linking `/sign-up`.
- `/sign-up`: title “Create account”, subtitle “Get started with your free account”, outlined Google button “Sign up with Google”, and “Already have an account? Sign in” linking `/sign-in`.
- No email/password inputs on either observed page. Desktop auth content is centered with a 384px button. Navy background, light text, muted subtitle, orange link.
- Both pages share the home header and footer. Those are supplied by the parent application.
- Local adaptation keeps the observed Google affordance, reports that Google is not configured on click, and adds a clearly marked local demo option. It never sends credentials to Google or impersonates an authenticated provider.
- Demo session: localStorage `ngoding-demo-user`, JSON `{ "name": "Pengguna Demo", "email": "demo@local.test" }`. Safe same-origin `redirect` destinations are supported; otherwise `/plan`.

## Pricing

`/pricing`: “Dua aplikasi Pro, satu pembayaran”, “Pilih paket kamu”, “Upgrade untuk AI premium dan fitur lebih.” Three periods, default “3 Bulan” with a “Hemat” badge. Reference period controls expose ARIA role `tab`.

| Period | Starter | Pro |
| --- | --- | --- |
| 1 Bulan | Rp 75k/bulan | Rp 149k/bulan, original Rp 200k, 25% OFF |
| 3 Bulan (default) | Rp 66k/bulan, original Rp 75k, 12% OFF; Rp 199.000/3 bulan | Rp 133k/bulan, original Rp 200k, 34% OFF; Rp 399.000/3 bulan |
| Tahunan | Rp 49k/bulan, original Rp 75k, 35% OFF; Rp 588.000/tahun | Rp 99k/bulan, original Rp 149k, 34% OFF; Rp 1.188.000/tahun |

Annual period orders Pro first, then Starter, with “Tahunan” appended to titles and buttons. Pro annual also includes “Upload gambar & dokumen referensi”. Bundle remains third for every period: Rp 199k/bulan, original Rp 248k/bulan, 20% OFF; “Paling Worth”. Bundle term note is shown for quarterly and annual periods.

Starter includes 5 PRD/month, 100 AI chats/month, Markdown download, and generated feature/task specs. Pro includes unlimited PRD/chats, Markdown download, direct Raf Dev support, and feature/task specs. Bundle also includes 1,000 Canvas AI credits and both applications' Pro subscriptions for 30 days, activated with the same Google email.

Clicking “Pilih Starter Tahunan” while signed out navigates to `/sign-in?redirect=%2Fpricing`. Local signed-out CTAs reproduce that route. Signed-in demo CTAs explicitly report that payments and subscription activation are not connected, and never create purchases.

## Visual evidence

Screenshots and raw DOM text/links are in [`account/`](./account/). Desktop viewport: 1440×1000. Mobile viewport: 390×844.

Observed computed styles: Open Sauce Sans, background rgb(10,17,40), text rgb(243,244,246), muted rgb(156,163,175), border rgb(44,50,70), accent rgb(255,92,32). Pricing heading is 48px; button text is 14–16px. Three pricing cards fit in approximately 1024px with 16px gaps; the bundle has an orange border and badge. The two square bundle artwork containers are empty in the loaded reference capture, so the reproduction retains those empty bordered containers.

## Scope and validation

Implemented components: `AuthPage({ mode: 'sign-in' | 'sign-up' })` and `PricingPage()`, isolated to `account-` class names and shared theme variables. No external authentication, real AI, payments, or subscription services are reproduced. TypeScript validation passes. Parent application performs integrated browser checks after routing/header/footer integration.
