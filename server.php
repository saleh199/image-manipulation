<?php

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
$source = new League\Flysystem\Filesystem(
    new \League\Flysystem\AwsS3v3\AwsS3Adapter($S3ClientSource, $config['s3']['source']['bucket'])
);

// Set cache filesystem
$cache = new League\Flysystem\Filesystem(
    new \League\Flysystem\AwsS3v3\AwsS3Adapter($S3ClientSource, $config['s3']['cache']['bucket'])
);

// Set manipulators
$manipulators = [
    new League\Glide\Manipulators\Orientation(),
    new League\Glide\Manipulators\Crop(),
    new League\Glide\Manipulators\Size(2000*2000),
    new League\Glide\Manipulators\Brightness(),
    new League\Glide\Manipulators\Contrast(),
    new League\Glide\Manipulators\Gamma(),
    new League\Glide\Manipulators\Sharpen(),
    new League\Glide\Manipulators\Filter(),
    new League\Glide\Manipulators\Blur(),
    new League\Glide\Manipulators\Pixelate(),
//    new League\Glide\Manipulators\Watermark($watermarks),
    new League\Glide\Manipulators\Background(),
    new League\Glide\Manipulators\Border(),
    new League\Glide\Manipulators\Encode(),
];

// Set API
$api = new League\Glide\Api\Api($imageManager, $manipulators);

// Setup Glide server
$server = new League\Glide\Server(
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
$server->setResponseFactory(new \League\Glide\Responses\SymfonyResponseFactory());

return $server;