# Integrated wizard browser checks

**35 / 35 runtime checks passed** using a fresh headless Chromium browser against `http://127.0.0.1:5173`. The test starts through the visible demo sign-in action and submits this exact idea through the new-project form:

> Aplikasi tracking laporan cash advance dengan foto struk/invoice, langsung tercatat dan foto sebagai lampiran laporan PDF.

Verified behavior:

- Demo login → new-project form → technology step routes successfully.
- Automatic technology mode is selected by default and explicitly identifies local template recommendations.
- Custom frontend/backend/database/deployment values persist across reload, switching to automatic and back, returning to the idea form and resubmitting the same draft, and returning from questions.
- Blank custom fields disable continuation.
- Questions start at 0/5 and block continuation. Text, single-choice, and multi-choice answers update completion.
- Single choice replaces the previous selection. Question three permits at most three choices; removing a choice unlocks the remaining choices.
- Custom “Lainnya” values are editable and persistent. Empty custom values do not count as completed.
- Skipping marks a question complete and survives reload. Resuming an unanswered question restores the completion guard; skipping and resuming an answered question preserves its selections.
- All answered or skipped questions enable continuation to the feature map.
- Technology and question screens have no horizontal overflow at desktop 1440×1000 or mobile 390×844.
- No uncaught browser page errors occurred.

During integration, the content column applied both shell padding and standalone step width reduction. A scoped `.wizard-shell > .wizard-step` rule restores the intended 672px desktop content width and removes the extra top margin.

Screenshots: [`local/wizard-tech.png`](./local/wizard-tech.png), [`local/wizard-questions.png`](./local/wizard-questions.png), [`local/wizard-tech-mobile.png`](./local/wizard-tech-mobile.png), [`local/wizard-questions-mobile.png`](./local/wizard-questions-mobile.png). Machine-readable results: [`local/wizard-results.json`](./local/wizard-results.json).

Stable test selectors: `#wizard-stack-frontend`, `#wizard-stack-backend`, `#wizard-stack-database`, `#wizard-stack-deployment`, `.wizard-tech-card`, `.wizard-question` (five sections), `.wizard-choice[aria-pressed="true"]`, `.wizard-question-skip`, `.wizard-question-progress`, `.wizard-other-answer`, `.wizard-step-next`, `.wizard-step-back`.

These checks validate local behavior, layout, and persistence. They do not establish access to or operation of the original application's authenticated backend or real AI services.
