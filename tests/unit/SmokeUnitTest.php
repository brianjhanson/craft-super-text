<?php
/**
 * Text Tag plugin for Craft CMS 3.x
 *
 * Field to create some text and specify which HTML tag it appears as.
 *
 * @link      https://brianhanson.net
 * @copyright Copyright (c) 2021 Brian Hanson
 */

namespace brianjhanson\supertexttests\unit;

use brianjhanson\supertext\SuperText;
use Codeception\Test\Unit;
use UnitTester;

/**
 * SmokeUnitTest
 *
 *
 * @author    Brian Hanson
 * @package   SuperText
 * @since     1.0.0
 */
class SmokeUnitTest extends Unit
{
    /**
     * @var UnitTester
     */
    protected $tester;

    /**
     *
     */
    public function testPluginInstance()
    {
        $this->assertInstanceOf(
            SuperText::class,
            SuperText::$plugin
        );
    }

}
