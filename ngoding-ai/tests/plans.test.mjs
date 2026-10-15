import test from 'node:test';
import assert from 'node:assert/strict';
import { generatePlan, loadPlans, savePlans, STORAGE_KEY } from '../src/lib/plans.ts';
const input = {name:'CRM Sales',idea:'Dashboard CRM yang mengelola pipeline dan kontak untuk tim sales.',audience:'Tim sales',platform:'Website responsif',features:'Kelola prospek\nPipeline penjualan'};
test('PRD, task, roadmap incorporate the actual idea, audience and selected features',()=>{
 const p=generatePlan(input);
 assert.match(p.documents.prd,/CRM Sales/);assert.match(p.documents.prd,/Tim sales/);assert.match(p.documents.prd,/Kelola prospek/);assert.match(p.documents.tasks,/\[ \] Rancang/);assert.match(p.documents.roadmap,/Pipeline penjualan/);
 assert.match(p.documents.prd,/Draf lokal berbasis template/);
 assert.equal(p.input.idea,input.idea);assert.ok(p.id);
});
test('invalid short ideas are rejected before generating documents',()=>{
 assert.throws(()=>generatePlan({...input,idea:'Singkat'}));assert.throws(()=>generatePlan({...input,name:'X'}));
});
test('feature input is split, trimmed and bounded to 20 meaningful requirements',()=>{
 const p=generatePlan({...input,features:Array.from({length:25},(_,i)=>`Fitur ${i}`).join(';')});
 assert.match(p.documents.prd,/Fitur 19/);assert.doesNotMatch(p.documents.prd,/Fitur 20/);
});
test('separate projects receive unique identities and generated content stays plain text',()=>{
 const a=generatePlan({...input,name:'<script>alert(1)</script>'}),b=generatePlan(input);
 assert.notEqual(a.id,b.id);assert.match(a.documents.prd,/<script>/);
});
test('saved plan and edited document survive loading, malformed stored rows are discarded',()=>{
 let memory='';Object.defineProperty(globalThis,'localStorage',{configurable:true,value:{getItem:()=>memory,setItem:(k,v)=>{assert.equal(k,STORAGE_KEY);memory=v;}}});
 const p=generatePlan(input);p.documents.prd+='\nCatatan revisi';savePlans([p]);assert.equal(loadPlans()[0].documents.prd,p.documents.prd);
 memory=JSON.stringify([p,{id:'broken',name:'Invalid',createdAt:'now',documents:{}}]);assert.equal(loadPlans().length,1);
 memory='{broken';assert.deepEqual(loadPlans(),[]);memory='{}';assert.deepEqual(loadPlans(),[]);
});
test('storage failures are surfaced on save and handled on read',()=>{
 Object.defineProperty(globalThis,'localStorage',{configurable:true,value:{getItem:()=>{throw Error('unavailable')},setItem:()=>{throw Error('quota')}}});
 assert.deepEqual(loadPlans(),[]);assert.throws(()=>savePlans([generatePlan(input)]),/quota/);
});

test('wizard persists technology and answers, and cash advance PRD includes receipt/PDF requirements',async()=>{
 const {createDraft,saveDraft,getDraft,completeDraft,questionsFor}=await import('../src/lib/wizard.ts');
 const memory=new Map();Object.defineProperty(globalThis,'localStorage',{configurable:true,value:{getItem:k=>memory.get(k)??null,setItem:(k,v)=>memory.set(k,v)}});
 const draft=createDraft('Aplikasi tracking cash advance dengan foto struk/invoice menjadi pencatatan laporan dan lampiran PDF.');
 draft.technologyMode='custom';draft.stack.frontend='Next.js';draft.answers.audience=['Staf lapangan yang merekap struk di Excel.'];draft.answers.must=['Isi form otomatis','Foto jadi lampiran'];
 saveDraft(draft);assert.equal(getDraft(draft.id).stack.frontend,'Next.js');assert.equal(questionsFor(draft.idea).length,5);
 const p=completeDraft(draft);assert.equal(p.id,draft.id);assert.match(p.documents.prd,/Next.js/);assert.match(p.documents.prd,/Staf lapangan/);assert.match(p.documents.prd,/PDF memuat rekap transaksi beserta foto/);assert.equal(loadPlans().length,1);
 completeDraft(draft);assert.equal(loadPlans().length,1,'regeneration replaces existing plan rather than duplicating it');
});
test('wizard rejects a corrupt graph draft instead of crashing the page',async()=>{
 const {getDraft}=await import('../src/lib/wizard.ts');
 Object.defineProperty(globalThis,'localStorage',{configurable:true,value:{getItem:()=>JSON.stringify([{id:'bad',name:'Bad',idea:'Corrupt draft',features:[{id:'1',title:'X',phase:'bad',subfeatures:[{}]}],stack:{},answers:{},skipped:[]}])}});
 assert.equal(getDraft('bad'),null);
});
