<?php
/**
 * Text Tag plugin for Craft CMS 3.x
 *
 * Field to create some text and specify which HTML tag it appears as.
 *
 * @link      https://brianhanson.net
 * @copyright Copyright (c) 2021 Brian Hanson
 */

namespace brianjhanson\texttag\models;

use craft\base\Model;
use craft\helpers\Html;
use craft\helpers\Json;
use craft\helpers\Template;
use Twig\Markup;

/**
 * @author    Brian Hanson
 * @package   TextTag
 * @since     1.0.0
 */
class TextTagModel extends Model
{
    /**
     * @var string
     */
    public $text = '';

    /**
     * @var string
     */
    public $tag = '';

    public function getString($options = [])
    {
        return Html::tag($this->tag, $this->text, $options);
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return $this->getString();
    }

    /**
     * @return Markup
     */
    public function getHtml($options = [])
    {
        return Template::raw($this->getString($options));
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['text', 'tag'], 'string'],
        ];
    }
}
