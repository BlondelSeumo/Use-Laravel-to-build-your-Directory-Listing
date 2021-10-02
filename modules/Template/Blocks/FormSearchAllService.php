<?php
namespace Modules\Template\Blocks;

use Modules\Property\Models\Property;
use Modules\Property\Models\PropertyCategory;
use Modules\Template\Blocks\BaseBlock;
use Modules\Location\Models\Location;
use Modules\Media\Helpers\FileHelper;

class FormSearchAllService extends BaseBlock
{
    function __construct()
    {
        $propertyCategory = PropertyCategory::where('status','publish')->get(['id','name'])->toTree();
        $listCategory = [];
        foreach ($propertyCategory as $category){
            $listCategory[] = ['value'   => $category->id,
                               'name' => ucwords($category->name)
            ];
        }
        $list_service = [];
        foreach (get_bookable_services() as $key => $service) {
            if($key=='news'){
                continue;
            }
            $list_service[] = ['value'   => $key,
                               'name' => ucwords($key)
            ];
        }

        $arg[] = [
            'id'        => 'title',
            'type'      => 'input',
            'inputType' => 'text',
            'label'     => __('Title')
        ];
        $arg[] = [
            'id'        => 'sub_title',
            'type'      => 'input',
            'inputType' => 'text',
            'label'     => __('Sub Title')
        ];

        $arg[] =  [
            'id'            => 'style',
            'type'          => 'radios',
            'label'         => __('Style Background'),
            'values'        => [
                [
                    'value'   => '',
                    'name' => __("Normal")
                ],
            ]
        ];

        $arg[] = [
            'id'    => 'bg_image',
            'type'  => 'uploader',
            'label' => __('- Layout Normal: Background Image Uploader')
        ];


        $arg[] = [
            'type'=> "checkbox",
            'label'=>__("Hide form search service?"),
            'id'=> "hide_form_search",
            'default'=>false
        ];
        $arg[] = [
            'type'=> "checkbox",
            'label'=>__("Hide Tab name form search service?"),
            'id'=> "hide_tab_form_search",
            'default'=>false
        ];

        $arg[] = [
            'type'=> "checkbox",
            'label'=>__("Enable property category box?"),
            'id'=> "enable_category_box",
            'default'=>false,

        ];
        $arg[] = [
            'id'          => 'list_property_category',
            'type'        => 'checklist',
            'listBox'          => 'true',
            'label'       => __('Choose Property category'),
            'values'=>$listCategory,
        ];



        $this->setOptions([
            'settings' => $arg,
            'category'=>__("Other Block")
        ]);
    }

    public function getName()
    {
        return __('Form Search All Service');
    }

    public function content($model = [])
    {
        $model['bg_image_url'] = FileHelper::url($model['bg_image'] ?? "", 'full') ?? "";
        $model['list_location'] = $model['tour_location'] =  Location::where("status","publish")->limit(1000)->orderBy('name', 'asc')->with(['translations'])->get()->toTree();
        $model['list_category']      = PropertyCategory::where('status', 'publish')->get()->toTree();
        $model['property_min_max_price']      = Property::getMinMaxPrice();
        $model['style'] = $model['style'] ?? "";
        $model['list_slider'] = $model['list_slider'] ?? "";
        $model['modelBlock'] = $model;

        if(!empty($model['list_property_category'])){
            $model['list_property_category_data']  = PropertyCategory::whereIn('id',$model['list_property_category'])->where('status','publish')->get();
        }
        return view('Template::frontend.blocks.form-search-all-service.index', $model);
    }

    public function contentAPI($model = []){
        if (!empty($model['bg_image'])) {
            $model['bg_image_url'] = FileHelper::url($model['bg_image'], 'full');
        }
        return $model;
    }
}