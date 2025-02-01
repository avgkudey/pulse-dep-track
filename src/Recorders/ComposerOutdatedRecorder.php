<?php

declare(strict_types=1);

namespace Avgkudey\PulseDepTrack\Recorders;

use Avgkudey\PulseDepTrack\Events\ComposerOutdatedCheckEvent;
use Illuminate\Support\Facades\Process;
use Laravel\Pulse\Facades\Pulse;
use RuntimeException;

class ComposerOutdatedRecorder
{
    /**
     * @var array<int,class-string>
     */
    public array $listen = [
        ComposerOutdatedCheckEvent::class,
    ];

    public function record(ComposerOutdatedCheckEvent $event): void
    {
        $result = Process::run('composer outdated -D -f json');

        if ($result->failed()) {
            throw new RuntimeException(message: 'Composer outdated package checking failed: '.$result->errorOutput());
        }

        json_decode(json: $result->output(), associative: true, flags: JSON_THROW_ON_ERROR);
        Pulse::set('composer_outdated', 'packages', $result->output());
    }
}
