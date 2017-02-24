<?php
/**
 * Created by PhpStorm.
 * User: polidog
 * Date: 2017/02/19.
 */

namespace Polidog\SsrBundle\Annotations;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\ConfigurationAnnotation;

/**
 * @Annotation
 */
final class Ssr extends ConfigurationAnnotation
{
    /**
     * @var string entry point
     */
    private $app;

    /**
     * @var array
     */
    private $state = array('*');

    /**
     * @var array
     */
    private $metas = array();

    private $cache = false;

    /**
     * @return string
     */
    public function getApp()
    {
        return $this->app;
    }

    /**
     * @param string $app
     *
     * @return $this
     */
    public function setApp($app)
    {
        $this->app = $app;

        return $this;
    }

    /**
     * @return array
     */
    public function getState()
    {
        return $this->state;
    }

    /**
     * @param array $state
     *
     * @return $this
     */
    public function setState($state)
    {
        $this->state = $state;

        return $this;
    }

    /**
     * @return array
     */
    public function getMetas()
    {
        return $this->metas;
    }

    /**
     * @param array $metas
     *
     * @return $this
     */
    public function setMetas($metas)
    {
        $this->metas = $metas;

        return $this;
    }

    /**
     * @return bool
     */
    public function isCache(): bool
    {
        return $this->cache;
    }

    /**
     * @param bool $cache
     *
     * @return $this
     */
    public function setCache($cache)
    {
        $this->cache = $cache;

        return $this;
    }

    public function getAliasName()
    {
        return 'ssr';
    }

    public function allowArray()
    {
        return false;
    }
}
