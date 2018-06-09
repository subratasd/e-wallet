<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class trx extends Model
{
    protected $table = 'trxes';

    public function us()
    {
        return $this->belongsTo(User::class,'user_id');
    }


}
