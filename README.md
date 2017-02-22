# PolidogSsrBundle

JavaScript server side rendering (SSR) bundle for Symfony.

## Prerequisites
- php7.1
- V8Js (Optional)

## Installation


```
$ composer require polidog/ssr-bundle
```

## Usage

Enable the bundle

```php
<?php
// app/AppKernel.php

public function registerBundles()
{
    $bundles = array(
        // ...
        new Polidog\SsrBundle\SsrBundle(),
        // ...
    );
}
```

Configuration in config.yml:

```apacheconfig
polidog_ssr:
    bundle_src_path: "%kernel.root_dir%/../web/js"
```



