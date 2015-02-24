<?php
/**
 * Created by PhpStorm.
 * User: matze
 * Date: 24.02.15
 * Time: 08:43
 */

namespace Shwager\IO;

/**
 * Interface FilesystemInterface
 * @package Shwager\IO
 */
interface FilesystemInterface
{
    /**
     * @return mixed
     */
    public function getStructure();
}