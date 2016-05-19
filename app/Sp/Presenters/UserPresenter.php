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
}
