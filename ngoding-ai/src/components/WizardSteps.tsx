import type { WizardDraft, Question, Stack } from '../lib/wizard';
import { questionsFor } from '../lib/wizard';
import './wizard-steps.css';

type StepProps = {
  draft: WizardDraft;
  onChange: (draft: WizardDraft) => void;
  onContinue: () => void;
  onBack: () => void;
};

function SparkIcon() {
  return <svg viewBox="0 0 24 24" width="23" height="23" fill="none" stroke="currentColor" strokeWidth="1.5" aria-hidden="true"><path d="m12 3 2.4 6.6L21 12l-6.6 2.4L12 21l-2.4-6.6L3 12l6.6-2.4L12 3Z" /><path d="m19 2 .8 2.2L22 5l-2.2.8L19 8l-.8-2.2L16 5l2.2-.8L19 2Z" /></svg>;
}

function StepActions({ onBack, onContinue, disabled = false }: { onBack: () => void; onContinue: () => void; disabled?: boolean }) {
  return <div className="wizard-step-actions"><button type="button" className="wizard-step-back" onClick={onBack}><span aria-hidden="true">←</span> Kembali</button><button type="button" className="wizard-step-next" disabled={disabled} onClick={onContinue}>Lanjutkan <span aria-hidden="true">→</span></button></div>;
}

const stackFields: { key: keyof Stack; label: string; choices: string[] }[] = [
  { key: 'frontend', label: 'Frontend', choices: ['React + TypeScript', 'Next.js', 'Vue.js', 'Svelte', 'HTML + CSS + JavaScript'] },
  { key: 'backend', label: 'Backend', choices: ['Node.js', 'Next.js API Routes', 'Laravel', 'Python / FastAPI', 'Supabase', 'Tanpa backend'] },
  { key: 'database', label: 'Database', choices: ['PostgreSQL', 'MySQL', 'SQLite', 'MongoDB', 'Supabase', 'Tanpa database'] },
  { key: 'deployment', label: 'Deployment', choices: ['Docker', 'Vercel', 'Netlify', 'Railway', 'VPS'] },
];

export function TechnologyStep({ draft, onChange, onContinue, onBack }: StepProps) {
  const ready = draft.technologyMode === 'auto' || stackFields.every(field => draft.stack[field.key].trim().length > 0);
  return <main className="wizard-step wizard-technology">
    <h1>Preferensi teknologi</h1>
    <p className="wizard-step-subtitle">Udah punya pilihan tech stack, atau mau AI yang tentuin?</p>
    <div className="wizard-tech-options" role="group" aria-label="Pilihan teknologi">
      <button type="button" className={'wizard-tech-card ' + (draft.technologyMode === 'auto' ? 'wizard-tech-selected' : '')} aria-pressed={draft.technologyMode === 'auto'} onClick={() => onChange({ ...draft, technologyMode: 'auto' })}>
        <span className="wizard-tech-icon"><SparkIcon /></span><strong>Biarkan AI pilih</strong><span>AI rekomendasiin stack yang paling cocok buat project kamu</span><i className="wizard-tech-check" aria-hidden="true">{draft.technologyMode === 'auto' ? '✓' : ''}</i>
      </button>
      <button type="button" className={'wizard-tech-card ' + (draft.technologyMode === 'custom' ? 'wizard-tech-selected' : '')} aria-pressed={draft.technologyMode === 'custom'} onClick={() => onChange({ ...draft, technologyMode: 'custom' })}>
        <span className="wizard-tech-icon"><svg viewBox="0 0 24 24" width="23" height="23" fill="none" stroke="currentColor" strokeWidth="1.5" aria-hidden="true"><path d="m8 7-5 5 5 5m8-10 5 5-5 5m-3-13-2 19" /></svg></span><strong>Pilih sendiri</strong><span>Kamu tentuin teknologi yang mau dipakai</span><i className="wizard-tech-check" aria-hidden="true">{draft.technologyMode === 'custom' ? '✓' : ''}</i>
      </button>
    </div>
    {draft.technologyMode === 'custom' && <div className="wizard-stack-fields">{stackFields.map(field => <label key={field.key} htmlFor={'wizard-stack-' + field.key}><span>{field.label}</span><input id={'wizard-stack-' + field.key} list={'wizard-stack-choices-' + field.key} value={draft.stack[field.key]} maxLength={100} onChange={event => onChange({ ...draft, stack: { ...draft.stack, [field.key]: event.target.value } })} placeholder={'Pilih atau ketik ' + field.label.toLowerCase()} /><datalist id={'wizard-stack-choices-' + field.key}>{field.choices.map(choice => <option key={choice} value={choice} />)}</datalist></label>)}</div>}
    <p className="wizard-local-note">Demo lokal: pilihan otomatis menggunakan rekomendasi template, tanpa memanggil model AI.</p>
    <StepActions onBack={onBack} onContinue={onContinue} disabled={!ready} />
  </main>;
}

function isAnswered(question: Question, answers: string[]) {
  if (question.type === 'text') return Boolean(answers[0]?.trim());
  return answers.some(answer => answer.startsWith('Lainnya:') ? Boolean(answer.slice(8).trim()) : Boolean(answer.trim()));
}

export function QuestionsStep({ draft, onChange, onContinue, onBack }: StepProps) {
  const questions = questionsFor(draft.idea);
  const completed = questions.filter(question => draft.skipped.includes(question.id) || isAnswered(question, draft.answers[question.id] || [])).length;
  function answer(question: Question, values: string[]) {
    onChange({ ...draft, answers: { ...draft.answers, [question.id]: values }, skipped: draft.skipped.filter(id => id !== question.id) });
  }
  function toggleChoice(question: Question, choice: string) {
    const current = draft.answers[question.id] || [];
    const selected = current.includes(choice);
    if (question.type === 'single') answer(question, selected ? [] : [choice]);
    else if (selected) answer(question, current.filter(value => value !== choice));
    else if (question.id !== 'must' || current.length < 3) answer(question, [...current, choice]);
  }
  function toggleOther(question: Question) {
    const current = draft.answers[question.id] || [];
    const existing = current.some(value => value.startsWith('Lainnya:'));
    if (existing) answer(question, current.filter(value => !value.startsWith('Lainnya:')));
    else if (question.type === 'single') answer(question, ['Lainnya:']);
    else if (question.id !== 'must' || current.length < 3) answer(question, [...current, 'Lainnya:']);
  }
  return <main className="wizard-step wizard-questions">
    <div className="wizard-questions-heading"><div><h1>Beberapa pertanyaan</h1><p className="wizard-step-subtitle">Biar PRD-nya lebih akurat. Jawab semua pertanyaan di bawah.</p></div><span className="wizard-question-progress" aria-live="polite" aria-label={completed + ' dari ' + questions.length + ' pertanyaan selesai'}>{completed}/{questions.length}</span></div>
    <div className="wizard-questions-list">{questions.map((question, index) => {
      const values = draft.answers[question.id] || [];
      const skipped = draft.skipped.includes(question.id);
      const other = values.find(value => value.startsWith('Lainnya:'));
      const limitReached = question.id === 'must' && values.length >= 3;
      return <section key={question.id} className={'wizard-question ' + (skipped ? 'wizard-question-skipped' : '')} aria-labelledby={'wizard-question-' + question.id}>
        <div className="wizard-question-top"><h2 id={'wizard-question-' + question.id}><span>{index + 1}.</span> {question.title}</h2><button type="button" className="wizard-question-skip" aria-pressed={skipped} onClick={() => onChange({ ...draft, skipped: skipped ? draft.skipped.filter(id => id !== question.id) : [...draft.skipped, question.id] })}>{skipped ? 'Dilewati' : 'Lewati'}{skipped && <span aria-hidden="true"> ✓</span>}</button></div>
        {question.type === 'text' ? <textarea aria-labelledby={'wizard-question-' + question.id} rows={3} maxLength={3000} disabled={skipped} value={values[0] || ''} onChange={event => answer(question, [event.target.value])} placeholder="Ketik jawaban..." /> : <>
          <div className="wizard-choice-list" role="group" aria-labelledby={'wizard-question-' + question.id}>{question.choices?.map(choice => <button key={choice} type="button" className={'wizard-choice ' + (values.includes(choice) ? 'wizard-choice-selected' : '')} aria-pressed={values.includes(choice)} disabled={skipped || (limitReached && !values.includes(choice))} onClick={() => toggleChoice(question, choice)}>{choice}</button>)}<button type="button" className={'wizard-choice ' + (other !== undefined ? 'wizard-choice-selected' : '')} aria-pressed={other !== undefined} disabled={skipped || (limitReached && other === undefined)} onClick={() => toggleOther(question)}>Lainnya</button></div>
          {other !== undefined && <input className="wizard-other-answer" aria-label={'Jawaban lainnya untuk pertanyaan ' + (index + 1)} value={other.slice(8).trimStart()} disabled={skipped} onChange={event => answer(question, values.map(value => value.startsWith('Lainnya:') ? 'Lainnya:' + event.target.value : value))} maxLength={500} placeholder="Ketik jawaban lainnya..." />}
        </>}
      </section>;
    })}</div>
    <StepActions onBack={onBack} onContinue={onContinue} disabled={completed !== questions.length} />
  </main>;
}
