import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import path from 'path';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.scss', 'resources/js/app.js'],
            refresh: true,
        }),
    ],
    resolve: {
        alias: {
            '$': 'jQuery',
            '@': path.resolve(__dirname, 'resources'),
        },
    },
    build: {
        rollupOptions: {
            external: [
                'jQuery',
                // 'dots-animation'
            ],
        },
    },
});
