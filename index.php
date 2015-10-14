<?php
use Kopernikus\Controller\IndexController;
use Symfony\Component\HttpFoundation\JsonResponse;

require_once __DIR__ . '/vendor/autoload.php';

$app = new Silex\Application();

$app['debug'] = true;

$className = IndexController::class;

$app->register(new Silex\Provider\ServiceControllerServiceProvider());
$app['controller.index'] = $app->share(
    function () use ($app) {
        return new IndexController();
    }
);
$app->post('/', "controller.index:indexAction");

$app->error(
    function (\Exception $e, $code) {
        switch ($code) {
            case 404:
                $message = 'The requested page could not be found.';
                break;
            default:
                $message = $e->getMessage();
        }

        return new JsonResponse(
            [
                'message' => $message,
            ]
        );
    }
);


$app->run();
