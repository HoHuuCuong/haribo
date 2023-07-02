<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HD
{
    const REGIX_EMAIL = '^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$';
    const REGIX_PHONE = '^(086|096|097|098|032|033|034|035|036|037|038|039|091|094|088|083|084|085|081|082|089|090|093|070|079|077|076|078|092|056|058|099|059)([0-9]{7})$';
    const REGIX_PASSWORD = '^(?=(.*[a-z]){1,})(?=(.*[A-Z]){1,})(?=(.*[\d]){1,})(?=(.*[\!\#\$\%\&\'\(\)\*\+\,\-\.\/\:\;\<\=\>\?\@\[\]\^\_\`\{\|\}\~]){1,})(?!.*\s).{7,30}$';

    //For Staff
    const STATE_WORKING = 1;
    const STATE_RETIRE  = 2;
    const STATE_EXIT    = 0;
    //End for Staff
}