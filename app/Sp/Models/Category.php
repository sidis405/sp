<?php

namespace Sp\Models;

use Illuminate\Database\Eloquent\Model;
use Laracasts\Presenter\PresentableTrait;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\HasMedia\Interfaces\HasMedia;


class Category extends Model  implements HasMedia
{
    use PresentableTrait, HasMediaTrait;

    protected $presenter = 'Sp\Presenters\CategoryPresenter';

    protected $guarded = ['id', 'created_at', 'updated_at'];

    public static function make($name, $description, $payoff, $active)
    {
        $name = str_slug($name);
        $item = new static(compact('name', 'description', 'payoff', 'active'));

        return $item;
    }

    public static function edit($item_id, $name, $description, $payoff, $active)
    {
        $item = static::find($item_id);

        $item->name = $name;
        $item->slug = str_slug($name);
        $item->description = $description;
        $item->payoff = $payoff;
        $item->active = $active;

        return $item;
    }

    public function articles(){

        // return $this->hasMany('Sp\Models\Article', 'category_id');
        return $this->hasMany('Sp\Models\Article', 'category_id')->where('status_id', 3);

    }

}
