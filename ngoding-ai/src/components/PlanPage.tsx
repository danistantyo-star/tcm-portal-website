import { useEffect, useRef, useState } from 'react';
import type { FormEvent } from 'react';
import { exportDocument, generatePlan, loadPlans, savePlans } from '../lib/plans';
import type { Plan, PlanInput } from '../lib/plans';
import './plan.css';
import { createDraft, getDraft, saveDraft } from '../lib/wizard';

const initial: PlanInput = {name:'', idea:'', audience:'', platform:'Website responsif', features:''};
const examples = [
  {name:'Dashboard CRM',idea:'Aplikasi CRM untuk tim sales agar dapat mengelola prospek, mencatat aktivitas penjualan, dan memantau pipeline dalam satu dashboard.',features:'Kelola kontak dan prospek\nPipeline penjualan\nJadwal follow-up\nLaporan performa sales',audience:'Tim sales dan manajer penjualan'},
  {name:'Manajemen Tugas',idea:'Aplikasi manajemen tugas untuk tim kecil dengan papan Kanban, tenggat waktu, dan kolaborasi agar semua pekerjaan mudah dipantau.',features:'Papan Kanban\nPenugasan anggota\nTenggat waktu\nFilter status',audience:'Tim kecil dan freelancer'},
  {name:'Toko Online',idea:'Toko online untuk UMKM yang ingin menampilkan katalog produk, menerima pesanan, dan mengelola stok dari satu tempat.',features:'Katalog produk\nKeranjang belanja\nKelola pesanan\nManajemen stok',audience:'Pemilik UMKM dan pembeli'},
];
const labels = {prd:'PRD',tasks:'Task',roadmap:'Roadmap'};

function Markdown({text}:{text:string}) {
  return <div className="plan-markdown">{text.split('\n').map((line,i)=>{
    if (line.startsWith('### ')) return <h3 key={i}>{line.slice(4)}</h3>;
    if (line.startsWith('## ')) return <h2 key={i}>{line.slice(3)}</h2>;
    if (line.startsWith('# ')) return <h1 key={i}>{line.slice(2)}</h1>;
    if (line.startsWith('> ')) return <blockquote key={i}>{line.slice(2)}</blockquote>;
    if (line.startsWith('- [ ] ')) return <p className="plan-task-line" key={i}><span aria-hidden="true">□</span> {line.slice(6)}</p>;
    if (line.startsWith('- ')) return <p className="plan-bullet" key={i}>• {line.slice(2)}</p>;
    return line ? <p key={i}>{line}</p> : <div className="plan-spacer" key={i} />;
  })}</div>;
}
export function PlanWorkspace({initialPlan}: {initialPlan?: string}) {
  const [plans,setPlans] = useState<Plan[]>(loadPlans);
  const [active,setActive] = useState<string|null>(initialPlan || null);
  const [input,setInput] = useState<PlanInput>(initial);
  const [tab,setTab] = useState<'prd'|'tasks'|'roadmap'>('prd');
  const [editing,setEditing] = useState(false);
  const [draft,setDraft] = useState('');
  const [notice,setNotice] = useState('');
  const [error,setError] = useState('');
  const [deleting,setDeleting] = useState<string|null>(null);
  const modalRef = useRef<HTMLButtonElement>(null);
  const selected = plans.find(p=>p.id===active);
  useEffect(()=>{ if(deleting) modalRef.current?.focus(); },[deleting]);
  const persist = (next:Plan[]) => {
    try {savePlans(next);setPlans(next);return true;} catch {setError('Penyimpanan browser penuh atau tidak tersedia. Ekspor dokumenmu sebelum menutup halaman.');return false;}
  };
  const reset = () => { window.location.assign('/plan?flow=new'); };
  function submit(event:FormEvent) {
    event.preventDefault();setError('');
    try {const plan=generatePlan(input);if(persist([plan,...plans])){setActive(plan.id);setTab('prd');setNotice('Plan berhasil dibuat dan disimpan di browser ini.');}}
    catch(e){setError(e instanceof Error?e.message:'Plan tidak dapat dibuat.');}
  }
  async function copy() {
    if(!selected)return;
    try {await navigator.clipboard.writeText(selected.documents[tab]);setNotice('Dokumen disalin ke clipboard.');}
    catch{setError('Clipboard tidak tersedia. Gunakan Unduh .md untuk menyimpan dokumen.');}
  }
  return <main className="plan-page">
    <div className="plan-top"><div><span className="plan-eyebrow">DARI IDE JADI RENCANA</span><h1>Bikin Plan <span className="plan-demo-badge">Demo lokal</span></h1><p>Susun PRD, spesifikasi fitur, dan task untuk mulai membangun.</p></div><button className="primary-button" onClick={reset}>＋ Plan baru</button></div>
    <div className="plan-demo-note"><span aria-hidden="true">ⓘ</span><p>Mode demo: dokumen dibuat dari template terstruktur, tanpa memanggil model AI. Plan tersimpan di browser ini.</p></div>
    <div className="plan-layout"><aside className="plan-sidebar"><div className="plan-sidebar-title"><h2>Plan kamu</h2><span>{plans.length}</span></div>{plans.length===0?<p className="plan-empty-side">Belum ada plan.<br/>Mulai dari ide pertamamu.</p>:<ul>{plans.map(plan=><li key={plan.id}><button className={'plan-history '+(active===plan.id?'is-active':'')} onClick={()=>{setActive(plan.id);setEditing(false);setError('');setNotice('');}}><span className="plan-file-symbol">▤</span><span><strong>{plan.name}</strong><small>{new Date(plan.createdAt).toLocaleDateString('id-ID',{day:'numeric',month:'short',year:'numeric'})}</small></span></button><button className="plan-delete" onClick={()=>setDeleting(plan.id)} aria-label={'Hapus '+plan.name}>×</button></li>)}</ul>}<a className="plan-template-link" href="/templates">Mulai dengan template <span>↗</span></a></aside>
    <section className="plan-workspace" aria-label={selected?'Dokumen plan':'Ide produk'}>
      {selected ? <><div className="plan-document-header"><div><small>PLAN TERSIMPAN</small><h2>{selected.name}</h2></div><div className="plan-document-actions"><button className="secondary-button" onClick={copy}>Salin</button><button className="primary-button" onClick={()=>{exportDocument(selected.name,tab,selected.documents[tab]);setNotice('Dokumen diunduh sebagai Markdown.');}}>↓ Unduh .md</button></div></div>
      <div className="plan-document-bar"><div role="tablist" aria-label="Dokumen plan">{(['prd','tasks','roadmap'] as const).map(key=><button key={key} role="tab" id={'plan-tab-'+key} aria-controls="plan-panel" aria-selected={tab===key} onClick={()=>{setTab(key);setEditing(false);window.dispatchEvent(new CustomEvent('ngoding-plan-stage',{detail:key==='tasks'?2:1}));}}>{labels[key]}</button>)}</div><button className="plan-edit" onClick={()=>{setDraft(selected.documents[tab]);setEditing(!editing);}}>{editing?'Batal edit':'Edit dokumen'}</button></div>
      <div role="tabpanel" id="plan-panel" aria-labelledby={'plan-tab-'+tab}>{editing?<div className="plan-editor"><label className="visually-hidden" htmlFor="document-edit">Isi dokumen Markdown</label><textarea id="document-edit" value={draft} onChange={e=>setDraft(e.target.value)} spellCheck={false}/><button className="primary-button" onClick={()=>{if(persist(plans.map(p=>p.id===selected.id?{...p,documents:{...p.documents,[tab]:draft}}:p))){setEditing(false);setNotice('Perubahan dokumen tersimpan.');}}}>Simpan perubahan</button></div>:<Markdown text={selected.documents[tab]}/>}</div></>:
      <form className="plan-form" onSubmit={submit}><div className="plan-form-heading"><div className="plan-spark">✧</div><h2>Ceritakan idemu</h2><p>Mulai dari masalah yang ingin kamu selesaikan.</p></div><div className="plan-examples" aria-label="Contoh ide">{examples.map(example=><button key={example.name} type="button" onClick={()=>setInput({...initial,...example})}>{example.name} ↗</button>)}</div>
      <label htmlFor="project-name">Nama proyek <span>*</span></label><input id="project-name" value={input.name} onChange={e=>setInput({...input,name:e.target.value})} placeholder="Contoh: Dashboard CRM" minLength={2} maxLength={100} required/>
      <label htmlFor="project-idea">Apa yang ingin kamu buat? <span>*</span></label><textarea id="project-idea" value={input.idea} onChange={e=>setInput({...input,idea:e.target.value})} placeholder="Jelaskan ide, masalah, dan tujuan aplikasimu…" minLength={15} maxLength={5000} required rows={4}/><div className="plan-field-hint">Minimal 15 karakter <span>{input.idea.length}/5000</span></div>
      <div className="plan-form-row"><div><label htmlFor="project-audience">Target pengguna</label><input id="project-audience" value={input.audience} onChange={e=>setInput({...input,audience:e.target.value})} placeholder="Contoh: tim sales" maxLength={200}/></div><div><label htmlFor="project-platform">Platform</label><select id="project-platform" value={input.platform} onChange={e=>setInput({...input,platform:e.target.value})}><option>Website responsif</option><option>Aplikasi mobile</option><option>Website dan mobile</option><option>API / backend</option></select></div></div>
      <label htmlFor="project-features">Fitur utama <small>(opsional)</small></label><textarea id="project-features" value={input.features} onChange={e=>setInput({...input,features:e.target.value})} placeholder={'Kelola kontak\nPipeline penjualan\nLaporan performa'} maxLength={2000} rows={3}/><p className="plan-field-hint">Pisahkan tiap fitur dengan baris baru atau koma.</p><button className="primary-button plan-generate" type="submit">✧ Buat plan</button></form>}
    </section></div>
    <div className="plan-feedback" aria-live="polite" role="status">{notice}</div>{error&&<div className="plan-error" role="alert">{error}</div>}
    {deleting&&<div className="plan-modal-backdrop" onKeyDown={e=>{if(e.key==='Escape')setDeleting(null);if(e.key==='Tab'){e.preventDefault();const buttons=e.currentTarget.querySelectorAll('button');const other=document.activeElement===buttons[0]?buttons[1]:buttons[0];other?.focus();}}}><section className="plan-modal" role="dialog" aria-modal="true" aria-labelledby="delete-title"><h2 id="delete-title">Hapus plan?</h2><p>Dokumen plan ini akan dihapus dari browser. Ekspor terlebih dahulu jika masih dibutuhkan.</p><div><button ref={modalRef} className="secondary-button" onClick={()=>setDeleting(null)}>Batal</button><button className="primary-button" onClick={()=>{if(persist(plans.filter(p=>p.id!==deleting))){if(active===deleting)reset();setDeleting(null);setNotice('Plan telah dihapus.');}}}>Hapus plan</button></div></section></div>}
  </main>;
}

const analysisPrompt = `Analisis codebase proyek ini secara lokal. Jangan mengirim source code, kredensial, atau data pribadi ke layanan eksternal.\n\n1. Baca dokumentasi, struktur folder, dependency, dan entry point.\n2. Identifikasi tujuan produk, pengguna, fitur yang benar-benar ada, dan keterbatasan. Bedakan observasi dari asumsi.\n3. Simpan ringkasan sebagai plan-summary.json dengan bentuk:\n{\n  "name": "Nama proyek",\n  "idea": "Ringkasan tujuan dan perilaku aplikasi (minimal 15 karakter)",\n  "audience": "Target pengguna",\n  "platform": "Website responsif",\n  "features": "Fitur pertama\\nFitur kedua"\n}\n4. Tinjau file agar tidak mengandung rahasia. Impor file tersebut melalui tombol Impor ringkasan pada aplikasi lokal.\n\nTidak diperlukan token bootstrap, CLI pihak ketiga, atau sinkronisasi jaringan.`;

function DocMark({code=false}:{code?:boolean}) { return <span className={'flow-mark '+(code?'flow-mark-code':'')}><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" strokeWidth="1.6" aria-hidden="true">{code?<path d="m7 7-5 5 5 5m10-10 5 5-5 5m-4-14-2 22"/>:<><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8Z"/><path d="M14 2v6h6M8 13h6m-6 4h8"/></>}</svg></span>; }

export function PlanPage() {
  const query = new URLSearchParams(window.location.search);
  const flow = query.get('flow');
  const history = query.get('view') === 'history';
  const resumed=query.get('draft')?getDraft(query.get('draft')!):null;
  const [idea,setIdea] = useState(resumed?.idea || '');
  const [reference,setReference] = useState('');
  const [references,setReferences] = useState<string[]>(resumed?.references || []);
  const [modal,setModal] = useState<'reference'|'template'|'prompt'|null>(null);
  const [template,setTemplate] = useState(query.get('template') || resumed?.template || '');
  const [notice,setNotice] = useState('');
  const [error,setError] = useState('');
  const [created,setCreated] = useState<string|null>(null);
  const [expanded,setExpanded] = useState(false);
  const dialogClose = useRef<HTMLButtonElement>(null);
  useEffect(()=>{if(modal)dialogClose.current?.focus();},[modal]);
  function create(event:FormEvent) {
    event.preventDefault();setError('');
    try {
      const draft = resumed ? {...resumed,idea:idea.trim(),references,template} : createDraft(idea,references,template);
      if(draft.idea.length<15)throw new Error('Ide minimal 15 karakter.');
      saveDraft(draft);window.location.assign(`/plans/${draft.id}?step=2`);
    }catch(e){setError(e instanceof Error?e.message:'Plan tidak dapat disimpan.');}
  }
  async function copyPrompt() {try{await navigator.clipboard.writeText(analysisPrompt);setNotice('Prompt disalin. Tempel ke agent di folder proyekmu.');}catch{setError('Clipboard tidak tersedia. Perbesar prompt, lalu salin teksnya secara manual.');setExpanded(true);}}
  async function importSummary(file:File|undefined) {
    if(!file)return;
    try {
      if(file.size>100_000)throw new Error('Ukuran ringkasan maksimal 100 KB.');
      const data:unknown=JSON.parse(await file.text());
      if(!data||typeof data!=='object')throw new Error('Format JSON tidak valid.');
      const d=data as Record<string,unknown>;
      if(typeof d.name!=='string'||typeof d.idea!=='string')throw new Error('Ringkasan harus memiliki name dan idea berupa teks.');
      const plan=generatePlan({name:d.name,idea:d.idea,audience:typeof d.audience==='string'?d.audience:'',platform:typeof d.platform==='string'?d.platform:'Website responsif',features:typeof d.features==='string'?d.features:''});
      savePlans([plan,...loadPlans()]);window.history.replaceState(null,'','/plan?view=history');window.dispatchEvent(new CustomEvent('ngoding-plan-stage',{detail:1}));setCreated(plan.id);
    }catch(e){setError(e instanceof Error?e.message:'Ringkasan tidak dapat diimpor.');}
  }
  const previous=loadPlans();
  if(created) return <PlanWorkspace initialPlan={created}/>;
  if(history) return previous.length ? <PlanWorkspace initialPlan={previous[0].id}/> : <main className="flow-empty"><DocMark/><h1>Belum ada plan</h1><p>Plan yang kamu simpan akan muncul di sini.</p><a href="/plan?flow=new" className="primary-button">Buat plan pertama</a></main>;
  if(!flow) return <main className="flow-choose"><div className="flow-choice-inner"><h1>Mau mulai dari mana?</h1><div className="flow-choice-grid"><a href="/plan?flow=new" className="flow-choice-card"><div className="flow-choice-heading"><DocMark/><h2>Proyek baru</h2></div><p>Susun PRD, fitur, dan task dari idemu—dari nol atau dari template.</p><ol><li>Ide</li><li>PRD</li><li>Task</li></ol></a><a href="/plan?flow=existing" className="flow-choice-card"><div className="flow-choice-heading"><DocMark code/><h2>Proyek eksisting</h2></div><p>Hubungkan codebase untuk membuat PRD dan peta proyek.</p><ol><li>Copy prompt</li><li>Analisis codebase</li><li>Dokumentasi tersimpan</li></ol></a></div><a className="flow-history" href="/plan?view=history">◷&nbsp; Lihat plan sebelumnya</a></div></main>;
  return <main className={'flow-page '+(flow==='existing'?'flow-existing':'flow-new')}><div className="flow-heading"><h1>{flow==='existing'?'Proyek eksisting':'Mau bikin apa?'}<DocMark code={flow==='existing'}/></h1><p>{flow==='existing'?<>Buat dokumentasi dari codebase kamu, lalu lakukan planning<br className="flow-desktop"/> lanjutan di sini, atau buat <a className="flow-inline-link" href="/plan?flow=new">♧ proyek baru</a>.</>:<>Ubah Ide kamu menjadi rencana yang bisa dipahami<br className="flow-desktop"/> AI tools pilihanmu, atau mulai dari <a className="flow-inline-link" href="/plan?flow=existing">‹/› codebase anda</a></>}</p></div>
    {flow==='existing'?<section className="existing-card"><div className="existing-step"><span className="existing-number">1</span><div><h2>Salin prompt</h2><div className={'existing-prompt '+(expanded?'expanded':'')}><pre>{expanded?analysisPrompt:'Kamu akan menganalisis codebase repo ini secara lokal…\n…'}</pre><div><button className="icon-button" aria-label={expanded?'Perkecil prompt':'Perbesar prompt'} onClick={()=>setExpanded(!expanded)}>⛶</button><button className="primary-button" onClick={copyPrompt}>▢ Copy</button></div></div><p className="existing-caption">ⓘ Mode lokal: tanpa token bootstrap atau sinkronisasi ke server.</p></div></div><div className="existing-step"><span className="existing-number">2</span><div><h2>Buka agent di folder proyek</h2><p>Buka coding agent pilihanmu dari direktori proyek yang ingin dianalisis, lalu paste prompt tadi.</p><div className="existing-agents">{[['◎','Codex'],['✳','Claude Code'],['◧','OpenCode'],['Λ','Antigravity'],['R','Pi']].map(([mark,name])=><span key={name}><i>{mark}</i>{name}</span>)}</div></div></div><div className="existing-step existing-import"><span className="existing-number">3</span><div><h2>Impor ringkasan</h2><p>Pilih file plan-summary.json hasil analisis untuk menyusun PRD, task, dan roadmap.</p><label className="secondary-button" htmlFor="import-summary">↑ Impor ringkasan JSON</label><input id="import-summary" type="file" accept=".json,application/json" onChange={e=>importSummary(e.target.files?.[0])}/></div></div></section>:
    <form className="flow-idea-form" onSubmit={create}><label className="visually-hidden" htmlFor="idea-prompt">Ide aplikasi</label><textarea id="idea-prompt" value={idea} onChange={e=>setIdea(e.target.value)} placeholder={'Contoh: "Aplikasi tracking pengeluaran harian, bisa input lewat WhatsApp, ada dashboard ringkasan bulanan..."'} required minLength={15} maxLength={5000}/>{references.length>0&&<div className="flow-reference-tags">{references.map(r=><span key={r}>{new URL(r).hostname}<button type="button" aria-label={'Hapus referensi '+r} onClick={()=>setReferences(references.filter(v=>v!==r))}>×</button></span>)}</div>}{template&&<p className="flow-selected-template">Template: {template}<button type="button" onClick={()=>setTemplate('')} aria-label="Hapus template">×</button></p>}<div className="flow-input-toolbar"><div><button className="flow-chip" type="button" onClick={()=>setModal('reference')}>♧&nbsp; Referensi{references.length>0?' ('+references.length+')':''}</button><label className="flow-chip"><span aria-hidden="true">◎</span><select aria-label="Bahasa dokumen"><option>Bahasa Indonesia</option></select></label></div><div><button type="button" className="flow-template-button" onClick={()=>setModal('template')}><span>⬡</span> Template</button><button type="button" className="icon-button flow-microphone" aria-label="Input suara" onClick={()=>setNotice('Input suara belum tersedia di demo lokal. Ketik ide pada kolom di atas.')}>♩</button><button className="flow-submit" type="submit" aria-label="Buat PRD" disabled={idea.trim().length<15}>↑</button></div></div></form>}
    <div className="flow-feedback" aria-live="polite">{notice}</div>{error&&<p role="alert" className="flow-error">{error}</p>}
    <a className="flow-history" href="/plan?view=history">◷&nbsp; Lihat PRD sebelumnya</a>
    <p className="flow-mode-note">Demo lokal · {flow==='existing'?'Impor ringkasan dari agent; tidak mengakses repository secara otomatis.':'Dokumen berbasis template; belum terhubung ke model AI.'}</p>
    {modal&&<div className="plan-modal-backdrop" onKeyDown={e=>{if(e.key==='Escape')setModal(null);if(e.key==='Tab'){const focusables=e.currentTarget.querySelectorAll<HTMLElement>('button,input,a[href]');const first=focusables[0];const last=focusables[focusables.length-1];if(e.shiftKey&&document.activeElement===first){e.preventDefault();last?.focus();}else if(!e.shiftKey&&document.activeElement===last){e.preventDefault();first?.focus();}}}}><section className="plan-modal flow-modal" role="dialog" aria-modal="true" aria-labelledby="flow-modal-title"><button className="icon-button flow-modal-close" ref={dialogClose} aria-label="Tutup dialog" onClick={()=>setModal(null)}>×</button><h2 id="flow-modal-title">{modal==='reference'?'Tambahkan referensi':'Mulai dari template'}</h2>{modal==='reference'?<form onSubmit={e=>{e.preventDefault();try{const url=new URL(reference);if(!['http:','https:'].includes(url.protocol))throw new Error();setReferences([...new Set([...references,url.href])]);setReference('');setModal(null);setNotice('URL referensi disimpan. Kontennya belum diambil atau dianalisis.');}catch{setError('Masukkan URL http atau https yang valid.');}}}><label htmlFor="reference-url">URL website atau dokumentasi</label><input id="reference-url" type="url" placeholder="https://contoh.com" value={reference} onChange={e=>setReference(e.target.value)} required/><p>Referensi dicatat di PRD. Demo ini tidak mengambil isi website.</p><button className="primary-button">Tambahkan referensi</button></form>:<div className="flow-template-options">{['Saas Template','Starter Next JS','Starter Tanstack','Starter Monorepo'].map(name=><button key={name} className="secondary-button" onClick={()=>{setTemplate(name);setModal(null);}}><span>⬡</span>{name}<span>↗</span></button>)}</div>}</section></div>}
  </main>;
}
