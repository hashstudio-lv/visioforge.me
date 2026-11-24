<?php

declare(strict_types=1);

namespace App\Services\Telegram;

use Illuminate\Http\Client\RequestException;
use Illuminate\Support\Facades\Http;

/**
 * Взаимодействие с Telegram на уровне простых методов
 */
final class TelegramSenderService
{
    /**
     * Сервис не привязан к конкретному боту - можем поставить любой токен
     */
    private string $token;

    public function setToken(string $token): self
    {
        $this->token = $token;

        return $this;
    }

    /**
     * Отправка текстового сообщения в чат
     *
     * @throws RequestException
     *
     * @see https://core.telegram.org/bots/api#sendmessage
     */
    public function sendMessage(int $chatId, string $text, string $parseMode = 'HTML', ?int $threadId = null): void
    {
        $params = [
            'chat_id' => $chatId,
            'text' => $text,
            'parse_mode' => $parseMode,
        ];

        if ($threadId !== null) {
            $params['message_thread_id'] = $threadId;
        }

        Http::throw()->post("https://api.telegram.org/bot{$this->token}/sendMessage", $params);
    }
}
