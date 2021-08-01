<?php
/**
 * craft-super-text module for Craft CMS 3.x
 *
 * @link      https://brianhanson.net
 * @copyright Copyright (c) 2021 Brian Hanson
 */


namespace brianjhanson\supertexttests\fixtures;

use craft\records\Section_SiteSettings;

/**
 * @author    Brian Hanson
 * @package   craft-super-text
 * @since     1.0.0
 */
class SectionSettingFixture extends \craft\test\Fixture
{
    /**
     * @inheritdoc
     */
    public $dataFile = __DIR__ . '/data/section-settings.php';

    /**
     * @inheritdoc
     */
    public $modelClass = Section_SiteSettings::class;
}
