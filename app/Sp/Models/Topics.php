<?php

namespace Sp\Models;

use Illuminate\Database\Eloquent\Model;


class Topics extends Model
{
    protected $guarded = ['id', 'created_at', 'updated_at'];
    protected $dates = ['ondate', 'created_at', 'updated_at'];

    public static function make($name, $description, $active, $ondate, $user_id)
    {
        $slug = str_slug($name);
        $item = new static(compact('name', 'slug', 'description',  'active', 'ondate', 'user_id'));

        return $item;
    }

    public static function edit($item_id, $name, $description, $active, $ondate)
    {
        $item = static::find($item_id);

        $item->name = $name;
        $item->slug = str_slug($name);
        $item->description = $description;
        $item->active = $active;
        $item->ondate = $ondate;

        return $item;
    }

}
