# Template catalog and detail reconstruction

## Provenance
Ordinary Playwright inspection of public https://www.ngodingpakeai.com/templates and the four public detail pages, 2026-10-15 UTC. Connected a new independent tab through the existing browser CDP endpoint. This evidence is supplementary browser observation, not a REA capture. Parent task maintains its REA evidence separately. No account login, private data, purchase, or backend mutation was performed.

## Public behavior observed
- Catalog: responsive three columns at 1440px, two at 780px; orange action buttons and dark navy cards. Four templates: Saas Template (Rp 499.000 crossed out; discount 20%; Rp 399.000; 1 download), Starter Next JS (free; 128), Starter Tanstack (free; 26), Starter Monorepo (free; 19).
- Catalog `Lihat detail` and preview/title links navigate to their corresponding detail routes. Free cards expose public GitHub icon links.
- `Pakai template` opens a compact dialog anchored below the card action: `Mau mulai dari mana?`, `Bikin plan` / `Rencanakan fitur dari template ini.`, and `Prompt install` / `Pasang template lewat AI coding agent.`
- Guest Prompt install navigates to `/sign-in?redirect=%2Ftemplates%2F<slug>`. Guest Bikin plan navigates to `/sign-in?redirect=%2Fplan%3Fflow%3Dnew%26template%3D<slug>`.
- Detail: back link `Semua template`; version v0.1.2 paid, v0.1.0 free; tech badges; right purchase panel on wide screens. Guest button `Masuk untuk mulai` gates via sign-in with current detail route.
- All details have `Fitur` and `Cara mulai` tabs. Fitur explicitly says `Sudah ada di template`, `Fitur ini langsung jalan begitu proyek dibuat.`, and `Belum ada daftar fitur.` Cara mulai has four numbered instructions (computer prerequisite, prompt install, paste in empty folder, continue with planning).
- Paid detail has eight public screenshots, thumbnail selection, main-image enlargement, and position label. Free details have no gallery.

## Assets
Eight SaaS screenshots copied from public `/api/templates/assets/10a9835c-e17c-4f32-b1e1-a723a8d70be0/` responses to `public/reference/template-saas-0.png` through `template-saas-7.png`. Browser fetch used existing valid session proxy and CA trust. Tech and large template logo SVG paths copied from rendered public SVGs into prefixed local SVG files. Mayar icon copied from public `/icons/mayar.png`; download and enlargement icons approximate.

## Limits
Public guest behavior is observed. Authenticated template installation, paid checkout, generation, licensing and server-generated install prompts are unavailable without authorized credentials. Local demo authenticated free templates link to the observed real public repositories; paid selection explicitly reports unavailable local purchases instead of simulating a charge.
