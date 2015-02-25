<?php
/**
 * Registry class
 *
 * @category     Shwager
 * @package      Storage
 * @author       Mathias Witt
 * @copyright    Copyright (c) 2015 Mathias Witt
 */

namespace Shwager\Storage;

/**
 *
 */
use Shwager\Common\SingltonTrait;

/**
 * Class Registry
 * @package Fozb\Pattern\Storage
 */
class Registry implements RegistryInterface
{
    use SingletonTrait;

    protected $values = [];

    /**
     * @param $key
     * @param $value
     */
    public function set($key, $value)
    {
        $this->values[$key] = $value;
    }

    /**
     * @param $key
     * @return mixed
     */
    public function get($key)
    {
        if (!isset($this->values[$key])) {
            throw new \InvalidArgumentException(
                sprintf('The given configuration key ( %s ), does not exist.', mb_strtoupper($key))
            );
        }

        return $this->values[$key];
    }
}