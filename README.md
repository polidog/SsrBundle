# PolidogSsrBundle

[![Build Status](https://travis-ci.org/polidog/SsrBundle.svg?branch=master)](https://travis-ci.org/polidog/SsrBundle)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/polidog/SsrBundle/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/polidog/SsrBundle/?branch=master)

JavaScript server side rendering (SSR) bundle for Symfony.  
Inspected by [bearsunday/BEAR.SsrModule](https://github.com/bearsunday/BEAR.SsrModule)

## Prerequisites
- php7.1
- V8Js (Optional)
- Symfony3.3~

## Installation

```
$ composer require polidog/ssr-bundle "^1.0"
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

Controller Annotation.

```php
// src/AppBundle/Controller/DefaultController.php

<?php

namespace AppBundle\Controller;

use Polidog\SsrBundle\Annotations\Ssr;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     * @Ssr(
     *     app="index_ssr",
     *     state={"hello"},
     *     metas={"title"}
     * )
     */
    public function indexAction()
    {
        return [
            'hello' => [
                'name' => 'polidog',
            ],
            'title' => 'polidog lab'
        ];
    }
}

```

### Using CacheBaracoa

Set Annotation cache parameter.

```$xslt
    /**
     * @Route("/", name="homepage")
     * @Ssr(
     *     app="index_ssr",
     *     state={"hello"},
     *     metas={"title"},
     *     cache=true
     * )
     */
```  
