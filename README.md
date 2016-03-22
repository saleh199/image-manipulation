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