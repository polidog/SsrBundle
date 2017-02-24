<?php
/**
 * Created by PhpStorm.
 * User: polidog
 * Date: 2017/02/23.
 */

namespace Polidog\SsrBundle\Cache;

use Psr\SimpleCache\CacheInterface;
use Sabre\Cache\Apcu;

class ApcuCache implements CacheInterface
{
    /**
     * @var string
     */
    private $namespace;

    /**
     * @var Apcu
     */
    private $apcu;

    /**
     * ApcuCache constructor.
     *
     * @param string $namespace
     */
    public function __construct($namespace, Apcu $apcu = null)
    {
        $this->namespace = $namespace;
        if (null === $apcu) {
            $apcu = new Apcu();
        }
        $this->apcu = $apcu;
    }

    public function get($key, $default = null)
    {
        return $this->apcu->get($this->getKey($key), $default);
        // TODO: Implement get() method.
    }

    public function set($key, $value, $ttl = null)
    {
        return $this->apcu->set($this->get($key), $value, $ttl);
    }

    public function delete($key)
    {
        return $this->apcu->delete($this->get($key));
    }

    public function clear()
    {
        return $this->apcu->clear();
    }

    public function getMultiple($keys, $default = null)
    {
        return $this->apcu->getMultiple($this->getMultipleKeys($keys), $default);
    }

    public function setMultiple($values, $ttl = null)
    {
        return $this->apcu->setMultiple($this->iteratorMultiple($values), $ttl);
    }

    public function deleteMultiple($keys)
    {
        return $this->apcu->deleteMultiple($this->getMultipleKeys($keys));
    }

    public function has($key)
    {
        return $this->apcu->has($this->getKey($key));
    }

    private function getKey($key)
    {
        return $this->namespace.'_'.$key;
    }

    private function getMultipleKeys($keys)
    {
        $_keys = [];
        foreach ($keys as $key) {
            $_keys[] = $this->get($key);
        }

        return $_keys;
    }

    private function iteratorMultiple($values)
    {
        foreach ($values as $key => $value) {
            yield $this->getKey($key) => $value;
        }
    }
}
