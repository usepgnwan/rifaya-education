import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import lineClamp from '@tailwindcss/line-clamp';
export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js'],
            refresh: true,
        }),
        lineClamp
    ],
    define: {
        'process.env': {
            BASE_URL: JSON.stringify(process.env.BASE_URL || '/'),
        },
    },
});
