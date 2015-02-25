<?php
/**
 * FilesystemTest tests
 *
 * @category     ShwagerGenerator
 * @package      Test
 * @subpackage   IO
 * @author       Stefan Schwager
 * @copyright    Copyright (c) 2015 Stefan Schwager
 */

namespace Shwager\Tests\IO;

use Shwager\IO\Filesystem;

/**
 * Test the class FilesystemTest
 *
 * @category     ShwagerGenerator
 * @package      Test
 * @subpackage   IO
 * @author       Stefan Schwager
 * @copyright    Copyright (c) 2015 Stefan Schwager
 */
class FilesystemTest extends \PHPUnit_Framework_TestCase
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
        $adapter = new Filesystem($interface);
    }

    /**
     * Test to get the path
     */
    public function testGetStructure()
    {
        $expectedValue = array('structure');
        $interface = $this->getMock(
            'Shwager\IO\PathAdapterInterface'
        );
        $interface->expects($this->exactly(1))
            ->method('getPath')
            ->will($this->returnValue($expectedValue));
        $adapter = new Filesystem($interface);
        $this->assertEquals(
            $expectedValue,
            $adapter->getStructure()
        );
    }
}