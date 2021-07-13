<?php
/**
 * Text Tag plugin for Craft CMS 3.x
 *
 * Field to create some text and specify which HTML tag it appears as.
 *
 * @link      https://brianhanson.net
 * @copyright Copyright (c) 2021 Brian Hanson
 */

namespace brianjhanson\texttag\fields;

use brianjhanson\texttag\assetbundles\field\TextTagFieldAsset;
use brianjhanson\texttag\models\TextTagModel;
use brianjhanson\texttag\TextTag;

use Craft;
use craft\base\ElementInterface;
use craft\base\Field;
use craft\helpers\Html;
use craft\helpers\Template;
use craft\web\View;
use yii\db\Schema;
use craft\helpers\Json;

/**
 * @author    Brian Hanson
 * @package   TextTag
 * @since     1.0.0
 */
class TextTagField extends Field
{
    // Public Properties
    // =========================================================================

    /**
     * @var array
     */
    public $availableTags;

    // Static Methods
    // =========================================================================

    /**
     * @inheritdoc
     */
    public static function displayName(): string
    {
        return Craft::t('text-tag', 'Text Tag');
    }

    // Public Methods
    // =========================================================================

    /**
     * @inheritdoc
     */
    public function rules()
    {
        $rules = parent::rules();
        $rules = array_merge($rules, []);
        return $rules;
    }

    /**
     * @inheritdoc
     */
    public function getContentColumnType(): string
    {
        return Schema::TYPE_JSON;
    }

    /**
     * @inheritdoc
     */
    public function normalizeValue($value, ElementInterface $element = null)
    {
        return new TextTagModel($value);
    }

    /**
     * @inheritdoc
     */
    public function serializeValue($value, ElementInterface $element = null)
    {
        return parent::serializeValue($value, $element);
    }

    /**
     * @return string[]
     */
    public function getAvailableTags()
    {
        return [
            'h1',
            'h2',
            'h3',
            'h4',
            'h5',
            'h6',
            'p',
            'span',
            'div'
        ];
    }

    public function getAvailableTagOptions()
    {
        $tags = $this->getAvailableTags();
        $options = [];
        foreach ($tags as $tag) {
            $options[] = [
                'value' => $tag,
                'label' => $tag
            ];
        }

        return $options;
    }

    /**
     * @inheritdoc
     */
    public function getSettingsHtml()
    {
        $options = $this->getAvailableTagOptions();
        $values = $this->availableTags;

        // Render the settings template
        return Craft::$app->getView()->renderTemplate(
            'text-tag/_components/fields/text-tag/settings',
            [
                'field' => $this,
                'options' => $options,
                'values' => $values
            ]
        );
    }

    /**
     * @inheritdoc
     */
    public function getInputHtml($value, ElementInterface $element = null): string
    {
        // Register our asset bundle
        Craft::$app->getView()->registerAssetBundle(TextTagFieldAsset::class);

        // Get our id and namespace
        $id = Craft::$app->getView()->formatInputId($this->handle);
        $namespacedId = Craft::$app->getView()->namespaceInputId($id);

        // Variables to pass down to our field JavaScript to let it namespace properly
        $jsonVars = [
            'id' => $id,
            'name' => $this->handle,
            'namespace' => $namespacedId,
            'prefix' => Craft::$app->getView()->namespaceInputId(''),
        ];
        $jsonVars = Json::encode($jsonVars);
        Craft::$app->getView()->registerJs("$('#{$namespacedId}-field').TextTagTextTag(" . $jsonVars . ");");

        // Render the input template
        return Craft::$app->getView()->renderTemplate(
            'text-tag/_components/fields/text-tag/input',
            [
                'name' => $this->handle,
                'value' => $value,
                'field' => $this,
                'id' => $id,
                'namespacedId' => $namespacedId,
            ]
        );
    }
}
