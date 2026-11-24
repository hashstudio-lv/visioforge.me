<?php

declare(strict_types=1);

namespace App\Reporter;

use App\Services\Telegram\TelegramSenderService;
use Illuminate\Support\Str;

final class TelegramReporter
{
    private const TG_LIMIT = 4096;

    public function __construct(
        private TelegramSenderService $telegramSenderService
    )
    {
        $telegramSenderService->setToken((string) config('reports.tg.bot_token'));
    }

    /**
     * @param array{class: string, message: string, file: string, line: int} $report
     */
    public function report(array $report): void
    {
        $appName = $this->escape(config('app.name'));
        $class = $this->escape($report['class']);
        $where = $this->escape($report['file'] . ':' . $report['line']);

        // Truncate BEFORE escaping so an entity like &amp; is never cut in half
        $limitedMessage = Str::limit($report['message'], 3000);
        $message = $this->escape($limitedMessage);

        $text = "<b>Error on website:</b> {$appName}\n"
                . "<b>{$class}</b>\n"
                . "<code>{$where}</code>\n\n"
                . "<pre>{$message}</pre>";
        $text = mb_substr($text, 0, self::TG_LIMIT);

        $this->telegramSenderService->sendMessage(
            chatId: config('reports.tg.chat_id'),
            text: $text,
            parseMode: 'HTML',
        );
    }

    /**
     * Escape message. Because in TG not truly HTML format.
     */
    private function escape(?string $value): string
    {
        $escapedValue = htmlspecialchars((string) $value, ENT_QUOTES | ENT_SUBSTITUTE | ENT_HTML401, 'UTF-8');

        return $escapedValue;
    }
}
