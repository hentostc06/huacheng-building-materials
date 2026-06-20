import inertia from '@inertiajs/vite';
import { wayfinder } from '@laravel/vite-plugin-wayfinder';
import tailwindcss from '@tailwindcss/vite';
import vue from '@vitejs/plugin-vue';
import laravel from 'laravel-vite-plugin';
import { fileURLToPath, URL } from 'node:url';
import { createLogger, defineConfig } from 'vite';

const logger = createLogger();
const originalWarn = logger.warn;

logger.warn = (message, options) => {
    const text = typeof message === 'string' ? message : String(message);

    if (text.includes('[INVALID_ANNOTATION]') && text.includes('@vueuse/core')) {
        return;
    }

    originalWarn(message, options);
};

export default defineConfig({
    customLogger: logger,

    resolve: {
        alias: {
            '@': fileURLToPath(new URL('./resources/js', import.meta.url)),
        },
    },

    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.ts'],
            refresh: true,
        }),

        inertia(),

        tailwindcss(),

        vue({
            template: {
                transformAssetUrls: {
                    base: null,
                    includeAbsolute: false,
                },
            },
        }),

        wayfinder({
            formVariants: true,
        }),
    ],
});
