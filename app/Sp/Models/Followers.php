<?php

namespace Sp\Models;

use Illuminate\Database\Eloquent\Model;



class Followers extends Model
{
    protected $guarded = ['id', 'created_at', 'updated_at'];

    public function user()
    {
        return $this->belongsTo('\App\User', 'user_id');
    }

}
