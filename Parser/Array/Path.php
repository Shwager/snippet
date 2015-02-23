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

namespace ShwagerGenerator\Parser\Array;

/**
 * Generate an array with a full path
 *
 * @category     ShwagerGenerator
 * @package      Parser
 * @subpackage   Array
 * @author       Stefan Schwager
 * @copyright    Copyright (c) 2015 Stefan Schwager
 */
class Path {

    private $_path = array();

    /**
     * Get the generated array
     *
     * @param array $array
     *
     * $array Example :
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
     *  @return array
     */
    public function getPath(array $array)
    {
        $this->_generate($array);

        return $this->_path;
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
                    $this->_path[] = $path;
                    $this->_generate($value, $path);
                } else {
                    $this->_path[] = $key;
                    $this->_generate($value, $key);
                }
            } else {
                if (null !== $previous) {
                    $this->_path[] = $previous . DIRECTORY_SEPARATOR . $value;
                } else {
                    $this->_path[] = $value;
                }
            }
        }
    }
}