<?php
/**
 * ArrayPath tests
 *
 * @category     ShwagerGenerator
 * @package      Test
 * @subpackage   Parser
 * @author       Stefan Schwager
 * @copyright    Copyright (c) 2015 Stefan Schwager
 */

namespace Shwager\Tests\IO;

use Shwager\Parser\ArrayPath;

/**
 * Test the class ArrayPath
 *
 * @category     ShwagerGenerator
 * @package      Test
 * @subpackage   Parser
 * @author       Stefan Schwager
 * @copyright    Copyright (c) 2015 Stefan Schwager
 */
class ArrayPathTest extends \PHPUnit_Framework_TestCase
{
    /**
     * Test to get the path
     *
     * @dataProvider getPathDataProvider
     */
    public function testGetPath($expected, $args)
    {
        $arrayPath = new ArrayPath($args);
        $this->assertEquals(
            $arrayPath->getPath(),
            $expected
        );
    }

    /**
     * Data provider to get the path structure
     */
    public function getPathDataProvider()
    {
        return[
            [
                $this->getExpectedValues(),
                $this->getStructureArgs()
            ]
        ];
    }

    /**
     * Get the expected values
     *
     * @return array
     */
    private function getExpectedValues()
    {
        return [
            '/module',
            '/module/Application',
            '/module/Application/src',
            '/module/Application/src/Application',
            '/module/Application/src/Application/Controller',
            '/module/Application/src/Application/Parser',
            '/module/Application/config',
            '/module/Application/config/last',
            '/module/Application/view',
            '/module/Application/view/error',
            '/module/Application/view/layout',
            '/module/Application/view/application',
            '/module/Application/view/application/index',
            '/module/Application/view/application/contact',
            '/module/Application/view/partials',
            '/module/Application/view/partials/fii',
            '/module/Application/view/partials/b-i',
            '/module2',
            '/module2/Shwager2',
            '/module2/Shwager2/src2',
            '/module2/Shwager2/config2',
            '/module2/Shwager2/config2/last2',
            '/module2/Shwager2/view2',
            '/module2/Shwager2/view2/last2'
        ];
    }
    
    /**
     * Get the structure arguments
     *
     * @return array
     */
    private function getStructureArgs()
    {
        return [
            'module' => [
                'Application' => [
                    'src' => [
                        'Application' => [
                            'Controller',
                            'Parser'
                        ]
                    ],
                    'config' => ['last'],
                    'view' => [
                        'error',
                        'layout',
                        'application' => [
                            'index',
                            'contact'
                        ],
                        'partials' => ['fii', 'b-i'],
                    ],
                ],
            ],
            'module2' => [
                'Shwager2' => [
                    'src2',
                    'config2' => ['last2'],
                    'view2' => ['last2'],
                ],
            ]
        ];
    }
}