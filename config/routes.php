<?php

declare(strict_types=1);

use Slim\App;
use App\Actions\Breed\ViewBreedByNameAction;
use App\Actions\Authentication\AuthenticateAction;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

return function (App $app) {
    $app->options('/{routes:.*}', function (Request $request, Response $response) {
        // CORS Pre-Flight OPTIONS Request Handler
        return $response;
    });

    $app->get('/', function (Request $request, Response $response) {
        $response->getBody()->write('Hello world!');
        return $response;
    });

    $app->get('/breeds', ViewBreedByNameAction::class);

    $app->post('/login', AuthenticateAction::class);
};
