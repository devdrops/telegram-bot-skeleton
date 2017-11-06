<?php

namespace BotSkeleton\Command;

use Telegram\Bot\Actions;
use Telegram\Bot\Commands\Command;

class MentionAllCommand extends Command
{
    /**
     * @var string
     */
    protected $name = 'all';
    /**
     * @var string
     */
    protected $description = 'Mention all @ members on this chat.';

    /**
     * @inheritdoc
     */
    public function handle($arguments)
    {
        $this->replyWithMessage([
            'text' => print_r($arguments, true),
        ]);
    }
}

