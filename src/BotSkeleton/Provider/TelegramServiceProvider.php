<?php

namespace BotSkeleton\Provider;

use Pimple\Container;
use Pimple\ServiceProviderInterface;
use Telegram\Bot\Api;

class TelegramServiceProvider implements ServiceProviderInterface
{
    public function register(Container $app)
    {
        $app['telegram'] = new Api(
            $app['telegram.settings']['bot_key']
        );
    }
}

