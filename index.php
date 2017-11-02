<?php

require_once __DIR__.'/vendor/autoload.php';

$app = new \Silex\Application();

$environment = getenv('APP_ENV');

require __DIR__.'/app/config/'.$environment.'.php';
require __DIR__.'/app/app.php';
require __DIR__.'/app/routes.php';

$app->run();

