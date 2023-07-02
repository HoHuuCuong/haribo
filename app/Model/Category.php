<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use \Stevebauman\EloquentTable\TableTrait;
    use \App\Traits\FilterTrait;
    use \Dimsav\Translatable\Translatable;
    protected $likeFilterFields = ['name','content','image','alias'];
    protected $table = 'categories';
    public $translatedAttributes = ['name','content','image','alias'];
    public static function options($sid,$id='')
    {
        $query = self::where(['status'=>1,'hide'=>0,'store_id'=>$sid]);
        if($id)
        {
            $query->where('id','!=',$id);
        }
        return $query->orderBy('pos','ASC')->get();
    }
    public function getParentNameAttribute()
    {
        $parent = self::where(['id'=>$this->parent_id,'hide'=>0])->first();
        return $parent?$parent->name:__('No parent');
    }
    public function store()
    {
        return $this->hasOne('App\Model\Store', 'id', 'store_id');
    }
    public function catparent()
    {
        return self::where(['id'=>$this->parent_id,'hide'=>0])->first();
    }
    public function getStoreNameAttribute()
    {
        return $this->store->name;
    }
    public function items()
    {
        //dd(->toSql());
        return Product::where(['status'=>1,'hide'=>0,'category_id'=>$this->id])->where(function($query){
            $query->whereNull('parent_code')
            ->orWhere('parent_code','');
        })->orderBy('pos','ASC')->get();
    }
    public function childs()
    {
        return self::where(['status'=>1,'hide'=>0,'parent_id'=>$this->id])->orderBy('pos','ASC')->get();
    }
}
