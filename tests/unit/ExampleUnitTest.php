<?php
/**
 * Text Tag plugin for Craft CMS 3.x
 *
 * Field to create some text and specify which HTML tag it appears as. 
 *
 * @link      https://brianhanson.net
 * @copyright Copyright (c) 2021 Brian Hanson
 */

namespace brianjhanson\texttagtests\unit;

use Codeception\Test\Unit;
use UnitTester;
use Craft;
use brianjhanson\texttag\TextTag;

/**
 * ExampleUnitTest
 *
 *
 * @author    Brian Hanson
 * @package   TextTag
 * @since     1.0.0
 */
class ExampleUnitTest extends Unit
{
    // Properties
    // =========================================================================

    /**
     * @var UnitTester
     */
    protected $tester;

    // Public methods
    // =========================================================================

    // Tests
    // =========================================================================

    /**
     *
     */
    public function testPluginInstance()
    {
        $this->assertInstanceOf(
            TextTag::class,
            TextTag::$plugin
        );
    }

    /**
     *
     */
    public function testCraftEdition()
    {
        Craft::$app->setEdition(Craft::Pro);

        $this->assertSame(
            Craft::Pro,
            Craft::$app->getEdition()
        );
    }
}
