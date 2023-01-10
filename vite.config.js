import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import vue from '@vitejs/plugin-vue';

export default defineConfig({
    server: {
        host: 'https://digitalstore-website-production.up.railway.app/',
        hmr: {
            host: 'https://digitalstore-website-production.up.railway.app/'
        }
    },
    plugins: [
        laravel({
            input: ['resources/js/app.js'],
            refresh: true,
        }),
        vue()
    ],
});
