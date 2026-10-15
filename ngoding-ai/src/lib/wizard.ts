import { generatePlan, loadPlans, savePlans } from './plans.ts';
export interface Stack { frontend:string; backend:string; database:string; deployment:string; }
export interface Feature { id:string; title:string; phase:number; subfeatures:string[]; }
export interface WizardDraft { id:string; idea:string; references:string[]; template:string; technologyMode:'auto'|'custom'; stack:Stack; answers:Record<string,string[]>; skipped:string[]; features:Feature[]; name:string; }
export interface Question { id:string; title:string; type:'text'|'single'|'multi'; choices?:string[]; }
const KEY='ngoding-plan-drafts-v1';
export const defaultStack:Stack={frontend:'React + TypeScript',backend:'Node.js',database:'PostgreSQL',deployment:'Docker'};
export function isExpenseIdea(idea:string){return /cash\s*advance|struk|invoice|pengeluaran|biaya/i.test(idea);}
export function questionsFor(idea:string):Question[]{
 const expense=isExpenseIdea(idea);
 return [
  {id:'audience',type:'text',title:'Ceritakan seseorang yang butuh aplikasi ini. Sekarang mereka ngapain buat ngatasi masalahnya?'},
  {id:'first',type:'single',title:'Saat pertama kali buka aplikasi ini, satu hal apa yang paling penting bisa langsung mereka selesaikan sebelum nutup aplikasi?',choices:expense?['Kirim foto struk','Isi laporan otomatis','Lihat daftar laporan','Daftar akun dulu']:['Buat data pertama','Lihat dashboard','Selesaikan tugas utama','Daftar akun dulu']},
  {id:'must',type:'multi',title:'Dari fitur-fitur ini, mana 3 yang paling wajib ada di aplikasi?',choices:expense?['Foto dari WhatsApp','Foto dari Telegram','Isi form otomatis','Foto jadi lampiran','Simpan riwayat laporan']:['Input data mudah','Dashboard ringkasan','Pencarian dan filter','Ekspor laporan','Simpan riwayat']},
  {id:'value',type:'multi',title:'Apa yang bikin aplikasi ini lebih enak dibanding cara mereka sekarang?',choices:['Hemat waktu','Gak perlu ngetik','Gak ada yang kelupaan','Rapi otomatis','Gampang dipakai']},
  {id:'return',type:'multi',title:'Apa yang bikin orang terus balik pakai aplikasi ini, bukan cuma coba sekali?',choices:expense?['Riwayat laporan lengkap','Rekap pengeluaran','Notifikasi persetujuan','Ekspor PDF kapan saja']:['Riwayat tersimpan','Ringkasan terbaru','Notifikasi penting','Kolaborasi tim']},
 ];
}
export function featuresFor(idea:string):Feature[]{
 const data:[string,number,string[]][]=isExpenseIdea(idea)?[
  ['Isi Laporan Otomatis',1,['Unggah Foto Bukti','Baca Isi Foto','Form Terisi Sendiri','Tinjau dan Koreksi']],
  ['Input via WhatsApp',2,['Hubungkan Nomor Chat','Kirim Foto dari Chat','Balasan Konfirmasi']],
  ['Lampiran Foto Laporan',2,['Galeri Lampiran','Lihat Foto Ukuran Besar','Simpan Permanen']],
  ['Daftar & Riwayat Laporan',2,['Daftar Semua Laporan','Cari & Filter','Detail Laporan','Ekspor PDF + Lampiran']],
  ['Rekap & Persetujuan',3,['Ringkasan Pengeluaran','Setujui atau Tolak','Catatan Revisi','Saldo Cash Advance']],
  ['Masuk & Hak Akses',3,['Masuk Akun','Lupa Sandi','Peran Pengguna','Akses Data per Peran']],
  ['Notifikasi & Pengingat',4,['Pemberitahuan Status','Pengingat Bukti Kurang','Atur Preferensi Kabar']],
 ]:[
  ['Alur Pengguna Utama',1,['Input Data','Validasi Input','Simpan dan Perbarui']],
  ['Dashboard Ringkasan',1,['Ringkasan Aktivitas','Indikator Utama','Kondisi Kosong']],
  ['Pengelolaan Data',2,['Daftar Data','Cari & Filter','Detail Data','Ekspor Laporan']],
  ['Masuk & Hak Akses',2,['Masuk Akun','Peran Pengguna','Atur Profil']],
  ['Notifikasi',3,['Pemberitahuan Status','Preferensi Kabar','Riwayat Aktivitas']],
 ];
 return data.map(([title,phase,subfeatures],i)=>({id:`feature-${i+1}`,title,phase,subfeatures}));
}
export function createDraft(idea:string,references:string[]=[],template=''):WizardDraft{
 if(idea.trim().length<15)throw new Error('Ide minimal 15 karakter.');
 const cash=isExpenseIdea(idea);
 return {id:crypto.randomUUID(),idea:idea.trim(),references,template,technologyMode:'auto',stack:{...defaultStack},answers:{},skipped:[],features:featuresFor(idea),name:cash?'Lapor Cash Advance':idea.trim().split(/\s+/).slice(0,5).join(' ').replace(/[.,:;!?]+$/,'')};
}
function readDrafts():WizardDraft[]{
 try{const data:unknown=JSON.parse(localStorage.getItem(KEY)||'[]');if(!Array.isArray(data))return[];return data.filter((d):d is WizardDraft=>d&&typeof d.id==='string'&&typeof d.idea==='string'&&typeof d.name==='string'&&Array.isArray(d.features)&&d.features.every((f:Feature)=>f&&typeof f.id==='string'&&typeof f.title==='string'&&Number.isInteger(f.phase)&&f.phase>0&&Array.isArray(f.subfeatures)&&f.subfeatures.every(s=>typeof s==='string'))&&d.stack&&['frontend','backend','database','deployment'].every(k=>typeof d.stack[k]==='string')&&d.answers&&typeof d.answers==='object'&&Object.values(d.answers).every(a=>Array.isArray(a)&&a.every(v=>typeof v==='string'))&&Array.isArray(d.skipped)&&d.skipped.every((s:unknown)=>typeof s==='string')&&Array.isArray(d.references)&&d.references.every((r:unknown)=>typeof r==='string')&&typeof d.template==='string'&&['auto','custom'].includes(d.technologyMode));}catch{return[];}
}
export function getDraft(id:string){return readDrafts().find(d=>d.id===id)||null;}
export function saveDraft(draft:WizardDraft){const all=readDrafts();localStorage.setItem(KEY,JSON.stringify([draft,...all.filter(d=>d.id!==draft.id)]));}
export function completeDraft(draft:WizardDraft){
 const plan=generatePlan({name:draft.name,idea:draft.idea,audience:draft.answers.audience?.join(' ')||'',platform:'Website responsif',features:draft.features.map(f=>f.title).join('\n')});
 plan.id=draft.id;
 const stack=Object.entries(draft.technologyMode==='auto'?defaultStack:draft.stack).map(([k,v])=>`- ${k}: ${v}`).join('\n');
 const answers=questionsFor(draft.idea).map(q=>`### ${q.title}\n${draft.skipped.includes(q.id)?'Dilewati oleh pengguna.':draft.answers[q.id]?.join(', ')||'Belum dijawab.'}`).join('\n\n');
 plan.documents.prd+=`\n## Preferensi teknologi\n${draft.technologyMode==='auto'?'Rekomendasi demo terstruktur, bukan analisis model AI.':'Pilihan pengguna.'}\n${stack}\n\n## Jawaban klarifikasi\n${answers}\n\n## Peta fitur dan subfitur\n${draft.features.map(f=>`### Fase ${f.phase}: ${f.title}\n${f.subfeatures.map(s=>'- '+s).join('\n')}`).join('\n\n')}\n`;
 if(isExpenseIdea(draft.idea)) plan.documents.prd+='\n## Persyaratan khusus bukti transaksi\n- Foto struk/invoice diunggah sebagai bukti, tanpa menganggap hasil OCR selalu benar.\n- Nominal, tanggal, merchant, dan kategori perlu ditinjau sebelum pencatatan laporan.\n- Pencatatan cash advance menghitung jumlah pengeluaran, sisa dana, dan status persetujuan.\n- Laporan PDF memuat rekap transaksi beserta foto struk/invoice sebagai lampiran.\n- Uji foto buram, struk ganda, nominal tidak terbaca, pembulatan mata uang, dan akses lampiran.\n';
 if(draft.references.length)plan.documents.prd+='\n## Referensi pengguna (belum diverifikasi)\n'+draft.references.map(r=>'- '+r).join('\n')+'\n';
 if(draft.template)plan.documents.prd+='\n## Template awal\n'+draft.template+'\n';
 savePlans([plan,...loadPlans().filter(p=>p.id!==plan.id)]);return plan;
}
