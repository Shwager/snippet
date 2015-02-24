<?php
/**
 * Created by PhpStorm.
 * User: matze
 * Date: 24.02.15
 * Time: 08:52
 */

namespace Shwager\IO;

use Shwager\Parser\ArrayPathInterface;

/**
 * Class ArrayPathAdapter
 * @package Shwager\IO
 */
class ArrayPathAdapter implements PathAdapterInterface
{
    /**
     * @var ArrayPathInterface
     */
    private $arrayPath;

    /**
     * @param ArrayPathInterface $arrayPath
     */
    public function __construct(ArrayPathInterface $arrayPath)
    {
        $this->arrayPath = $arrayPath;
    }

    /**
     * @return mixed
     */
    public function getPath()
    {
        return $this->arrayPath->getPath();
    }
}