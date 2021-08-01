<?php
/**
 * craft-super-text module for Craft CMS 3.x
 *
 * @link      https://onedesigncompany.com
 * @copyright Copyright (c) 2021 Brian Hanson
 */

namespace brianjhanson\supertexttests\fixtures;

use Craft;
use craft\records\Section;
use craft\services\Sections;
use craft\test\Fixture;

/**
 * @author    Brian Hanson
 * @package   craft-super-text
 * @since     1.0.0
 */
class SectionsFixture extends Fixture
{
    /**
     * @inheritdoc
     */
    public $dataFile = __DIR__ . '/data/sections.php';

    /**
     * @inheritdoc
     */
    public $modelClass = Section::class;

    /**
     * @inheritdoc
     */
    public $depends = [SectionSettingFixture::class];

    /**
     * @inheritdoc
     */
    public function load()
    {
        parent::load();

        Craft::$app->set('sections', new Sections());
    }
}
