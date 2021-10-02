<?php
namespace Modules\Template\Blocks;

class Gallery extends BaseBlock
{
    function __construct()
    {
        $this->setOptions([
            'settings' => [
                [
                    'id'          => 'list_item',
                    'type'        => 'listItem',
                    'label'       => __('Gallery Item(s)'),
                    'title_field' => 'title',
                    'settings'    => [
                        [
                            'id'    => 'gallery_item_img',
                            'type'  => 'uploader',
                            'label' => __('Image')
                        ],
                    ]
                ],
            ],
            'category'=>__("Other Block")
        ]);
    }

    public function getName()
    {
        return __('Gallery');
    }

    public function content($model = [])
    {
        return view('Template::frontend.blocks.gallery.index', $model);
    }
}
