<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class BonusCode extends Model
{
    use \Stevebauman\EloquentTable\TableTrait;
    use \App\Traits\FilterTrait;
    protected $likeFilterFields = ['code'];
    protected $table = 'bonus_codes';
}
