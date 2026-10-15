# Integrated account and pricing browser checks

**54 / 54 checks passed** against `http://127.0.0.1:5173`, using Python Playwright and a fresh headless `/usr/bin/chromium` browser. These checks use the real rendered application, event handlers, navigation, and localStorage.

- Sign-in/sign-up headings and links work. Switching modes now preserves the requested redirect; this was fixed during testing.
- Google buttons explain that the integration is unconfigured. The local demo creates the documented local identity and follows an internal pricing redirect.
- Guest pricing CTAs require sign-in with `/pricing` retained as the destination. Demo pricing CTAs show the explicit unavailable-payment notice.
- All three pricing periods show the reference Starter/Pro amounts, visual ordering, annual totals, and annual upload feature.
- External redirects `//evil.com`, `/\\evil.com`, `https://evil.com`, and a newline-obfuscated protocol-relative destination fall back to `/plan`.
- Malformed JSON, `null`, string, and numeric session data are treated as signed out by pricing. This validation was hardened during testing.
- When Storage API reads/writes throw SecurityError, sign-in displays a useful message and pricing still routes safely to sign-in.
- Sign-in, sign-up, and pricing all render in dark and light themes at 1440×1000 and 390×844 with no horizontal overflow.
- No uncaught browser page errors occurred in these checks.

Screenshots: [`account-local/`](./account-local/), twelve captures across three routes, two themes, and two viewports. Machine-readable results: [`account-local/results.json`](./account-local/results.json).

Visual review identified a missing shared-header logo (`/reference/logo.svg`) outside the account components. This was reported to the parent agent for repair. The initial header also accepted primitive stored session data; parent validation was recommended. These shared-shell issues do not change the component interaction checks above. Real Google authentication and payment processing are intentionally not connected and were not tested against external services.
