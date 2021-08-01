<?php
/**
 * craft-super-text module for Craft CMS 3.x
 *
 * @link      https://onedesigncompany.com
 * @copyright Copyright (c) 2021 Brian Hanson
 */


namespace brianjhanson\supertexttests\fixtures;



use craft\test\fixtures\elements\EntryFixture as BaseEntryFixture;

/**
 * @author    Brian Hanson
 * @package   craft-super-text
 * @since     1.0.0
 */
class EntryFixture extends BaseEntryFixture
{
    /**
     * @inheritdoc
     */
    public $dataFile = __DIR__ . '/data/entries.php';

    /**
     * @inheritdoc
     */
    public $depends = [FieldLayoutFixture::class, SectionsFixture::class, EntryTypeFixture::class];
}
