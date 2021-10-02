<?php
namespace Modules\Template\Blocks;

use Modules\Template\Blocks\BaseBlock;
use Modules\Media\Helpers\FileHelper;

class HowItWork extends BaseBlock
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
                    'id'        => 'sub_title',
                    'type'      => 'input',
                    'inputType' => 'input',
                    'label'     => __('Sub Title')
                ],
                [
                    'id'        => 'link_title',
                    'type'      => 'input',
                    'inputType' => 'text',
                    'label'     => __('Title Link More')
                ],
                [
                    'id'        => 'link_more',
                    'type'      => 'input',
                    'inputType' => 'text',
                    'label'     => __('Link More')
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
        return __('How It Works');
    }

    public function content($model = [])
    {
        return view('Template::frontend.blocks.how-it-work.index', $model);
    }

    public function contentAPI($model = []){
        $model['background_image_url'] = get_file_url($model['background_image'],'full');
        return $model;
    }
}