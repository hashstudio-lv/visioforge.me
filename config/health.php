<?php

return [
    'cpu' => [
        'min_percent' => (int) env('HEALTH_CPU_MIN_PERCENT'),
    ],

    'ram' => [
        'min_percent' => (int) env('HEALTH_RAM_MIN_PERCENT'),
    ]
];
