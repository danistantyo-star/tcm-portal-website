import { readFile, writeFile, readdir, mkdir } from 'node:fs/promises';
import path from 'node:path';
import { fileURLToPath } from 'node:url';
const root=path.resolve(path.dirname(fileURLToPath(import.meta.url)),'..');
const dist=path.join(root,'dist');
const mime={'.svg':'image/svg+xml','.png':'image/png','.jpg':'image/jpeg','.woff2':'font/woff2','.webp':'image/webp'};
const assets={};
for(const name of await readdir(path.join(dist,'reference'))){
 const ext=path.extname(name);if(!mime[ext])continue;
 assets['/reference/'+name]=`data:${mime[ext]};base64,${(await readFile(path.join(dist,'reference',name))).toString('base64')}`;
}
const files=await readdir(path.join(dist,'assets'));
let css=(await Promise.all(files.filter(n=>n.endsWith('.css')).map(n=>readFile(path.join(dist,'assets',n),'utf8')))).join('\n');
css=css.replace(/url\(["']?(\/reference\/[^)"']+)["']?\)/g,(_,url)=>`url("${assets[url]||url}")`);
let js=(await Promise.all(files.filter(n=>n.endsWith('.js')).map(n=>readFile(path.join(dist,'assets',n),'utf8')))).join('\n');
js=js.replaceAll('window.location','window.__ngodingOfflineLocation').replaceAll('window.history.replaceState','window.__ngodingOfflineHistory.replaceState');
js=js.replace(/<\/script/gi,'<\\/script');
const bootstrap=`
const offlineAssets=${JSON.stringify(assets)};
const actualLocation=window.location;
function route(){const hash=actualLocation.hash;return new URL(hash.startsWith('#!')?hash.slice(2):'/', 'https://offline.local');}
function navigate(value,replace=false){const url=new URL(value,'https://offline.local');if(url.origin!=='https://offline.local'){actualLocation.assign(url.href);return;}const target=actualLocation.href.split('#')[0]+'#!'+url.pathname+url.search+url.hash;if(replace)actualLocation.replace(target);else actualLocation.assign(target);actualLocation.reload();}
window.__ngodingOfflineLocation={get pathname(){return route().pathname;},get search(){return route().search;},get origin(){return 'https://offline.local';},get protocol(){return 'https:';},get href(){return route().href;},set href(value){navigate(value);},assign(value){navigate(value);},replace(value){navigate(value,true);},reload(){actualLocation.reload();}};
window.__ngodingOfflineHistory={replaceState(state,title,url){const target=new URL(url,'https://offline.local');history.replaceState(state,title,actualLocation.href.split('#')[0]+'#!'+target.pathname+target.search);}};
document.addEventListener('click',e=>{const anchor=e.target.closest?.('a');if(!anchor)return;const href=anchor.getAttribute('href');if(href?.startsWith('/')&&!href.startsWith('//')){e.preventDefault();navigate(href);}else if(href?.startsWith('#')&&!href.startsWith('#!')){e.preventDefault();const target=document.getElementById(href.slice(1));target?.scrollIntoView();target?.focus();}},true);
const setAttribute=Element.prototype.setAttribute;
Element.prototype.setAttribute=function(name,value){if(this.tagName==='IMG'&&name==='src')value=offlineAssets[value]||value;return setAttribute.call(this,name,value);};
const descriptor=Object.getOwnPropertyDescriptor(HTMLImageElement.prototype,'src');
Object.defineProperty(HTMLImageElement.prototype,'src',{get:descriptor.get,set(value){descriptor.set.call(this,offlineAssets[value]||value);},configurable:true});
`;
const html=`<!doctype html><html lang="id"><head><meta charset="utf-8"><meta name="viewport" content="width=device-width,initial-scale=1"><meta name="theme-color" content="#0a1128"><title>Ngoding Pake AI — Demo lokal</title><link rel="icon" href="${assets['/reference/logo.svg']}"><style>${css}</style></head><body><div id="root"></div><script>${bootstrap.replace(/<\/script/gi,'<\\/script')}</script><script type="module">${js}</script></body></html>`;
const out=path.join(root,'downloads');await mkdir(out,{recursive:true});
await writeFile(path.join(out,'Ngoding-AI.html'),html);
console.log(`downloads/Ngoding-AI.html siap (${Math.round(Buffer.byteLength(html)/1024)} KB), tanpa server atau instalasi.`);
