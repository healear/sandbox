<?php

use App\Kernel;
use Symfony\Component\HttpFoundation\Request;

require_once dirname(__DIR__).'/vendor/autoload_runtime.php';

return function (array $context) {
    $kernel = new Kernel($context['APP_ENV'], (bool) $context['APP_DEBUG']);

    // Обработка запроса через Symfony
    $request = Request::createFromGlobals();
    $response = $kernel->handle($request);
    $response->send();

    $kernel->terminate($request, $response);
};
