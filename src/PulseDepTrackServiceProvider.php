<?php

declare(strict_types=1);

namespace Avgkudey\PulseDepTrack;

use Avgkudey\PulseDepTrack\Livewire\ComposerOutdated;
use Avgkudey\PulseDepTrack\Livewire\NpmOutdated;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Support\ServiceProvider;
use Livewire\LivewireManager;

class PulseDepTrackServiceProvider extends ServiceProvider
{
    public function boot(): void
    {

        $this->registerResources();
        $this->registerCommands();
    }

    /**
     * Register the package's resources.
     */
    protected function registerResources(): void
    {
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'deptrack');

        $this->callAfterResolving('livewire', function (LivewireManager $livewire, Application $app) {
            $livewire->component('deptrack.composer-outdated', ComposerOutdated::class);
            $livewire->component('deptrack.npm-outdated', NpmOutdated::class);
        });
    }

    /**
     * Register the package's commands.
     */
    protected function registerCommands(): void
    {
        if ($this->app->runningInConsole()) {
            $this->commands([
                Commands\CheckOutdatedComposerDependenciesCommand::class,
                Commands\CheckOutdatedNpmDependenciesCommand::class,
            ]);

        }
    }
}
