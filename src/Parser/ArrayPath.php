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
 * Generate an array with a full path
 *
 * @category     ShwagerGenerator
 * @package      Parser
 * @subpackage   Array
 * @author       Stefan Schwager
 * @copyright    Copyright (c) 2015 Stefan Schwager
 */
class ArrayPath implements ArrayPathInterface
{
    /**
     * @var array
     */
    private $path = [];
    /**
     * @var string
     */
    private $previous;

    /**
     *   $array Example :
     *   $array = [
     *       'module' => [
     *           'Application' => [
     *               'src' => [
     *                   'Application' => [
     *                       'Controller',
     *                       'Parser'
     *                   ]
     *               ],
     *               'config' => ['last'],
     *               'view' => [
     *                   'error',
     *                   'layout',
     *                   'application' => [
     *                       'index',
     *                       'contact'
     *                   ],
     *                   'partials' => ['fii', 'b-i'],
     *               ],
     *           ],
     *       ],
     *       'module2' => [
     *           'MFSchwager2' => [
     *               'src2',
     *               'config2' => ['last2'],
     *               'view2' => ['last2'],
     *           ],
     *       ]
     *   ];
     *
     * @param array $path
     */
    public function __construct(array $path)
    {
        $this->generate(new \RecursiveArrayIterator($path));
    }

    /**
     * Get the generated array
     *
     *
     *  @return array
     */
    public function getPath()
    {
        return $this->path;
    }

    /**
     * Generate the Folder Structure from a given array
     *
     * @param \RecursiveArrayIterator $iterator
     * @param null|string $previous
     */
    private function generate(\RecursiveArrayIterator $iterator, $previous = null)
    {
        while ($iterator->valid()) {
            if ($iterator->hasChildren()) {
                // print all children;
                // For the root directory we don't need a directory separator
                $this->previous = $previous === null
                    ? $iterator->key()
                    : $previous . DIRECTORY_SEPARATOR . $iterator->key();
                $this->path[] = $this->previous;
                $this->generate($iterator->getChildren(),  $this->previous);
            } else {
                // For the root directory we don't need a directory separator
                $this->path[] = $previous === null
                    ? $iterator->current()
                    : $this->previous . DIRECTORY_SEPARATOR . $iterator->current();
            }

            $iterator->next();
        }
    }
}