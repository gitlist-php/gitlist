<?php

namespace GitList\Test\Escaper;

use GitList\Escaper\ArgumentEscaper;

class ArgumentEscaperTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var ArgumentEscaper
     */
    private $argumentEscaper;

    /**
     * Setup unit test
     */
    protected function setUp()
    {
        $this->argumentEscaper = new ArgumentEscaper();
    }

    /**
     * Test escape function escapes commandline arguments
     * @covers       \GitList\Escaper\ArgumentEscaper::escape()
     * @dataProvider argumentDataProvider
     * @param $argument The unescaped argument
     * @param $escaped The escaped variant of the argument
     */
    public function testEscape($argument, $escaped)
    {
        $this->assertSame($escaped, $this->argumentEscaper->escape($argument));
    }

    /**
     * A data provider based on the commandline arguments that need escaping
     * @return array
     * @see http://php.net/manual/en/function.escapeshellcmd.php
     */
    public function argumentDataProvider()
    {
        return [
            'Null' => [null, null],
            'Ampersand' => ['Tom&Jerry', 'Tom\&Jerry'],
            'Dollar sign' => ['$value', '\$value'],
            'Single quote sign' => ["'Open single quote", "\'Open single quote"],
            'Double quote sign' => ['"Another quote', '\"Another quote']

        ];
    }
}
