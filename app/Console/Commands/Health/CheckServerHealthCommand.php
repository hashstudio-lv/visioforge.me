<?php

declare(strict_types=1);

namespace App\Console\Commands\Health;

use App\Exceptions\Health\HealthException;
use Illuminate\Console\Command;
use Lokus\ServerCheck\CpuUsageChecker;
use Lokus\ServerCheck\RamUsageChecker;

class CheckServerHealthCommand extends Command
{
    protected $signature = 'health:check';

    public function handle()
    {
        $cpuMinPercentage = config('health.cpu.min_percent');
        $ramMinPercentage = config('health.ram.min_percent');

        $isCpuLoaded = CpuUsageChecker::isLoadAtLeast(
            percent: $cpuMinPercentage
        );

        $isRamLoaded = RamUsageChecker::isLoadAtLeast(
            percent: $ramMinPercentage
        );

        if ($isCpuLoaded) {
            report(HealthException::cpuLoaded("CPU loaded on {$cpuMinPercentage}%"));
        }

        if ($isRamLoaded) {
            report(HealthException::ramLoaded("RAM loaded on {$ramMinPercentage}%"));
        }
    }
}
