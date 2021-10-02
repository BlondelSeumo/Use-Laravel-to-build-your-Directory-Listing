<?php
namespace Modules\Language\Models;

use App\BaseModel;
use Illuminate\Database\Eloquent\SoftDeletes;

class Translation extends BaseModel
{
    use SoftDeletes;
    protected $table = 'bc_translations';
    protected $fillable = [
        'locale',
        'string',
        'parent_id'
    ];
}