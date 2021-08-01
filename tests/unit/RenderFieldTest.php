<?php
/**
 * craft-super-text module for Craft CMS 3.x
 *
 * @link      https://onedesigncompany.com
 * @copyright Copyright (c) 2021 One Design Company
 */

namespace brianjhanson\supertexttests\unit;

use brianjhanson\supertext\models\SuperTextModel;
use Codeception\Test\Unit;
use UnitTester;

/**
 * @author    One Design Company
 * @package   craft-super-text
 * @since     1.0.0
 */
class RenderFieldTest extends Unit
{
    /**
     * @var UnitTester
     */
    protected $tester;

    public function testRenderField()
    {
        $text = 'Some Text';
        $model = new SuperTextModel([
            'text' => $text,
            'tag' => 'p'
        ]);

        $this->assertSame(
            '<p>' . $text . '</p>',
            (string)$model->getHtml()
        );
    }

    public function testRenderWithClass()
    {
        $text = 'Some Text';
        $model = new SuperTextModel([
            'text' => $text,
            'tag' => 'p',
        ]);

        $this->assertSame(
            '<p class="test-class">' . $text . '</p>',
            (string)$model->getHtml([
                'class' => 'test-class'
            ])
        );
    }
}
