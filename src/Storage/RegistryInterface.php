<?php
/**
 * Registry Interface
 *
 * @category     Shwager
 * @package      Storage
 * @author       Mathias Witt
 * @copyright    Copyright (c) 2015 Mathias Witt
 */
namespace Shwager\Storage;

/**
 * Interface RegistryInterface
 * @package Shwager\Storage
 */
interface RegistryInterface
{
    public function get($key);
    public function set($key, $value);
}