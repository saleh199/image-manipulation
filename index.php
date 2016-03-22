<?php
use League\Glide\Signatures\SignatureFactory;

require 'vendor/autoload.php';

$server = require 'server.php';

$config = require 'Config.php';

$router = new AltoRouter();

$router->map('GET', '/[*:path]', function ($path) use ($server, $config) {
    try {
        // Validate HTTP signature
        SignatureFactory::create($config['signkey'])->validateRequest($path, $_GET);

        echo $server->outputImage($path, $_GET);
    } catch (Exception $e) {
        header($_SERVER["SERVER_PROTOCOL"] . ' 500 Bad Request');
        die('500 Bad Request');
    }
}, 'home');

// match current request url
$match = $router->match();

// call closure or throw 404 status
if ($match && is_callable($match['target'])) {
    call_user_func_array($match['target'], $match['params']);
} else {
    // no route was matched
    header($_SERVER["SERVER_PROTOCOL"] . ' 404 Not Found');
    die('404 Not Found');
}
