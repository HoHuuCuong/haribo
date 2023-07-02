<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use \Stevebauman\EloquentTable\TableTrait;
    use \App\Traits\FilterTrait;
    protected $likeFilterFields = ['first_name','last_name','address','email','phone','bonus_code'];
    protected $table = 'customers';
    public function getCityNameAttribute()
    {
        return $this->city->name??'';
    }
    public function city()
    {
        return $this->hasOne('App\Model\City', 'id', 'city_id');
    }
    public function getDistrictNameAttribute()
    {
        return $this->district->name??'';
    }
    public function district()
    {
        return $this->hasOne('App\Model\District', 'id', 'district_id');
    }
}
