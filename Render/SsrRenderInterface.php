<?php
/**
 * Created by PhpStorm.
 * User: polidog
 * Date: 2017/02/22.
 */

namespace Polidog\SsrBundle\Render;

use Polidog\SsrBundle\Annotations\Ssr;

interface SsrRenderInterface
{
    /**
     * @param Ssr   $ssr
     * @param array $parameters
     *
     * @return string
     */
    public function render(Ssr $ssr, array $parameters);
}
