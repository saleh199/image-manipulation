<?php
require 'vendor/autoload.php';

$server = require 'server.php';

$router = new AltoRouter();


$router->map('GET', '/[*:path]', function($path) use ($server){
    echo $server->outputImage($path, $_GET);
}, 'home');

// match current request url
$match = $router->match();

// call closure or throw 404 status
if( $match && is_callable( $match['target'] ) ) {
    call_user_func_array( $match['target'], $match['params'] );
} else {
    // no route was matched
    header( $_SERVER["SERVER_PROTOCOL"] . ' 404 Not Found');
    die('404 Not Found');
}