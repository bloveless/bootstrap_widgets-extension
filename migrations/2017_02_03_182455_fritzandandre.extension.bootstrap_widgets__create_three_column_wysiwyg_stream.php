<?php

use Anomaly\Streams\Platform\Database\Migration\Migration;

class FritzandandreExtensionBootstrapWidgetsCreateThreeColumnWysiwygStream extends Migration
{
    protected $fields = [
        'center_content' => [
            'type'   => 'anomaly.field_type.wysiwyg',
            'config' => [
                'height' => 250,
            ],
        ],
    ];

    protected $stream = [
        'slug' => 'three_column_wysiwyg',
    ];

    protected $assignments = [
        'left_content',
        'center_content',
        'right_content',
    ];
}
