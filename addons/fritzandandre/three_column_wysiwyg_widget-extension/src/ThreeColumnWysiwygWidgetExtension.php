<?php namespace Fritzandandre\ThreeColumnWysiwygWidgetExtension;

use Anomaly\Streams\Platform\Addon\Extension\Extension;
use Anomaly\Streams\Platform\Support\Decorator;
use Fritzandandre\LayoutFieldType\Contract\LayoutExtensionInterface;
use Fritzandandre\ThreeColumnWysiwygWidgetExtension\ThreeColumnWysiwygWidget\Form\ThreeColumnWysiwygWidgetFormBuilder;
use Fritzandandre\ThreeColumnWysiwygWidgetExtension\ThreeColumnWysiwygWidget\ThreeColumnWysiwygWidgetModel;

class ThreeColumnWysiwygWidgetExtension extends Extension implements LayoutExtensionInterface
{
    /**
     * This extension provides.
     *
     * @var null|string
     */
    protected $provides = 'fritzandandre.field_type.layout::widget.three_column_wysiwyg';

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
        return app(ThreeColumnWysiwygWidgetFormBuilder::class);
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
        $model                    = app(ThreeColumnWysiwygWidgetModel::class);
        $threeColumnWysiwygWidget = $model->find($this->entryId);

        $threeColumnWysiwygWidget = (new Decorator())->decorate($threeColumnWysiwygWidget);

        return view('fritzandandre.extension.three_column_wysiwyg_widget::render', [
            'left_content'   => $threeColumnWysiwygWidget->left_content,
            'center_content' => $threeColumnWysiwygWidget->center_content,
            'right_content'  => $threeColumnWysiwygWidget->left_content,
        ]);
    }
}
