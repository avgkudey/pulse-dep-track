<?php

declare(strict_types=1);

namespace Avgkudey\PulseDepTrack\Recorders;

use Avgkudey\PulseDepTrack\Events\NpmOutdatedCheckEvent;
use Illuminate\Support\Facades\Process;
use Laravel\Pulse\Facades\Pulse;
use RuntimeException;

class NpmOutdatedRecorder
{
    /**
     * @var array<int,class-string>
     */
    public array $listen = [
        NpmOutdatedCheckEvent::class,
    ];

    public function record(NpmOutdatedCheckEvent $event): void
    {
        $result = Process::run('npm outdated --json');

        if (! ($result->output() && json_decode(json: $result->output(), associative: true, flags: JSON_THROW_ON_ERROR))) {

            throw new RuntimeException(message: 'npm outdated package checking failed: '.$result->errorOutput());
        }

        json_decode(json: $result->output(), associative: true, flags: JSON_THROW_ON_ERROR);
        Pulse::set('npm_outdated', 'packages', $result->output());
    }
}
