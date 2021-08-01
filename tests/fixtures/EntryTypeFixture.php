<?php
/**
 * craft-super-text module for Craft CMS 3.x
 *
 * @link      https://brianhanson.net
 * @copyright Copyright (c) 2021 Brian Hanson
 */


namespace brianjhanson\supertexttests\fixtures;


use craft\records\EntryType;

/**
 * @author    Brian Hanson
 * @package   craft-super-text
 * @since     1.0.0
 */
class EntryTypeFixture extends \craft\test\Fixture
{
    /**
     * @inheritdoc
     */
    public $dataFile = __DIR__ . '/data/entry-types.php';

    /**
     * @inheritdoc
     */
    public $modelClass = EntryType::class;

    /**
     * @inheritdoc
     */
    public $depends = [FieldLayoutFixture::class, SectionsFixture::class];
}
