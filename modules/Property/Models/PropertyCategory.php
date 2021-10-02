<?php
namespace Modules\Property\Models;

use App\BaseModel;
use Kalnoy\Nestedset\NodeTrait;
use Illuminate\Database\Eloquent\SoftDeletes;

class PropertyCategory extends BaseModel
{
    use SoftDeletes;
    use NodeTrait;
    protected $table = 'bc_property_category';
    protected $fillable = [
        'name',
        'content',
        'slug',
        'status',
        'parent_id',
        'image_id'
    ];
    protected $slugField     = 'slug';
    protected $slugFromField = 'name';

    public static function getModelName()
    {
        return __("Property Category");
    }

    public function property() {
        return $this->hasMany('Modules\Property\Models\Property','category_id');
    }

    public static function searchForMenu($q = false)
    {
        $query = static::select('id', 'name');
        if (strlen($q)) {
            $query->where('name', 'like', "%" . $q . "%");
        }
        $a = $query->limit(10)->get();
        return $a;
    }

    public function getDetailUrl(){
        return url(app_get_locale(false, false, '/') . config('property.property_cat_route_prefix').'/'.$this->slug);
    }
}
