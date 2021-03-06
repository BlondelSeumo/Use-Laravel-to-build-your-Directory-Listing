<?php
namespace Modules\Property\Controllers;

use App\Http\Controllers\Controller;
use Modules\Property\Models\Property;
use Illuminate\Http\Request;
use Modules\Location\Models\Location;
use Modules\Review\Models\Review;
use Modules\Core\Models\Attributes;
use DB;
use Modules\Property\Models\PropertyCategory;

class PropertyController extends Controller
{
    protected $propertyClass;
    protected $locationClass;
    protected $propertyCategoryClass;
    protected $attributeClass;
    protected $reviewClass;
    public function __construct()
    {
        $this->propertyClass         = Property::class;
        $this->locationClass         = Location::class;
        $this->propertyCategoryClass = PropertyCategory::class;
        $this->attributeClass        = Attributes::class;
        $this->reviewClass           = Review::class;
    }

    public function callAction($method, $parameters)
    {
        if(!Property::isEnable())
        {
            return redirect('/');
        }
        return parent::callAction($method, $parameters); // TODO: Change the autogenerated stub
    }

    public function index(Request $request)
    {
        $is_ajax = $request->query('_ajax');
        $list = call_user_func([$this->propertyClass,'search'],$request);
        $markers = [];
        if (!empty($list)) {
            foreach ($list as $row) {
                $markers[] = [
                    "id"      => $row->id,
                    "title"   => $row->title,
                    "lat"     => (float)$row->map_lat,
                    "lng"     => (float)$row->map_lng,
                    "gallery" => $row->getGallery(true),
                    "infobox" => view('Property::frontend.layouts.search.loop.loop-gird', ['row' => $row,'disable_lazyload'=>1,'wrap_class'=>'infobox-item'])->render(),
                    'marker'  => url('images/icons/png/pin.png'),
                ];
            }
        }
        $limit_location = 15;
        if( empty(setting_item("property_location_search_style")) or setting_item("property_location_search_style") == "normal" ){
            $limit_location = 1000;
        }
        $data = [
            'rows'               => $list,
            'list_location'      => $this->locationClass::where('status', 'publish')->limit($limit_location)->with(['translations'])->get()->toTree(),
            'list_category'      => $this->propertyCategoryClass::where('status', 'publish')->get()->toTree(),
            'property_min_max_price' => $this->propertyClass::getMinMaxPrice(),
            'markers'            => $markers,
            "blank"              => 1,
            "filter"             => $request->query('filter'),
            "seo_meta"           => $this->propertyClass::getSeoMetaForPageList()
        ];

        if ($is_ajax) {
            return $this->sendSuccess([
                'html'    => view('Property::frontend.layouts.search-map.list-item', $data)->render(),
                "markers" => $data['markers']
            ]);
        }
        $data['attributes'] = $this->attributeClass::where('service', 'property')->with(['terms','translations'])->get();

        $layout = $request->input('_layout') ? $request->input('_layout') : setting_item("property_page_search_layout", 1);

        if ($layout == "map1") {
            return view('Property::frontend.search-map', $data);
        }

        $data['view'] = 'Property::frontend.layouts.search.list-item-v1';
        if($layout == 'v1') {
            $data['view'] = 'Property::frontend.layouts.search.list-item-v1';
        }

        return view('Property::frontend.search', $data);
    }

    public function detail(Request $request, $slug)
    {
        $layout_id = $request->input('layout') ? $request->input('layout') : setting_item("property_page_single_layout", 1);
        $limit_location = 15;
        if( empty(setting_item("property_location_search_style")) or setting_item("property_location_search_style") == "normal" ){
            $limit_location = 1000;
        }
        $row = $this->propertyClass::where('slug', $slug)->with(['location','translations','hasWishList', 'user'])->first();
        if ( empty($row) or !$row->hasPermissionDetailView()) {
            return redirect('/');
        }
        $translation = $row->translateOrOrigin(app()->getLocale());
        $property_related = [];
        $location_id = $row->location_id;
        if (!empty($location_id)) {
            $property_related = $this->propertyClass::where('location_id', $location_id)->where("status", "publish")->take(4)->whereNotIn('id', [$row->id])->with(['location','translations','hasWishList'])->get();
        }
        $review_list = Review::where('object_id', $row->id)->where('object_model', 'property')->where("status", "approved")->orderBy("id", "desc")->with('author')->paginate(setting_item('property_review_number_per_page', 5));
        $row->view = $row->view + 1;
        $row->save();

        $data = [
            'row'               => $row,
            'translation'       => $translation,
            'property_related'  => $property_related,
            'booking_data'      => $row->getBookingData(),
            'list_location'     => $this->locationClass::where('status', 'publish')->limit($limit_location)->with(['translations'])->get()->toTree(),
            'list_category'     => $this->propertyCategoryClass::where('status', 'publish')->get()->toTree(),
            'property_min_max_price' => $this->propertyClass::getMinMaxPrice(),
            'review_list'       => $review_list,
            'seo_meta'          => $row->getSeoMetaWithTranslation(app()->getLocale(),$translation),
            'body_class'        =>'is_single'
        ];
        $this->setActiveMenu($row);
        $blade = 'Property::frontend.detail';
        if($layout_id == 1) {
            $blade = 'Property::frontend.detail';
        } elseif($layout_id == 2) {
            $blade = 'Property::frontend.detail_v2';
        } elseif($layout_id == 3) {
            $blade = 'Property::frontend.detail_v3';
        }

        return view($blade, $data);
    }
    public function searchForSelect2( Request $request ){
        $search = $request->query('q');
        $query = Property::where("bc_properties.status","publish");
        if ($search) {
            $query->where('bc_properties.title', 'like', '%' . $search . '%');

            if( setting_item('site_enable_multi_lang') && setting_item('site_locale') != app()->getLocale() ){

                $query->orWhere(function($query) use ($search) {
                    $query->where('bc_property_translations.name', 'LIKE', '%' . $search . '%');
                });
            }
        }
        $res = $query->orderBy('title', 'asc')->limit(20)->get();
        if(!empty($res) and count($res)){
            $list_json = [];
            foreach ($res as $value) {
                $translate = $value->translateOrOrigin(app()->getLocale());
                $list_json[] = [
                    'id' => $value->id,
                    'text' => $translate->title,
                    'href' => $value->getDetailUrl(),
                    'html'=>'<div class="property_city_home6 tac-xsd">
													<div class="thumb">
                                                        <a href="'.$value->getDetailUrl().'">
                                                            <img class="w100" src="'.$value->image_url.'" alt="Miami">
                                                        </a>
                                                    </div>
													<div class="details">
                                                        <a href="'.$value->location->getDetailUrl().'">
                                                            <h4>'.$translate->title.'</h4>
                                                            <p>'.$value->location->name.'</p>
                                                        </a>
                                                    </div>
												</div>'
                ];
            }
            return response()->json(['results'=>$list_json]);
        }
        return response()->json(['results'=>[],'message'=>__("Not found")]);
    }

}
