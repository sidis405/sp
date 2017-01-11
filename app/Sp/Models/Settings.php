<?php

namespace Sp\Models;

use Illuminate\Database\Eloquent\Model;

class Settings extends Model
{
    protected $guarded = ['id'];
    protected $table = 'settings';
}
