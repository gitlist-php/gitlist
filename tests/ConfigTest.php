<?php

namespace GitList\Test;

use GitList\Config;
use org\bovigo\vfs\vfsStream;

class ConfigTest extends \PHPUnit_Framework_TestCase {

    /**
     * @var Config
     */
    protected $config;

    /**
     * Setup mock file system
     */
    protected function setUp() {
        $root = vfsStream::setup('tmp');
        $file = vfsStream::newFile('config.ini');
        $file->setContent(
            file_get_contents('config.ini-example') .
            PHP_EOL . '[git]' . PHP_EOL .
            'repositories[] = \'vfs://tmp\''
        );
        $root->addChild($file);

        $this->config = Config::fromFile(vfsStream::url('tmp/config.ini'));
    }


    /**
     * @covers \GitList\Config::get
     */
    public function testGet() {
        $this->assertContains(
            'vfs://tmp',
            $this->config->get('git', 'repositories')
        );
        $this->assertFalse($this->config->get('dummy', 'dummy'));
        $this->assertFalse($this->config->get('git', 'dummy'));
    }

    /**
     * @covers \GitList\Config::getSection
     */
    public function testGetSection() {
        $this->assertFalse($this->config->getSection('dummy'));
        $this->assertInternalType(
            'array',
            $this->config->getSection('git')
        );
    }

    /**
     * @covers \GitList\Config::set
     */
    public function testSet() {
        $this->assertNull($this->config->set('git', 'repositories', '/tmp'));
        $this->assertEquals(
            '/tmp',
            $this->config->get('git', 'repositories')
        );
    }

    /**
     * @covers \GitList\Config::__construct
     */
    public function testConstructor() {
        $object = new Config(array(
                'git' => array('repositories' => '/dev/null'),
                'section_two' => array('key' => 'value'))
        );
        $this->assertFalse($object->get('section', 'key'));
        $this->assertEquals(
            '/dev/null',
            $object->get('git', 'repositories')
        );
    }

    /**
     * @covers \GitList\Config::fromFile
     * @covers \GitList\Config::validateOptions
     */
    public function testFromFile()
    {
        $root = vfsStream::setup('tmp');
        $file = vfsStream::newFile('config.ini');
        $file->setContent(
            file_get_contents('config.ini-example') .
            PHP_EOL . '[git]' . PHP_EOL .
            'repositories[] = \'vfs://tmp\''
        );
        $root->addChild($file);

        $object = Config::fromFile(vfsStream::url('tmp/config.ini'));
        $this->assertFalse($object->get('section', 'key'));
        $this->assertContains(
            'vfs://tmp',
            $object->get('git', 'repositories')
        );
    }
}