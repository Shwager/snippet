<?php
/**
 * Created by PhpStorm.
 * User: matze
 * Date: 24.02.15
 * Time: 08:43
 */

namespace Shwager\IO;

/**
 * Class Filesystem
 * @package Shwager\IO
 */
class Filesystem implements FilesystemInterface
{
    private $pathAdapter;

    /**
     * @param PathAdapterInterface $pathAdapter
     */
    public function __construct(PathAdapterInterface $pathAdapter)
    {
        $this->pathAdapter = $pathAdapter;
    }

    /**
     * @return mixed
     */
    public function getStructure()
    {
        return $this->pathAdapter->getPath();
    }
}