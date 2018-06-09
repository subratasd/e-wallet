<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class sendMinMax extends Model
{
    protected $fillable = ['id', 'mix','max'];
    protected  $table = 'send_min_max';
}
