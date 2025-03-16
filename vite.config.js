import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/sass/app.scss',
                'resources/js/app.js',
                'resources/js/app-admin.js',
                'resources/css/app-admin.css',
                'resources/css/datatables.min.css',
                'resources/js/datatables.min.js',
                'resources/js/datatables.js'
            ],
            refresh: true,
        }),
    ],
    build: {
        manifest: true,  // Ensure this is set to true
        outDir: 'public/build',  // Ensure the output directory is public/build
      },
});
