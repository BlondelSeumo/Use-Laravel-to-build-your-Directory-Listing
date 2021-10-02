<?php
namespace Modules\Vendor\Models;

use App\BaseModel;
use Illuminate\Database\Eloquent\SoftDeletes;

class BcContactObject extends BaseModel
{
    use SoftDeletes;
    protected $table = 'bc_contact_object';
    protected $fillable = [
        'name',
        'email',
        'message',
        'phone',
        'object_id',
        'object_model',
        'vendor_id'
    ];

}