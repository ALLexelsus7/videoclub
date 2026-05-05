import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import tailwindcss from '@tailwindcss/vite'; // Importo el plugin de Tailwind CSS para Vite

export default defineConfig({
    plugins: [
        tailwindcss(), // Agrego el plugin de Tailwind CSS para Vite
        laravel({
            input: [
                'resources/css/app.css',
                'resources/js/app.js',
            ],
            refresh: true,
        }),
    ],
});
