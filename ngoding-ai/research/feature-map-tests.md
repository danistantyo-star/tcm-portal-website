# Feature map validation

Ordinary Playwright against shared local Vite server on 2026-10-15. This exercised the parent-integrated wizard, not an isolated component harness or a production backend.

- Started authenticated local demo, entered cash advance / receipt / invoice / PDF idea on `/plan?flow=new`, continued technology step 2, skipped all five clarification questions at step 3, reached feature map step 4.
- Seven feature branches and seven subfeature cards rendered. Expanded `Daftar & Riwayat Laporan`: `Ekspor PDF + Lampiran` appeared.
- Screenshot-matching default desktop fit was 57% at 1440×1000. Zoom increased to 69%; fit reset correctly. Pointer background drag changed graph translation.
- Edited report feature title to `Daftar & Riwayat Laporan PDF`, changed phase from 2 to 3, retained PDF export and added `Validasi Bukti Invoice`. Save changed the rendered node; reload preserved title, phase and subfeatures.
- Drawer keyboard focus loops: Tab from Save returned to Close; Shift+Tab from Close returned to Save. Escape closes and restores opener focus.
- Desktop 1440×1000 and mobile 390×844 have no horizontal document overflow. Light-mode root background resolves to white.
- Parent header Continue reached step 5 documents. PRD includes edited feature title, added subfeature, and the cash advance requirement for receipt/invoice photos and PDF attachments.
- No JavaScript page errors in the integrated flow.

Screenshots: `research/local/feature-map-desktop.png`, `research/local/feature-map-mobile.png`. They show an edited test draft. The local demo stores plans in browser storage; this is not live authentication or server synchronization.
