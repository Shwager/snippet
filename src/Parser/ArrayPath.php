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
        $this->path = $path;
        $this->_generate($this->path);
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
     * Generate
     *
     * @param array $array
     * @param null $previous
     */
    private function _generate(array $array, $previous = null)
    {
        foreach ($array as $key => $value) {
            if (is_array($value)) {
                if (null !== $previous) {
                    $path = $previous . DIRECTORY_SEPARATOR . $key;
                    $this->path[] = $path;
                    $this->_generate($value, $path);
                } else {
                    $this->path[] = $key;
                    $this->_generate($value, $key);
                }
            } else {
                if (null !== $previous) {
                    $this->path[] = $previous . DIRECTORY_SEPARATOR . $value;
                } else {
                    $this->path[] = $value;
                }
            }
        }
    }
}