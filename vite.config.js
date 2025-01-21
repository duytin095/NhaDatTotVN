import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/js/app.js'
            ],
            refresh: [
                'resources/routes/**',
                'routes/**',
                'resources/views/**',
                'public/**',
            ],
        }),
    ],
    server: {
        origin: 'http://localhost:8000', // replace with your server URL
        cors: true,
      },
});
