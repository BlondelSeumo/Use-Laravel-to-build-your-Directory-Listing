<?php
namespace Modules;

use File;
use Modules\Location\Models\Location;
use Modules\Property\Models\PropertyCategory;

class ServiceProvider extends \Illuminate\Support\ServiceProvider
{
    public function boot()
    {
        $listModule = array_map('basename', File::directories(__DIR__));
        foreach ($listModule as $module) {
            if (is_dir(__DIR__ . '/' . $module . '/Views')) {
                $this->loadViewsFrom(__DIR__ . '/' . $module . '/Views', $module);
            }
        }

        if (is_dir(__DIR__ . '/Layout')) {
            $this->loadViewsFrom(__DIR__ . '/Layout', 'Layout');
        }
        if (bc_is_installed()) {
//        config header
            $propertyCategoryHeader = $propertyLocationHeader = null;
            if (!empty(setting_item('enable_category_box')) and !empty(setting_item('header_category_box'))) {
                $headerCategoryBox = json_decode(setting_item('header_category_box', true));
                if (!empty($headerCategoryBox) and is_array($headerCategoryBox)) {
                    $propertyCategoryHeader = PropertyCategory::where('status', 'publish')->whereIn('id', $headerCategoryBox)->get();
                }
            }
            if (!empty(setting_item('enable_location_box')) and !empty(setting_item('header_location_box'))) {
                $headerLocationBox = json_decode(setting_item('header_location_box', true));
                if (!empty($headerLocationBox) and is_array($headerLocationBox)) {
                    $propertyLocationHeader = Location::where('status', 'publish')->whereIn('id', $headerLocationBox)->withCount('property')->get();
                }
            }
            \View::share(['propertyCategoryHeader' => $propertyCategoryHeader, 'propertyLocationHeader' => $propertyLocationHeader]);
        }

    }

    public function register()
    {
        $listModule = array_map('basename', File::directories(__DIR__));
        foreach ($listModule as $module) {
            $class = "\Modules\\".ucfirst($module)."\\ModuleProvider";
            if(class_exists($class)) {
                $this->app->register($class);
            }

        }
        $this->app->register(EventServiceProvider::class);
    }


    public static function getModules(){
        return array_map('basename', array_filter(glob(base_path().'/modules/*'), 'is_dir'));
    }
}
