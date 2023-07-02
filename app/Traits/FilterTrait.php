<?php

namespace App\Traits;
trait FilterTrait
{
    /**
     * add filtering.
     *
     * @param  $builder: query builder.
     * @param  $filters: array of filters.
     * @return query builder.
     */
    public function scopeFilter($builder, $filters = [])
    {
        if(!$filters) {
            return $builder;
        }
        $tableName = $this->getTable();
        $defaultFillableFields = $this->fillable;
        foreach ($filters as $field => $value) {
            if(strpos($field,'filter_')===0 && $value){
                $field = str_replace('filter_','',$field);
                if($this->boolFilterFields && in_array($field, $this->boolFilterFields) && $value != null) {
                    $builder->where($field, (bool)$value);
                    continue;
                }
               // if(!in_array($field, $defaultFillableFields) || !$value) {
                   // continue;
               // }
                if(in_array($field, $this->likeFilterFields)) {
                   // $builder->where($tableName.'.'.$field, 'LIKE', "%$value%");
                     if(method_exists($builder,'hasTranslation')){
                        $builder->whereTranslationLike($field,  "%$value%");
                    }else
                    {
                        $builder->where($tableName.'.'.$field, 'LIKE', "%$value%");
                    }
                } else if(is_array($value)) {
                    $builder->whereIn($field, $value);
                } else {
                ///    echo $value;exit;
                    $builder->where($field, $value);
                }
            }
        }
        return $builder;
    }
}
