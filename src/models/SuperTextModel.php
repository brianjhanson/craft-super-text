<?php
/**
 * Text Tag plugin for Craft CMS 3.x
 *
 * Field to create some text and specify which HTML tag it appears as.
 *
 * @link      https://brianhanson.net
 * @copyright Copyright (c) 2021 Brian Hanson
 */

namespace brianjhanson\supertext\models;

use craft\base\Model;
use craft\helpers\Html;
use craft\helpers\Json;
use craft\helpers\Template;
use Twig\Markup;

/**
 * @author    Brian Hanson
 * @package   SuperText
 * @since     1.0.0
 */
class SuperTextModel extends Model
{
    /**
     * @var string
     */
    public $text = '';

    /**
     * @var string
     */
    public $tag = '';

    /**
     * @param array $options
     * @return string
     */
    public function getString(array $options = []): string
    {
        return Html::tag($this->tag, $this->text, $options);
    }

    /**
     * @param array $options
     * @return Markup
     */
    public function getHtml(array $options = []): Markup
    {
        return Template::raw($this->getString($options));
    }

    /**
     * @inheritdoc
     */
    public function rules(): array
    {
        return [
            [['text', 'tag'], 'string'],
        ];
    }
}
