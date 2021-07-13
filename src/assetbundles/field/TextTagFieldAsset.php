<?php
/**
 * Text Tag plugin for Craft CMS 3.x
 *
 * Field to create some text and specify which HTML tag it appears as.
 *
 * @link      https://brianhanson.net
 * @copyright Copyright (c) 2021 Brian Hanson
 */

namespace brianjhanson\texttag\assetbundles\field;

use Craft;
use craft\web\AssetBundle;
use craft\web\assets\cp\CpAsset;

/**
 * @author    Brian Hanson
 * @package   TextTag
 * @since     1.0.0
 */
class TextTagFieldAsset extends AssetBundle
{
    // Public Methods
    // =========================================================================

    /**
     * @inheritdoc
     */
    public function init()
    {
        $this->sourcePath = "@brianjhanson/texttag/assetbundles/field/dist";

        $this->depends = [
            CpAsset::class,
        ];

        $this->js = [
            'js/TextTag.js',
        ];

        $this->css = [
            'css/TextTag.css',
        ];

        parent::init();
    }
}
