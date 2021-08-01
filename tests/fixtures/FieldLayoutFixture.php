<?php
/**
 * craft-super-text module for Craft CMS 3.x
 *
 * @link      https://onedesigncompany.com
 * @copyright Copyright (c) 2021 Brian Hanson
 */


namespace brianjhanson\supertexttests\fixtures;


use craft\models\FieldLayout;
use craft\test\fixtures\FieldLayoutFixture as BaseFieldLayoutFixture;

/**
 * @author    Brian Hanson
 * @package   craft-super-text
 * @since     1.0.0
 */
class FieldLayoutFixture extends BaseFieldLayoutFixture
{
    /**
     * @inheritdoc
     */
    public $dataFile = __DIR__ . '/data/field-layout.php';

    public $modelClass = FieldLayout::class;
}
