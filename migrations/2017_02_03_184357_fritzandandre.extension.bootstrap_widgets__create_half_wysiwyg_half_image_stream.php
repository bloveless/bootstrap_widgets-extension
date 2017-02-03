<?php

use Anomaly\Streams\Platform\Database\Migration\Migration;

class FritzandandreExtensionBootstrapWidgetsCreateHalfWysiwygHalfImageStream extends Migration
{
    protected $fields = [
        'image' => 'anomaly.field_type.file',
    ];

    protected $stream = [
        'slug' => 'half_wysiwyg_half_image',
    ];

    protected $assignments = [
        'left_content',
        'image',
    ];
}
