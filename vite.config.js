import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import vue from '@vitejs/plugin-vue';
import fsExtra from 'fs-extra';
const { copySync } = fsExtra;
import path from 'path';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/js/app.ts',
            ],
            refresh: true,
        }),
        vue(),
    ],
    build: {
        rollupOptions: {
            input: {
                admin_app_scss: path.resolve(__dirname, 'resources/admin/sass/app.scss'),
                admin_app_ts: path.resolve(__dirname, 'resources/admin/js/app.ts'),
                vuejs_app_scss: path.resolve(__dirname, 'resources/vuejs/sass/app.scss'),
                vuejs_app_ts: path.resolve(__dirname, 'resources/vuejs/js/app.ts')
            }
        }
    },
    server: {
        host: true,  // Dockerコンテナ内でホストされるように設定
        port: 5173,       // 必要に応じてポート番号を変更
        hmr: {
            host: 'localhost',
            port: 5173,
            protocol: 'ws',
            timeout: 3000, // タイムアウト時間を調整する
            overlay: true, // オーバーレイエラーを有効にする
        },
        watch: {
            usePolling: true,        // ファイル変更の監視方法をポーリングに設定
        },
    },
});
