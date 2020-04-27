# Slim4-Skeleton

[![Build Status](https://travis-ci.org/adriansuter/Slim4-Skeleton.svg?branch=master)](https://travis-ci.org/adriansuter/Slim4-Skeleton)
[![Coverage Status](https://coveralls.io/repos/github/adriansuter/Slim4-Skeleton/badge.svg?branch=master)](https://coveralls.io/github/adriansuter/Slim4-Skeleton?branch=master)

Web application skeleton that uses the [Slim4 Framework](http://www.slimframework.com/), 
[PHP-DI](http://php-di.org/) as dependency injection container, [Nyholm PSR7](https://github.com/Nyholm/psr7) as PSR-7 implementation
and [Twig](https://twig.symfony.com/) as template engine.

This skeleton application was built for [Composer](https://getcomposer.org/).


## Installation

Run this command from the directory in which you want to install your new Slim4 Framework
application.

```bash
composer create-project adriansuter/slim4-skeleton [my-app-name]
```

Replace `[my-app-name]` with the desired directory name for your new application.
You'll want to:

* Point your virtual host document root to your new application's `public/` directory. (Virtual host is the mandatory way to access to your project. If you try to access directly from the container folder you will encounter an error)
* Ensure `cache/` and `logs/` are web writable.

To run the application in development, you can run these commands

```bash
cd [my-app-name]
composer start
```

**That's it! Now go build something cool.**
