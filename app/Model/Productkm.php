<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Productkm extends Model
{
    use \Stevebauman\EloquentTable\TableTrait;
    use \App\Traits\FilterTrait;
    protected $likeFilterFields = ['name','content','image'];
    protected $table = 'km_products';
}
