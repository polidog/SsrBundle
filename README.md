# PolidogSsrBundle

JavaScript server side rendering (SSR) bundle for Symfony.  
Inspected by [bearsunday/BEAR.SsrModule](https://github.com/bearsunday/BEAR.SsrModule)

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



