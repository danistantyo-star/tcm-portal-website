# Feature map

The graph layout is reconstructed from the user's supplied authenticated workflow screenshot and parent-provided visual observations: dark dotted-grid canvas; application root on left; seven planned feature nodes with phase badges in a middle column; subfeature cards on the right with three initially visible items and functional expansion. This component is a local editable graph; no production authenticated backend, model generation, synchronization, or protected API was observed or reproduced.

Graph data uses `Feature` from `src/lib/wizard.ts`. The parent owns wizard navigation and persistence. Feature drawer edits title, phase, and subfeatures and reports the updated array through `onChange`. Pan, zoom, fit-to-screen, subfeature expansion, drawer close and save all operate locally. The same graph transform applies to HTML nodes and SVG curves. Initial and resize fit use viewport dimensions and all nodes; mobile fit avoids horizontal document overflow. Local color tokens support light and dark themes.

The world layout allocates at least 180px plus 45px gap per feature row. Fit therefore starts near 55–60% on a 1000px-high desktop, matching the user's compact graph screenshot; zoom controls permit larger text when needed. Subfeature cards remain centered on branch connections when expanded.
