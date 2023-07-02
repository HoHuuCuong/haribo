<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class ProductTranslation extends Model
{
    protected $table = 'product_translations';
    public $timestamps = false;
    protected $fillable = ['name','content','link'];
}
