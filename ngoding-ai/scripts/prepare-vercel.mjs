import { readFile, writeFile, access } from 'node:fs/promises';

const root = new URL('../', import.meta.url);
await access(new URL('dist/index.html', root));
const config = JSON.parse(await readFile(new URL('vercel.json', root), 'utf8'));
const staticConfig = {
  version: 2,
  framework: null,
  buildCommand: null,
  outputDirectory: '.',
  rewrites: config.rewrites,
};
await writeFile(new URL('dist/vercel.json', root), JSON.stringify(staticConfig, null, 2) + '\n');
console.log('dist/ siap untuk Vercel: aset statis dan fallback route SPA.');
