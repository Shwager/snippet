<?php
/**
 * Parser class
 *
 * @category     ShwagerGenerator
 * @package      Parser
 * @subpackage   Array
 * @author       Stefan Schwager
 * @copyright    Copyright (c) 2015 Stefan Schwager
 */


namespace Shwager\Parser;

/**
 * Interface ArrayPathInterface
 * @package Shwager\Parser
 */
interface ArrayPathInterface
{
    /**
     * @return mixed
     */
    public function getPath();
}