<?php

namespace App\Core;

use Exception;

class Vite
{
    private static array $config = [];

    private static bool $booted = false;

    private static string $env;

    private static bool $isDevServerRunning = false;

    private static array $manifest = [];

    /**
     * @param array $config
     *
     * @return void
     */
    public static function configure(array $config): void
    {
        self::$config = array_merge([
            'dev_server' => 'http://localhost:5173',
            'build_path' => 'build',
            'manifest' => basePath('public/build/.vite/manifest.json'),
        ], $config);
    }

    /**
     * @return void
     */
    private static function boot(): void
    {
        if (self::$booted) {
            return;
        }

        self::$env = env('app_env', 'production');

        if (self::isDev()) {
            self::$isDevServerRunning = self::checkDevServer();
        }


        if (!self::$isDevServerRunning) {
            self::loadManifest();
        }

        self::$booted = true;
    }

    /**
     * @return bool
     */
    public static function isDev(): bool
    {
        return in_array(self::$env, ['dev', 'development'], true);
    }

    /**
     * @return bool
     */
    public static function isProduction(): bool
    {
        return in_array(self::$env, ['prod', 'production'], true);
    }

    /**
     * @return bool
     */
    private static function checkDevServer(): bool
    {
        $headers = @get_headers(rtrim(self::$config['dev_server'], '/') . '/@vite/client');

        if (!$headers) {
            return false;
        }

        return str_contains($headers[0], '200');
    }

    /**
     * @return void
     * @throws Exception
     */
    private static function loadManifest(): void
    {
        $manifestPath = self::$config['manifest'];

        if (!file_exists($manifestPath)) {
            throw new Exception(
                "Manifest não encontrado: {$manifestPath}"
            );
        }

        $manifest = json_decode(
            file_get_contents($manifestPath),
            true
        );

        if (!$manifest) {
            throw new Exception(
                'Erro ao carregar manifest do Vite.'
            );
        }

        self::$manifest = $manifest;
    }

    /**
     * @param string $entry
     *
     * @return string
     * @throws Exception
     */
    public static function assets(string $entry): string
    {
        self::boot();

        if (self::isDev() && self::$isDevServerRunning) {
            $devUrl = rtrim(self::$config['dev_server'], '/');

            return implode("\n", [
                '<script type="module" src="' . $devUrl . '/@vite/client"></script>',
                '<script type="module" src="' . $devUrl . '/' . ltrim($entry, '/') . '"></script>',
            ]);
        }

        if (!isset(self::$manifest[$entry])) {
            throw new Exception(
                "Asset '{$entry}' não encontrado no manifest."
            );
        }

        $assets = [];
        $manifest = self::$manifest[$entry];

        if (!empty($manifest['css'])) {
            foreach ($manifest['css'] as $css) {
                $assets[] = sprintf(
                    '<link rel="stylesheet" href="%s/%s">',
                    trim(self::$config['build_path'], '\/'),
                    ltrim($css, '/')
                );
            }
        }

        $assets[] = sprintf(
            '<script type="module" src="%s/%s"></script>',
            trim(self::$config['build_path'], '\/'),
            ltrim($manifest['file'], '/')
        );

        return implode("\n", $assets);
    }
}
