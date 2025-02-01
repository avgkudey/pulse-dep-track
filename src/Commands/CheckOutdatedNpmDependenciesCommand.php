<?php

declare(strict_types=1);

namespace Avgkudey\PulseDepTrack\Commands;

use Avgkudey\PulseDepTrack\Events\NpmOutdatedCheckEvent;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Event;

class CheckOutdatedNpmDependenciesCommand extends Command
{
    protected $description = 'trigger NpmOutdatedCheck Event and check outdated npm dependencies';

    protected $signature = 'deptrack:npm';

    public function handle(): void
    {
        Event::dispatch(new NpmOutdatedCheckEvent);
    }
}
