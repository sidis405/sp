<?php

namespace Sp\Models;

use Illuminate\Database\Eloquent\Model;
use Laracasts\Presenter\PresentableTrait;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\HasMedia\Interfaces\HasMedia;


class Ads extends Model  implements HasMedia
{
    use PresentableTrait, HasMediaTrait;

    protected $presenter = 'Sp\Presenters\AdsPresenter';

    protected $guarded = ['id', 'created_at', 'updated_at'];

}
