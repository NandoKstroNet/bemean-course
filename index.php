<?php
#ini_set('display_errors', true); 
#error_reporting(E_ALL | E_STRICT);

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

/**
 * Require composer's autoload
 */
require __DIR__ . '/vendor/autoload.php';

$app = new Silex\Application();

$app->get('/', function(){
	return new Response('Hello World');
});

$app->run();