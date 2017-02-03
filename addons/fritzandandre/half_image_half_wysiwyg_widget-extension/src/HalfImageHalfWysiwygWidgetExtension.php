<?php namespace Fritzandandre\HalfImageHalfWysiwygWidgetExtension;

use Anomaly\Streams\Platform\Addon\Extension\Extension;
use Anomaly\Streams\Platform\Support\Decorator;
use Fritzandandre\HalfImageHalfWysiwygWidgetExtension\HalfImageHalfWysiwygWidget\Form\HalfImageHalfWysiwygWidgetFormBuilder;
use Fritzandandre\HalfImageHalfWysiwygWidgetExtension\HalfImageHalfWysiwygWidget\HalfImageHalfWysiwygWidgetModel;
use Fritzandandre\LayoutFieldType\Contract\LayoutExtensionInterface;

class HalfImageHalfWysiwygWidgetExtension extends Extension implements LayoutExtensionInterface
{
    /**
     * This extension provides.
     *
     * @var null|string
     */
    protected $provides = 'fritzandandre.field_type.layout::widget.half_image_half_wysiwyg';

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
        return app(HalfImageHalfWysiwygWidgetFormBuilder::class);
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
        $model                      = app(HalfImageHalfWysiwygWidgetModel::class);
        $halfImageHalfWysiwygWidget = $model->find($this->entryId);

        $halfImageHalfWysiwygWidget = (new Decorator())->decorate($halfImageHalfWysiwygWidget);

        return view('fritzandandre.extension.half_image_half_wysiwyg_widget::render', [
            'image'         => $halfImageHalfWysiwygWidget->image,
            'right_content' => $halfImageHalfWysiwygWidget->right_content,
        ]);
    }
}
