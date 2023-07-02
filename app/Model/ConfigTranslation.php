<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class ConfigTranslation extends Model
{
    protected $table = 'config_translations';
    public $timestamps = false;
    protected $fillable = ['content'];
}
