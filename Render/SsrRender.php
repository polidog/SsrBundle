<?php
/**
 * Created by PhpStorm.
 * User: polidog
 * Date: 2017/02/22.
 */

namespace Polidog\SsrBundle\Render;

use Koriym\Baracoa\BaracoaInterface;
use Polidog\SsrBundle\Annotations\Ssr;

class SsrRender implements SsrRenderInterface
{
    /**
     * @var BaracoaInterface
     */
    private $baracoa;

    /**
     * SsrRender constructor.
     *
     * @param BaracoaInterface $baracoa
     */
    public function __construct(BaracoaInterface $baracoa)
    {
        $this->baracoa = $baracoa;
    }

    /**
     * {@inheritdoc}
     */
    public function render(Ssr $ssr, array $parameters)
    {
        return $this->baracoa->render(
            $ssr->getApp(),
            $this->filter($ssr->getState(), $parameters),
            $this->filter($ssr->getMetas(), $parameters)
        );
    }

    private function filter(array $keys, array $parameters)
    {
        if ($keys === array('*')) {
            return $parameters;
        }

        $errorKeys = array_keys(array_diff(array_values($keys), array_keys($parameters)));
        if ($errorKeys) {
            throw new \LogicException(implode(',', $errorKeys));
        }

        return array_filter((array) $parameters, function ($key) use ($keys) {
            return in_array($key, $keys);
        }, ARRAY_FILTER_USE_KEY);
    }
}
