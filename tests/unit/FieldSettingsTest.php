<?php

namespace brianjhanson\supertexttests\unit;

use brianjhanson\supertext\fields\SuperTextField;
use brianjhanson\supertexttests\fixtures\EntryFixture;
use Codeception\Test\Unit;
use craft\elements\Entry;
use UnitTester;

class FieldSettingsTest extends Unit
{
    /**
     * @var UnitTester
     */
    protected $tester;

    protected function _before()
    {
    }

    protected function _after()
    {
    }

    /**
     * @return array
     */
    public function _fixtures(): array
    {
        return [
            'entries' => [
                'class' => EntryFixture::class
            ]
        ];
    }

    public function testCharacterLimit()
    {
        $field = new SuperTextField();
        $entry = Entry::find()->slug('too-long')->one();

        $entry->setFieldValue('tooLong', $field->normalizeValue([
            'text' => 'This is too long',
            'tag' => 'p'
        ]));

        $success = \Craft::$app->elements->saveElement($entry);
        $this->assertFalse($success);
        $this->assertContains(
            'the input value should contain at most 5 characters.',
            $entry->getErrors('tooLong')
        );
    }

}
