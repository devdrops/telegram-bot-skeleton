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
            'text' => 'Here we go!',
        ]);

        $update = $this->getTelegram()->getWebhookUpdates();
        $contents = print_r(
            $update->getMessage()->getChat()->getId(),
            true
        );
        $pdoConnection = new \PDO(getenv('DB_REQUEST_LOGS'));
        $pdoConnection->query(
            "INSERT INTO requests (data) VALUES ('$contents');"
        );


        $this->replyWithMessage([
            'text' => print_r(
                $this->getTelegram()->getChatAdministrators([
                    'chat_id' => $update->getMessage()->getChat()->getId()
                ])
            , true),
        ]);
    }
}

