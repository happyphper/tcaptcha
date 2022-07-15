<?php

namespace Happyphper\TCaptcha;

use Illuminate\Support\ServiceProvider;

class TCaptchaServiceProvider extends ServiceProvider
{
    /**
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom($this->configPath(), 'tcaptcha');

        $this->app->singleton(TCaptcha::class, function () {
            return new TCaptcha();
        });
    }

    /**
     * @return void
     */
    public function boot()
    {
        $this->publishes([$this->configPath() => config_path('tcaptcha.php')], 'tcaptcha');
    }

    /**
     * Set the config path
     *
     * @return string
     */
    protected function configPath(): string
    {
        return __DIR__ . '/../config/tcaptcha.php';
    }
}
