<?php

declare(strict_types=1);

namespace Avgkudey\PulseDepTrack\Commands;

use Avgkudey\PulseDepTrack\Events\ComposerOutdatedCheckEvent;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Event;

class CheckOutdatedComposerDependenciesCommand extends Command
{
    protected $description = 'trigger ComposerOutdatedCheck Event and check outdated composer dependencies';

    protected $signature = 'deptrack:composer';

    public function handle(): void
    {
        Event::dispatch(new ComposerOutdatedCheckEvent);
    }
}
