<?php

declare(strict_types=1);

namespace LaravelTelegramApi;

use Illuminate\Support\ServiceProvider;

/**
 * @class LaravelTelegramApiServiceProvider
 */
class LaravelTelegramApiServiceProvider extends ServiceProvider
{
    /**
     * @inheritdoc
     */
    public function boot()
    {
        $modules = config("module.modules");
        if ($modules) {
            while (list(, $module) = each($modules)) {
                if (file_exists(__DIR__ . '/' . $module . '/Routes/routes.php')) {
                    $this->loadRoutesFrom(__DIR__ . '/' . $module . '/Routes/routes.php');
                }
                if (is_dir(__DIR__ . '/' . $module . '/Views')) {
                    $this->loadViewsFrom(__DIR__ . '/' . $module . '/Views', $module);
                }
                if (is_dir(__DIR__ . '/' . $module . '/Migration')) {
                    $this->loadMigrationsFrom(__DIR__ . '/' . $module . '/Migration');
                }
                if (is_dir(__DIR__ . '/' . $module . '/Lang')) {
                    $this->loadTranslationsFrom(__DIR__ . '/' . $module . '/Lang', $module);
                }
            }
        }
    }

    /**
     * @inheritdoc
     */
    public function register()
    {

    }
}
