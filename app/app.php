<?php

use BotSkeleton\Provider\TelegramServiceProvider;
use Silex\Application;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

$app->register(
    new TelegramServiceProvider(),
    $app['telegram.settings']
);

if (true == $app['log-requests']) {
    $app->before(function (Request $request, Application $app){
        try {
            $pdoConnection = new \PDO(getenv('DB_REQUEST_LOGS'));

            $contents = $request->getContent();

            $pdoConnection->query(
                "INSERT INTO requests (data) VALUES ('$contents');"
            );

            $pdoConnection = null;
        } catch (\Exception $exception) {
            var_dump($exception);
        }
    });
}


$app->error(function (\Exception $exception, $code) use ($app) {
    if ($app['debug']) {
        var_dump($exception);

        return;
    }

    if (200 != $code) {
        return new JsonResponse([
            'error' => 'Something weird has happened :(',
            'code' => $code,
            'message' => $exception->getMessage(),
        ]);
    }
});

return $app;

