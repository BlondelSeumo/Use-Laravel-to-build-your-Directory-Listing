<?php
namespace Modules\User\Models;

use App\BaseModel;
use Illuminate\Database\Eloquent\SoftDeletes;

class Subscriber extends BaseModel
{
    use SoftDeletes;
    protected $table = 'bc_subscribers';
    protected $fillable = [
        'email',
        'first_name',
        'last_name'
    ];
}
