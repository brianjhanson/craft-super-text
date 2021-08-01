<?php
/**
 * Text Tag plugin for Craft CMS 3.x
 *
 * Field to create some text and specify which HTML tag it appears as.
 *
 * @link      https://brianhanson.net
 * @copyright Copyright (c) 2021 Brian Hanson
 */

namespace brianjhanson\supertext\fields;

use brianjhanson\supertext\assetbundles\field\SuperTextFieldAsset;
use brianjhanson\supertext\models\SuperTextModel;
use Craft;
use craft\base\ElementInterface;
use craft\fields\PlainText;
use craft\helpers\Json;
use yii\db\Schema;

/**
 * @author    Brian Hanson
 * @package   SuperText
 * @since     1.0.0
 */
class SuperTextField extends PlainText
{
    /**
     * @var array
     */
    public $availableTags;

    /**
     * @inheritdoc
     */
    public static function displayName(): string
    {
        return Craft::t('super-text', 'Super Text');
    }

    /**
     * @inheritdoc
     */
    public function rules(): array
    {
        return array_merge(parent::rules(), []);
    }

    /**
     * @inheritdoc
     */
    public function getContentColumnType(): string
    {
        return Schema::TYPE_TEXT;
    }

    /**
     * @inheritdoc
     */
    public function normalizeValue($value, ElementInterface $element = null)
    {
        if (is_string($value)) {
            $value = Json::decodeIfJson($value);
        }

        if ($value instanceof SuperTextModel) {
            return $value;
        } elseif (is_array($value)) {
            $value = new SuperTextModel($value);
        } else {
            $value = new SuperTextModel([
                'text' => '',
                'tag' => 'p'
            ]);
        }

        return $value;
    }

    /**
     * @inheritdoc
     */
    public function getElementValidationRules(): array
    {
        return [];
    }

    /**
     * @inheritdoc
     */
    public function serializeValue($value, ElementInterface $element = null)
    {
        return $value;
    }


    /**
     * @return string[]
     */
    public function getAllAvailableTags(): array
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

    protected function createTagOptions($tags)
    {
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
     * @return array
     */
    public function getAllAvailableTagOptions(): array
    {
        return $this->createTagOptions($this->getAllAvailableTags());
    }

    /**
     * @return array
     */
    public function getAvailableTagOptions(): array
    {
        return $this->createTagOptions($this->availableTags);
    }

    /**
     * @inheritdoc
     */
    public function getSettingsHtml()
    {
        $options = $this->getAllAvailableTagOptions();
        $values = $this->availableTags;

        // Render the settings template
        return Craft::$app->getView()->renderTemplate(
            'super-text/_components/fields/super-text/settings',
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
        Craft::$app->getView()->registerAssetBundle(SuperTextFieldAsset::class);

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
        Craft::$app->getView()->registerJs("$('#{$namespacedId}-field').SuperText(" . $jsonVars . ");");

        // Render the input template
        return Craft::$app->getView()->renderTemplate(
            'super-text/_components/fields/super-text/input',
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
