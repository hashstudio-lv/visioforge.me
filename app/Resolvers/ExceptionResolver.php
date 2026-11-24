<?php

declare(strict_types=1);

namespace App\Resolvers;

use App\Jobs\Report\ReportTelegram;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use Throwable;

final class ExceptionResolver
{
    public function __invoke(Exceptions $exceptions): void
    {
        // Report: never throws, so a failed report can't trigger another report (no loop)
        $exceptions->report(function (Throwable $e) {
            // Failures of the report job itself (e.g. stale worker can't load the class) must not queue another report
            if (str_contains($e->getMessage(), 'ReportTelegram')) {
                return;
            }

            try {
                $report = [
                    'class' => $e::class,
                    'message' => Str::limit($e->getMessage(), 3000),
                    'file' => $e->getFile(),
                    'line' => $e->getLine(),
                ];

                ReportTelegram::dispatch($report)->onQueue('alerts');
            } catch (Throwable $t) {
                Log::warning('Telegram report dispatch failed: ' . $t->getMessage());
            }
        });
    }
}
