<?php

namespace BotSkeleton\Command;

use Telegram\Bot\Actions;
use Telegram\Bot\Commands\Command;

class StartCommand extends Command
{
    /**
     * @var string
     */
    protected $name = 'start';
    /**
     * @var string
     */
    protected $description = 'Start this bot.';

    /**
     * @inheritdoc
     */
    public function handle($arguments)
    {
        $this->replyWithChatAction([
            'action' => Actions::TYPING,
        ]);

        $commands = $this->getTelegram()->getCommands();
        $response = 'Hi! Here is a list of all available commands:'.PHP_EOL;
        foreach ($commands as $name => $command) {
            $response .= sprintf(
                '/%s - %s'.PHP_EOL,
                $name,
                $command->getDescription()
            );
        }

        $this->replyWithMessage([
            'text' => $response,
        ]);
    }
}

