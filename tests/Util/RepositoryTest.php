<?php

namespace GitList\Test\Util;


use GitList\Application;
use GitList\Config;
use GitList\Util\Repository;

class RepositoryTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var Repository
     */
    private $repository;

    /**
     * @var Application
     */
    private $application;

    /**
     * Setup unit test
     */
    protected function setUp()
    {
        $this->application = new Application(new Config());
        $this->repository = new Repository($this->application);
    }

    /**
     * Test the get file type with extension
     * @covers \GitList\Util\Repository::getFileType()
     */
    public function testGetFileTypeWithoutExtension()
    {
        $this->assertSame('text', $this->repository->getFileType('file-without-extension'));
    }

    /**
     * Test the get file type with extension
     * @covers \GitList\Util\Repository::getFileType()
     */
    public function testGetFileTypeForDefaultFileType()
    {
        $this->assertSame('clike', $this->repository->getFileType('main.cpp'));
    }

    /**
     * Test the get file type with extension from app specific config
     * @covers \GitList\Util\Repository::getFileType()
     */
    public function testGetFileTypeForAppSpecificFileType()
    {
        $this->application['filetypes'] = ['php3'=> 'php', 'php4' => 'php'];
        $this->assertSame('php', $this->repository->getFileType('legacy.php4'));
    }

    /**
     * Test the get file type with extension for default path
     * @covers \GitList\Util\Repository::getFileType()
     */
    public function testGetFileTypeDefault()
    {
        $this->assertSame('text', $this->repository->getFileType('nl_NL.po'));
    }

    /**
     * Test if the file type is binary for without extension
     * @covers \GitList\Util\Repository::isBinary()
     */
    public function testIsBinaryWithoutExtension()
    {
        $this->assertFalse($this->repository->isBinary('README'));
    }

    /**
     * Test if the file type is binary for with extension
     * @covers \GitList\Util\Repository::isBinary()
     */
    public function testIsBinaryForDefaultFileType()
    {
        $this->assertTrue($this->repository->isBinary('invoice.pdf'));
    }

    /**
     * Test if the file type is binary from app specific config
     * @covers \GitList\Util\Repository::isBinary()
     */
    public function testIsBinaryForAppSpecificFileType()
    {
        $this->application['binary_filetypes'] = ['php3'=> false, 'php4' => false];
        $this->assertFalse($this->repository->isBinary('legacy.php4'));
    }

    /**
     * Test if the file type is binary for the default path
     * @covers \GitList\Util\Repository::isBinary()
     */
    public function testIsBinaryDefault()
    {
        $this->assertFalse($this->repository->isBinary('nl_NL.po'));
    }
}