<?php
/**
 * craft-super-text module for Craft CMS 3.x
 *
 * @link      https://onedesigncompany.com
 * @copyright Copyright (c) 2021 Brian Hanson
 */


use brianjhanson\supertext\fields\SuperTextField;

return [
    [
        'uid' => 'field-layout-1000----------------uid',
        'type' => 'too_long',
        'tabs' => [
            [
                'name' => 'Tab 1',
                'fields' => [
                    [
                        'layout-link' => [
                            'required' => true
                        ],
                        'field' => [
                            'uid' => 'field-1001-----------------------uid',
                            'name' => 'Over Character Limit',
                            'handle' => 'tooLong',
                            'fieldType' => SuperTextField::class,
                            'settings' => [
                                'charLimit' => 5
                            ]
                        ]
                    ],
                ]
            ]
        ]
    ],
];
