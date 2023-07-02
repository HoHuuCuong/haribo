<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class StoreTranslation extends Model
{
    protected $table = 'store_translations';
    public $timestamps = false;
    protected $fillable = ['name', 'address','open_times'];
}
