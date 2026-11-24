<?php

return [
    'tg' => [
        'bot_token' => env('REPORTS_TG_BOT_TOKEN', ''),
        'chat_id' => (int) env('REPORTS_TG_CHAT_ID', 0),
    ],
];
