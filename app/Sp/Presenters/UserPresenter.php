<?php

namespace Sp\Presenters;

use Laracasts\Presenter\Presenter;

class UserPresenter extends Presenter
{
    public function user_url()
    {
        if(strlen($this->username) > 0)
        {
            $slug = '@' .$this->username;
        }else{
            $slug = 'utente/' . $this->id;
        }
        return '/' . $slug;
    }

    public function user_name()
    {
        return $this->name . ' ' . $this->surname;
    }

    public function user_name_short()
    {
        return substr($this->name, 0, 1) . '. ' . $this->surname;
    }

    public function follow_button()
    {

        if($this->id == \Auth::user()->id)
        {
            return '';
        }

        if(in_array(\Auth::user()->id, array_pluck($this->followers, 'id')))
        {
            return '<a class="btn btn-primary follow-button" disabled>Segui</a>';

        }else{

            return '<a class="btn btn-primary follow-button" data-id="' . $this->id . '">Segui</a>';

        }

    }
}
