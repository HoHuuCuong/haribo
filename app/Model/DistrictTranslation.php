<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class DistrictTranslation extends Model
{
    protected $table = 'district_translations';
    public $timestamps = false;
    protected $fillable = ['name'];
}
