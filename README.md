# Setup Glide Server

### Introduction

Glide is a wonderfully easy on-demand image manipulation library written in PHP. Its straightforward API is exposed via HTTP, similar to cloud image processing services like [Imgix](http://www.imgix.com/) and [Cloudinary](http://cloudinary.com/). Glide leverages powerful libraries like [Intervention Image](http://php.net/manual/en/book.imagick.php) (for image handling and manipulation) and Flysystem (for file system abstraction).

 - Adjust, resize and add effects to images using a simple HTTP based API.
 - Manipulated images are automatically cached and served with far-future expires headers.
 - Create your own image processing server or integrate Glide directly into your app.
 - Supports both the [GD](http://php.net/manual/en/book.image.php) library and the Imagick PHP extension.
 - Supports many response methods, including [PSR-7](http://www.php-fig.org/psr/psr-7/), [HttpFoundation](http://symfony.com/doc/current/components/http_foundation/introduction.html) and more.
 - Ability to secure image URLs using HTTP signatures.
 - Works with many different file systems, thanks to the [Flysystem](http://flysystem.thephpleague.com/) library.
 - Powered by the battle tested [Intervention Image][int-image] image handling and manipulation library.
 - Framework-agnostic, will work with any project.
 - Composer ready and PSR-2 compliant.
 
 
### Configuration

- Source storage :

set your source and cache locations
 
```php
    'source' => [
        'credentials'   => [
            'key'   => '',
            'secret'    => ''
        ],
        'region'    => '',
        'version'   => 'latest',
        'bucket'    => ''
    ],
```

- Cache storage :

set your source and cache locations

```php
    'cache' => [
        'credentials'   => [
            'key'   => '',
            'secret'    => ''
        ],
        'region'    => '',
        'version'   => 'latest',
        'bucket'    => ''
    ],
```

- Signature key (security)

 Secure your Glide image server with HTTP signatures. By signing each request with a private key, no alterations can be made to the URL parameters.

```php
'signkey' => '',
```

Generate a signature for each image request you make. Glide comes with a URL builder to make this process easy. Be sure to use the same signing key you configured earlier.

```php
<?php

use League\Glide\Urls\UrlBuilderFactory;

// Set complicated sign key
$signkey = 'v-LK4WCdhcfcc%jt*VC2cj%nVpu+xQKvLUA%H86kRVk_4bgG8&CWM#k*b_7MUJpmTc=4GFmKFp7=K%67je-skxC5vz+r#xT?62tT?Aw%FtQ4Y3gvnwHTwqhxUh89wCa_';

// Create an instance of the URL builder
$urlBuilder = UrlBuilderFactory::create('/img/', $signkey);

// Generate a URL
$url = $urlBuilder->getUrl('cat.jpg', ['w' => 500]);

// Use the URL in your app
echo '<img src="'.$url.'">';

// Prints out
<img src="/img/cat.jpg?w=500&s=af3dc18fc6bfb2afb521e587c348b904">
```

recommend using a 128 character (or larger) signing key to prevent trivial key attacks. Consider using a package like [CryptoKey](https://github.com/AndrewCarterUK/CryptoKey) to generate a secure key.

- Grouping cache in folders

By default Glide groups cached images into folders.

```php
'group_cache_in_folders'    => true,
```

- Defaults

In certain situations you may want to define default image manipulations.

```php
'defaults'  =>  [
    'w' =>  1000,
    'h' =>  1000
]
```

- Set default path prefix

While it’s normally possible to set the full source and cache path using Flysystem, there are situations where it may be desirable to set a default path prefix.

```php
'source_path_prefix'    => 'source',
'cache_path_prefix'     => 'cache',
```