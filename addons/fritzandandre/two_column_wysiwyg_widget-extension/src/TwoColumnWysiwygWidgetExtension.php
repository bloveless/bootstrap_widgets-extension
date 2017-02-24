<?php namespace Fritzandandre\TwoColumnWysiwygWidgetExtension;

use Anomaly\Streams\Platform\Addon\Extension\Extension;
use Anomaly\Streams\Platform\Support\Decorator;
use Fritzandandre\LayoutFieldType\Contract\LayoutExtensionInterface;
use Fritzandandre\TwoColumnWysiwygWidgetExtension\TwoColumnWysiwygWidget\Form\TwoColumnWysiwygWidgetFormBuilder;
use Fritzandandre\TwoColumnWysiwygWidgetExtension\TwoColumnWysiwygWidget\TwoColumnWysiwygWidgetModel;

class TwoColumnWysiwygWidgetExtension extends Extension implements LayoutExtensionInterface
{
    /**
     * This extension provides.
     *
     * @var null|string
     */
    protected $provides = 'fritzandandre.field_type.layout::widget.two_column_wysiwyg';

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
        return app(TwoColumnWysiwygWidgetFormBuilder::class);
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
        $model                  = app(TwoColumnWysiwygWidgetModel::class);
        $twoColumnWysiwygWidget = $model->find($this->entryId);

        $twoColumnWysiwygWidget = (new Decorator())->decorate($twoColumnWysiwygWidget);

        return view('fritzandandre.extension.two_column_wysiwyg_widget::render', [
            'left_content'  => $twoColumnWysiwygWidget->left_content,
            'right_content' => $twoColumnWysiwygWidget->right_content,
        ]);
    }
}
