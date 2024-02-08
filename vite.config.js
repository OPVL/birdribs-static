import { defineConfig } from 'vite'

import path from 'path'

export default defineConfig({
  root: path.resolve(__dirname, 'src'),
  build: {
    emptyOutDir: true,
    outDir: '../dist',
    minify: 'esbuild',
    sourcemap: true,
    target: 'es2015',
  },
  server: {
    port: 8082
  }
})