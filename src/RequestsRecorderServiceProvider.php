<?php

namespace Lentex\RequestsRecorder;

use Illuminate\Contracts\Http\Kernel;
use Illuminate\Foundation\Console\AboutCommand;
use Illuminate\Support\ServiceProvider;
use Lentex\RequestsRecorder\Console\Commands\PurgeRequests;
use Lentex\RequestsRecorder\Http\Middlewares\RecordMiddleware;

class RequestsRecorderServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any package services.
     *
     * @return void
     */
    public function boot(Kernel $kernel)
    {
        $this->registerMiddlewares($kernel)
            ->registerMigrations()
            ->registerConfig()
            ->registerRoutes()
            ->registerView()
            ->registerCommands()
            ->enrichAboutCommand();
    }

    private function registerMiddlewares(Kernel $kernel): self
    {
        $kernel->pushMiddleware(RecordMiddleware::class);

        return $this;
    }

    private function registerMigrations(): self
    {
        $this->loadMigrationsFrom(__DIR__.'/../database/migrations');

        return $this;
    }

    private function registerConfig(): self
    {
        $this->publishes([
            __DIR__.'/../config/requestsrecorder.php' => config_path('requestsrecorder.php'),
        ], 'requests-recorder');

        $this->mergeConfigFrom(
            __DIR__.'/../config/requestsrecorder.php', 'requestsrecorder'
        );

        return $this;
    }

    private function registerRoutes(): self
    {
        $this->loadRoutesFrom(__DIR__.'/../routes/web.php');

        return $this;
    }

    private function registerView(): self
    {
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'requestsrecorder');

        $this->publishes([
            __DIR__.'/../resources/views' => resource_path('views/vendor/requestsrecorder'),
        ], 'requests-recorder');

        return $this;
    }

    private function registerCommands(): self
    {
        if ($this->app->runningInConsole()) {
            $this->commands([
                PurgeRequests::class,
            ]);
        }

        return $this;
    }

    private function enrichAboutCommand(): self
    {
        AboutCommand::add('Incoming Requests Recorder', fn () => ['Version' => '1.0.0']);

        return $this;
    }
}
