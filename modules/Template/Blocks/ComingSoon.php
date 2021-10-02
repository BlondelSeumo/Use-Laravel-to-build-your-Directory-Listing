<?php
namespace Modules\Template\Blocks;

class ComingSoon extends BaseBlock
{
    function __construct()
    {
        $this->setOptions([
            'settings' => [
                [
                    'id'        => 'title',
                    'type'      => 'input',
                    'inputType' => 'text',
                    'label'     => __('Title')
                ],

                [
                    'id'        => 'content',
                    'type'      => 'textArea',
                    'label'     => __('Content')
                ],
                [
                    'id'        => 'coming_day',
                    'type'      => 'input',
                    'inputType' => 'datetime-local',
                    'label'     => __('Coming day')
                ],
                [
                    'id'    => 'coming_soon_image',
                    'type'  => 'uploader',
                    'label' => __('Image Uploader')
                ],
            ],
            'category'=>__("Other Block")
        ]);
    }

    public function getName()
    {
        return __('Coming Soon');
    }

    public function content($model = [])
    {
        return view('Template::frontend.blocks.coming-soon.index', $model);
    }
}
