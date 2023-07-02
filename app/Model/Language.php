<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Language extends Model
{
    protected $table = 'languages';
    protected $connection = 'mysql';
    public static function code($code = '')
    {
        return self::where('status', 1)
            ->where('code', $code)
            ->first();
    }
}