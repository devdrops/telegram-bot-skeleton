<?php

$app['telegram.settings'] = [
    'bot_key' => getenv('TELEGRAM_BOT_KEY'),
    'commands' => [
        \BotSkeleton\Command\MentionAllCommand::class,
        \BotSkeleton\Command\StartCommand::class,
        \Telegram\Bot\Commands\HelpCommand::class,
    ]
];

$app['log-requests'] = true;

