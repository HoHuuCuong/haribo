<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use \Stevebauman\EloquentTable\TableTrait;
    use \App\Traits\FilterTrait;
    use \Dimsav\Translatable\Translatable;
    protected $likeFilterFields = ['name','content','alias','image'];
    protected $table = 'products';
    public $translatedAttributes = ['name','content','alias'];
    public function category()
    {
        return $this->hasOne('App\Model\Category', 'id', 'category_id');
    }
    public function getCategoryNameAttribute()
    {
        return $this->category->name??'';
    }
    public function store()
    {
        return $this->hasOne('App\Model\Store', 'id', 'store_id');
    }
    public function getStoreNameAttribute()
    {
        return $this->store->name;
    }
    public function childs()
    {
        return self::where(['status'=>1,'hide'=>0,'parent_code'=>$this->item_id])->orderBy('pos','ASC')->get();
    }
}
