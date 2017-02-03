<?php

use Anomaly\Streams\Platform\Database\Migration\Migration;

class FritzandandreExtensionBootstrapWidgetsCreateHalfImageHalfWysiwygStream extends Migration
{
    protected $stream = [
        'slug' => 'half_image_half_wysiwyg',
    ];

    protected $assignments = [
        'image',
        'right_content',
    ];
}
