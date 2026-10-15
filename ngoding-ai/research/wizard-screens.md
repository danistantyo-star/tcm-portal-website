# Wizard steps 2–3: screenshot provenance and implementation

The requirements for these screens come from **screenshots supplied by the user**, relayed by the parent agent. They are not observations of authenticated reference pages in a browser. The original public site required Google authentication, which was not performed.

## Step 2 — Preferensi teknologi

The user-supplied reference specifies a left-aligned content column of approximately 672px, a 32px title, and the subtitle “Udah punya pilihan tech stack, atau mau AI yang tentuin?”. Two cards offer “Biarkan AI pilih” (selected by default, orange border and AI icon) and “Pilih sendiri”. Descriptions follow the screenshot wording. Back and “Lanjutkan” actions sit on opposite sides below.

The local implementation exposes editable frontend/backend/database/deployment fields for the custom choice. Values are controlled by the parent `WizardDraft`, preserving them when switching modes, navigating, or reloading through parent persistence. The automatic option explicitly uses a local recommendation template and does not call an AI model. All custom fields must contain a value before continuing.

## Step 3 — Beberapa pertanyaan

The user-supplied reference specifies the title “Beberapa pertanyaan”, subtitle “Biar PRD-nya lebih akurat. Jawab semua pertanyaan di bawah.”, right-aligned completion count, and five questions separated by borders. Question one uses a textarea; question two is single choice; the remaining questions are multiple choice. Pills use rounded borders and orange selected styling, with a custom “Lainnya” input. The third question permits at most three choices. Each question can be skipped and then shows “Dilewati”.

Question text and options come from the shared `questionsFor(draft.idea)` function. Answers and skipped IDs are controlled through the parent draft; skipped answers are retained when the user resumes that question. All five questions must be answered or skipped to enable “Lanjutkan”. Empty text and empty custom answers are not considered complete. Selecting a different single-choice answer replaces the old answer; multi-choice answers toggle independently.

Components are exported from `src/components/WizardSteps.tsx`, with isolated `wizard-` styles in `wizard-steps.css`. The parent owns routing, header, draft persistence, and subsequent steps. Integrated browser checks will follow after the parent connects these components.
