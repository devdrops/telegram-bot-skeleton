<?php

namespace BotSkeleton\Controller;

use Silex\Application;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;

class BotController
{
    public function webhookAction(Request $request, Application $app)
    {
        try {
            $app['telegram']->addCommands(
                $app['telegram.settings']['commands']
            );

            $app['telegram']->commandsHandler(true);

            return new JsonResponse('IT LIVES');
        } catch (\Exception $exception) {
            var_dump($exception);
        }
    }
}

