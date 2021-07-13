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

use brianjhanson\texttag\TextTag;

use Craft;
use craft\base\Model;
use craft\helpers\Html;
use craft\helpers\Json;
use craft\helpers\Template;

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

    /**
     * @return string
     */
    public function __toString()
    {
        return Html::tag($this->tag, $this->text);
    }



    /**
     * TextTagModel constructor.
     *
     * @param $value
     */
    public function __construct($value)
    {

        if (!$value) {
            return;
        }

        if (is_string($value)) {
            $data = Json::decode($value);
            $this->text = $data['text'];
            $this->tag = $data['tag'];
        } else {
            $this->text = $value['text'];
            $this->tag = $value['tag'];
        }
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
