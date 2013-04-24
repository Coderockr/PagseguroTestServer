<?php
use Pagseguro\Controller\CheckoutController;
use Pagseguro\Controller\HomeController;
use Silex\Application;
use Silex\Provider\ServiceControllerServiceProvider;
use Symfony\Component\HttpFoundation\Request;

$loader = require __DIR__ . '/vendor/autoload.php';
$loader->add('Pagseguro', __DIR__.'/src');
$loader->add('CodeRockr', __DIR__.'/src');

$app = new Application();

/**
 * Other Configuration
 */
// logging
$app['debug'] = true;
$app->register(new Silex\Provider\MonologServiceProvider(), array(
    'monolog.logfile' => '/tmp/PagseguroTestServer.log',
));

// Service Controller
$app->register(new ServiceControllerServiceProvider());

// Controller mapping
$app['HomeController'] = $app->share(function () use ($app) {
    return new HomeController($app);
});

$app['CheckoutController'] = $app->share(function () use ($app) {
    return new CheckoutController($app);
});

// actions
$app->get('/', 'HomeController:index');

$app->post('/v2/checkout/', 'CheckoutController:post');

$app->get('/v2/checkout/payment.html', function(Request $request) use ($app) {
    $query = $request->query;
    $code = $query->get('code');
    return $code;
});
$app->run();