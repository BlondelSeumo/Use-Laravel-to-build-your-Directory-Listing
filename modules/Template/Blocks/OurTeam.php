<?php
namespace Modules\Template\Blocks;

use Modules\Template\Blocks\BaseBlock;
use Modules\Media\Helpers\FileHelper;

class OurTeam extends BaseBlock
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
                    'id'          => 'list_item',
                    'type'        => 'listItem',
                    'label'       => __('List Item(s)'),
                    'title_field' => 'title',
                    'settings'    => [
                        [
                            'id'        => 'name',
                            'type'      => 'input',
                            'inputType' => 'text',
                            'label'     => __('Name')
                        ],
                        [
                            'id'        => 'career',
                            'type'      => 'input',
                            'inputType' => 'text',
                            'label'     => __('Career')
                        ],
                        [
                            'id'    => 'avatar',
                            'type'  => 'uploader',
                            'label' => __('Avatar Image')
                        ],

                        [
                            'id'        => 'facebook',
                            'type'      => 'input',
                            'inputType' => 'text',
                            'label'     => __('Facebook')
                        ],

                        [
                            'id'        => 'twitter',
                            'type'      => 'input',
                            'inputType' => 'text',
                            'label'     => __('Twitter')
                        ],

                        [
                            'id'        => 'instagram',
                            'type'      => 'input',
                            'inputType' => 'text',
                            'label'     => __('Instagram')
                        ],

                        [
                            'id'        => 'linkedin',
                            'type'      => 'input',
                            'inputType' => 'text',
                            'label'     => __('Linkedin')
                        ],
                        [
                            'id'        => 'order',
                            'type'      => 'input',
                            'inputType' => 'number',
                            'label'     => __('Order')
                        ],
                    ]
                ],
            ],
            'category'=>__("Other Block")
        ]);
    }

    public function getName()
    {
        return __('Our Team');
    }

    public function content($model = [])
    {
        return view('Template::frontend.blocks.our-team.index', $model);
    }

    public function contentAPI($model = []){
        if(!empty($model['list_item'])){
            foreach (  $model['list_item'] as &$item ){
                $item['background_image_url'] = FileHelper::url($item['background_image'], 'full');
            }
        }
        return $model;
    }
}