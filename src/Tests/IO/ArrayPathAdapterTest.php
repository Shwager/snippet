<?php
/**
 * ArrayPathAdapter tests
 *
 * @category     ShwagerGenerator
 * @package      Test
 * @subpackage   IO
 * @author       Stefan Schwager
 * @copyright    Copyright (c) 2015 Stefan Schwager
 */

namespace Shwager\Tests\IO;

use Shwager\IO\ArrayPathAdapter;

/**
 * Test the class ArrayPathAdapter
 *
 * @category     ShwagerGenerator
 * @package      Test
 * @subpackage   IO
 * @author       Stefan Schwager
 * @copyright    Copyright (c) 2015 Stefan Schwager
 */
class ArrayPathAdapterTest extends \PHPUnit_Framework_TestCase
{
    /**
     * Test with invalid interface
     *
     * @expectedException \PHPUnit_Framework_Error
     */
    public function testConstructorWithInvalidInterface()
    {
        $interface = $this->getMock(
            'Shwager\IO\FilesystemInterface'
        );
        $adapter = new ArrayPathAdapter($interface);
    }

    /**
     * Test to get the path
     */
    public function testGetPath()
    {
        $expectedValue = array('path');
        $interface = $this->getMock(
            'Shwager\Parser\ArrayPathInterface'
        );
        $interface->expects($this->exactly(1))
            ->method('getPath')
            ->will($this->returnValue($expectedValue));
        $adapter = new ArrayPathAdapter($interface);
        $this->assertEquals(
            $expectedValue,
            $adapter->getPath()
        );
    }
}