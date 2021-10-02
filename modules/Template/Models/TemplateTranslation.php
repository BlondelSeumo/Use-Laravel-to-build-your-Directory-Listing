<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 7/16/2019
 * Time: 2:05 PM
 */
namespace Modules\Template\Models;

use App\BaseModel;

class TemplateTranslation extends Template
{
    protected $table = 'bc_template_translations';
    protected $fillable = ['title', 'content'];
}