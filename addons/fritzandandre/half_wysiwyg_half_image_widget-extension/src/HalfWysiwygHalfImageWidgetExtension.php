<?php namespace Fritzandandre\HalfWysiwygHalfImageWidgetExtension;

use Anomaly\Streams\Platform\Addon\Extension\Extension;
use Anomaly\Streams\Platform\Support\Decorator;
use Fritzandandre\HalfWysiwygHalfImageWidgetExtension\HalfWysiwygHalfImageWidget\Form\HalfWysiwygHalfImageWidgetFormBuilder;
use Fritzandandre\HalfWysiwygHalfImageWidgetExtension\HalfWysiwygHalfImageWidget\HalfWysiwygHalfImageWidgetModel;
use Fritzandandre\LayoutFieldType\Contract\LayoutExtensionInterface;

class HalfWysiwygHalfImageWidgetExtension extends Extension implements LayoutExtensionInterface
{
    /**
     * This extension provides.
     *
     * @var null|string
     */
    protected $provides = 'fritzandandre.field_type.layout::widget.half_wysiwyg_half_image';

    /**
     * Then entry ID to use when retrieving the layout.
     *
     * @var
     */
    protected $entryId;

    /**
     * Get the form used to create and edit html widgets.
     *
     * @return \Illuminate\Foundation\Application|mixed
     */
    public function getForm()
    {
        return app(HalfWysiwygHalfImageWidgetFormBuilder::class);
    }

    /**
     * Set the entry id for rendering.
     *
     * @param $entryId
     */
    public function setEntryId($entryId)
    {
        $this->entryId = $entryId;
    }

    /**
     * Render the content.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function render()
    {
        $model                      = app(HalfWysiwygHalfImageWidgetModel::class);
        $halfWysiwygHalfImageWidget = $model->find($this->entryId);

        $halfWysiwygHalfImageWidget = (new Decorator())->decorate($halfWysiwygHalfImageWidget);

        return view('fritzandandre.extension.half_wysiwyg_half_image_widget::render', [
            'left_content' => $halfWysiwygHalfImageWidget->left_content,
            'image'        => $halfWysiwygHalfImageWidget->image,
        ]);
    }
}
