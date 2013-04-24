<?php
use Silex\Application;
use Silex\Provider\DoctrineServiceProvider;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\HttpKernelInterface;

include __DIR__ . '/vendor/autoload.php';

$app = new Application();

/**
 * Other Configuration
 */
$app['debug'] = true;
$app->register(new Silex\Provider\MonologServiceProvider(), array(
    'monolog.logfile' => '/tmp/PagseguroTestServer.log',
));


// actions
$app->get('/', function ()  use ($app) {
    return 'silex';
});

$app->post('/v2/checkout/', function() use ($app) {
    return '<?xml version="1.0" encoding="ISO-8859-1"?>  
<checkout>  
    <code>8CF4BE7DCECEF0F004A6DFA0A8243412</code>  
    <date>2010-12-02T10:11:28.000-02:00</date>  
</checkout>';    
});

$app->get('/v2/checkout/payment.html?code=', function() use ($app) {
    return 'ok';
});
$app->run();