<?php

use Anomaly\Streams\Platform\Database\Migration\Migration;

class FritzandandreExtensionBootstrapWidgetsCreateTwoColumnWysiwygStream extends Migration
{
    protected $fields = [
        'left_content'  => [
            'type'   => 'anomaly.field_type.wysiwyg',
            'config' => [
                'height' => 250,
            ],
        ],
        'right_content' => [
            'type'   => 'anomaly.field_type.wysiwyg',
            'config' => [
                'height' => 250,
            ],
        ],
    ];

    protected $stream = [
        'slug' => 'two_column_wysiwyg',
    ];

    protected $assignments = [
        'left_content',
        'right_content',
    ];
}
