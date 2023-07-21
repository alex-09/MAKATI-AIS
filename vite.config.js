<<<<<<< HEAD
import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js'],
            refresh: true,
        }),
    ],
});
=======
import { fileURLToPath, URL } from 'node:url'

import { defineConfig } from 'vite'
import vue from '@vitejs/plugin-vue'

// VITE PWA
import { VitePWA } from 'vite-plugin-pwa'
// CORS
import cors from 'cors';

// https://vitejs.dev/config/
export default defineConfig({
  plugins: [vue(),
  VitePWA({ registerType: 'autoUpdate' })],
  resolve: {
    alias: {
      '@': fileURLToPath(new URL('./src', import.meta.url))
    }
  },
  server: {
      // host: "127.0.0.14",
      // port: 80,
      port: 3000,
      // middleware: [
      //   cors(),
      // ],
      proxy: {
        '/api': {
          target: 'http://ais-api.simplevia.com',
          changeOrigin: true,
          rewrite: (path) => path.replace(/^\/api/, ''),
        },
      },
  
  },
  build: {
    chunkSizeWarningLimit: 1000000,
  },
})
>>>>>>> 618c63c0b681f52aebd5d36e95c31488ac15d46d
