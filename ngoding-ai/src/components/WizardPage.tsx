import { useState } from 'react';
import { loadPlans } from '../lib/plans';
import { completeDraft, getDraft, saveDraft } from '../lib/wizard';
import type { Feature, WizardDraft } from '../lib/wizard';
import { TechnologyStep, QuestionsStep } from './WizardSteps';
import { FeatureMap } from './FeatureMap';
import { PlanWorkspace } from './PlanPage';
import './wizard.css';

function Stepper({step}:{step:number}) {
 return <nav className="wizard-stepper" aria-label="Tahapan plan">{['Ide','PRD','Task'].map((name,i)=><span key={name} className={(step<5?i===0:i===1)?'active':''}><i/>{name}</span>)}</nav>;
}
export function WizardPage({id}:{id:string}) {
 const [draft,setDraft]=useState(()=>getDraft(id));
 const [error,setError]=useState('');
 const raw=Number(new URLSearchParams(window.location.search).get('step')||2);
 const step=[2,3,4,5].includes(raw)?raw:2;
 if(!draft)return <main className="flow-empty"><h1>Plan tidak ditemukan</h1><p>Draf ini tidak tersedia di browser ini. Mulai dari ide baru.</p><a className="primary-button" href="/plan?flow=new">Buat plan baru</a></main>;
 function persist(next:WizardDraft){setDraft(next);try{saveDraft(next);setError('');return true;}catch{setError('Draf belum tersimpan. Penyimpanan browser penuh atau tidak tersedia.');return false;}}
 function go(next:number){if(draft&&persist(draft))window.location.assign(`/plans/${encodeURIComponent(id)}?step=${next}`);}
 function complete(){if(!draft)return;try{saveDraft(draft);completeDraft(draft);window.location.assign(`/plans/${encodeURIComponent(id)}?step=5`);}catch{setError('Dokumen tidak dapat disimpan. Periksa ruang penyimpanan browser.');}}
 const brand=<a className="brand" href="/" aria-label="ngodingpakeai — beranda"><img src="/reference/logo.svg" alt=""/><span>ngodingpakeai</span></a>;
 if(step===5&&!loadPlans().some(plan=>plan.id===id))return <main className="flow-empty"><h1>Dokumen belum disusun</h1><p>Tinjau peta fitur sebelum menyusun PRD dan task.</p><a className="primary-button" href={`/plans/${id}?step=4`}>Kembali ke peta fitur</a></main>;
 if(step===5)return <><header className="wizard-result-header">{brand}<Stepper step={5}/><a href="/plan?view=history" className="secondary-button">Semua plan</a></header><PlanWorkspace initialPlan={id}/></>;
 if(step===4)return <div className="wizard-map-shell"><header className="wizard-map-header">{brand}<span className="wizard-map-separator">·</span><button className="wizard-map-breadcrumb" onClick={()=>go(3)}>▱&nbsp; {draft.name}</button><span className="wizard-map-slash">/</span><strong>{draft.name}</strong><button className="primary-button" onClick={complete}>Lanjutkan&nbsp; ›</button></header>{error&&<p className="wizard-save-error" role="alert">{error}</p>}<FeatureMap name={draft.name} features={draft.features} onContinue={complete} onBack={()=>go(3)} onChange={(features:Feature[])=>persist({...draft,features})}/></div>;
 const props={draft,onChange:persist,onContinue:()=>go(step+1),onBack:()=>step===2?window.location.assign(`/plan?flow=new&draft=${encodeURIComponent(id)}`):go(2)};
 return <div className="wizard-shell"><header className="wizard-header">{brand}<Stepper step={step}/></header>{step===2?<TechnologyStep {...props}/>:<QuestionsStep {...props}/>}{step===3&&<p className="wizard-demo-note">Demo lokal · rekomendasi dan dokumen dibuat dari template terstruktur.</p>}{error&&<p className="wizard-save-error" role="alert">{error}</p>}</div>;
}
