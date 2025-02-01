<?php

declare(strict_types=1);

namespace Avgkudey\PulseDepTrack\Livewire;

use Illuminate\Support\Facades\View;
use Laravel\Pulse\Facades\Pulse;
use Laravel\Pulse\Livewire\Card;

class NpmOutdated extends Card
{
    public function render()
    {
        $packages = Pulse::values('npm_outdated', ['packages'])->first();

        $timestamp = $packages?->timestamp ?? null;
        $packages = $packages
            ? json_decode($packages->value, associative: true, flags: JSON_THROW_ON_ERROR)
            : [];

        return View::make('deptrack::livewire.npm-outdated', [
            'packages' => $packages,
            'timestamp' => $timestamp,
        ]);
    }
}
