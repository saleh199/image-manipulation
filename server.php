<?php

use League\Flysystem\Filesystem;
use League\Flysystem\AwsS3v3\AwsS3Adapter;
use League\Glide\Manipulators;
use League\Glide\Api\Api;
use League\Glide\Server;
use League\Glide\Responses;

$config = require 'Config.php';

// Source Client
$S3ClientSource = new \Aws\S3\S3Client($config['s3']['source']);

// Cache Client
$S3ClientCache = new \Aws\S3\S3Client($config['s3']['cache']);

// Set image manager
$imageManager = new Intervention\Image\ImageManager([
    'driver' => 'imagick',
]);

// Set source filesystem
$source = new Filesystem(
    new AwsS3Adapter($S3ClientSource, $config['s3']['source']['bucket'])
);

// Set cache filesystem
$cache = new Filesystem(
    new AwsS3Adapter($S3ClientSource, $config['s3']['cache']['bucket'])
);

// Set manipulators
$manipulators = [
    new Manipulators\Orientation(),
    new Manipulators\Crop(),
    new Manipulators\Size(2000*2000),
    new Manipulators\Brightness(),
    new Manipulators\Contrast(),
    new Manipulators\Gamma(),
    new Manipulators\Sharpen(),
    new Manipulators\Filter(),
    new Manipulators\Blur(),
    new Manipulators\Pixelate(),
//    new Manipulators\Watermark($watermarks),
    new Manipulators\Background(),
    new Manipulators\Border(),
    new Manipulators\Encode(),
];

// Set API
$api = new Api($imageManager, $manipulators);

// Setup Glide server
$server = new Server(
    $source,
    $cache,
    $api
);

$server->setSourcePathPrefix($config['source_path_prefix']);
$server->setCachePathPrefix($config['cache_path_prefix']);
$server->setGroupCacheInFolders($config['group_cache_in_folders']);
$server->setBaseUrl($config['base_url']);
$server->setDefaults($config['defaults']);

// Set response factory
$server->setResponseFactory(new Responses\SymfonyResponseFactory());

return $server;