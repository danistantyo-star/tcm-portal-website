# Template validation results

2026-10-15. Ordinary Playwright against shared Vite server http://127.0.0.1:5173, desktop 1440×1100 and mobile 390×844. These are local functional checks, not production/backend verification.

Passed:
- Four catalog cards render; all four detail routes render the matching title, version and stack.
- Guest catalog `Prompt install` navigates to `/sign-in?redirect=%2Ftemplates%2Fngodingpakeai-starter`.
- Guest catalog `Bikin plan` navigates to `/sign-in?redirect=%2Fplan%3Fflow%3Dnew%26template%3Dngodingpakeai-starter`.
- Chooser Escape closes the dialog; mobile chooser causes no horizontal document overflow.
- `Cara mulai` shows four numbered steps; `Fitur` restores observed empty-feature text.
- Paid gallery thumbnail 3 selects Screenshot 2 / position 3 of 8. Enlargement opens lightbox; ArrowRight moves to Screenshot 3 / position 4 of 8; Escape closes lightbox.
- Free detail routes have no gallery.
- Signed demo free detail points to the correct public GitHub repository. Paid action explicitly reports local purchases unavailable.
- Catalog and paid detail have no horizontal document overflow at 390px. Detail intrinsic sizing overflow found during testing was fixed by constraining page width and min-width.
- Light-mode toggle applies `data-theme=light`; template image assets load.
- No JS page errors in tested flows.
- `npm run typecheck` passes.

Separate shared-header issue reported to parent: `/reference/logo.svg` was absent during these checks. No template asset was broken.

Screenshots from validation are in /tmp/template-local-list.png, /tmp/template-local-detail.png, /tmp/template-local-mobile.png, /tmp/template-local-mobile-detail.png. They include the concurrent shared header state and are supplementary, not final acceptance captures.
