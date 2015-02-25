<?php
/**
 * Singleton trait
 *
 * @category     Shwager
 * @package      Storage
 * @author       Mathias Witt
 * @copyright    Copyright (c) 2015 Mathias Witt
 */

namespace Shwager\Common;

/**
 * Class SingletonTrait
 * @package Fozb\Pattern\Singleton
 */
trait SingletonTrait {
    /**
     * @var
     */
    private static $instance;

    /**
     * @return SingletonTrait
     */
    static public function getInstance()
    {
        if (self::$instance === null) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    private function __construct(){}
    private function __clone(){}
}