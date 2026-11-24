<?php

declare(strict_types=1);

namespace App\Jobs\Report;

use App\Reporter\TelegramReporter;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Support\Facades\Log;
use Throwable;

final class ReportTelegram implements ShouldQueue
{
    use Queueable;

    public int $tries = 1;

    /**
     * @param array{class: string, message: string, file: string, line: int} $report
     */
    public function __construct(
        private array $report
    ) {}

    /**
     * Never fails: a failing job would be reported, dispatching another report job (infinite loop).
     */
    public function handle(TelegramReporter $telegramReporter): void
    {
        try {
            $telegramReporter->report($this->report);
        } catch (Throwable $t) {
            Log::warning('Telegram report failed: ' . $t->getMessage());
        }
    }
}
