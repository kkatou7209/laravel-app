import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import path from 'path';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/ts/app.js'],
            refresh: true,
        }),
    ],
    server: {
        host: '127.0.0.1',
        port: 5173,
        strictPort: true,
        hmr: {
            protocol: 'ws'
        },
        watch: {
            usePolling: true,
            interval: 1000,
        }
    },
    resolve: {
        alias: {
            '@': `${path.resolve(__dirname, 'resources/ts')}/`,
            '@css': `${path.resolve(__dirname, 'resources/css')}/`,
        }
    }
});
