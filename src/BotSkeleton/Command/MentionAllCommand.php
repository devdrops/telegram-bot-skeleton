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

        /*$contents = print_r($arguments, true);
        $pdoConnection = new \PDO(getenv('DB_REQUEST_LOGS'));
        $pdoConnection->query(
            "INSERT INTO requests (data) VALUES ('$contents');"
        );*/

        $update = $this->getTelegram()->getWebhookUpdates();

        $this->replyWithMessage([
            'text' => print_r(get_class_methods(
                $this->getTelegram()->getChatAdministrators([
                    'chat_id' => (string)$update()->getMessage()->getChat()->getId()
                ])
            ), true),
        ]);
    }
}

