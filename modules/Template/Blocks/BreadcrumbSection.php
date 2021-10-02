<?php
namespace Modules\Template\Blocks;

use Modules\Template\Blocks\BaseBlock;
use Modules\Media\Helpers\FileHelper;

class BreadcrumbSection extends BaseBlock
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
                    'id'        => 'title_item_active',
                    'type'      => 'input',
                    'inputType' => 'text',
                    'label'     => __('Title item active')
                ],
                [
                    'id'    => 'background_image',
                    'type'  => 'uploader',
                    'label' => __('Image Uploader')
                ],
            ],
            'category'=>__("Other Block")
        ]);
    }

    public function getName()
    {
        return __('Breadcrumb');
    }

    public function content($model = [])
    {
        return view('Template::frontend.blocks.breadcrumb-box.index', $model);
    }

    public function contentAPI($model = []){
        $model['background_image_url'] = get_file_url($model['background_image'],'full');
        return $model;
    }
}