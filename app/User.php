<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use Laracasts\Presenter\PresentableTrait;

class User extends Model implements
    AuthenticatableContract,
                                    AuthorizableContract,
                                    CanResetPasswordContract
{
    use Authenticatable, Authorizable, CanResetPassword, PresentableTrait;

    protected $presenter = 'Sp\Presenters\UserPresenter';


    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = ['id'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];

    public function getLevel()
    {
        $total = $this->articles->count();

        if ($total < 10) {
            return "<img src='/images/badges/3rd.png'>";
        } elseif ($total < 25) {
            return "<img src='/images/badges/2nd.png'>";
        } else {
            return "<img src='/images/badges/1st.png'>";
        }
    }

    public function articles()
    {
        return $this->hasMany(\Sp\Models\Article::class, 'user_id')->where('status_id', 3)->orderBy('created_at', 'DESC');
    }

    public function all_articles()
    {
        return $this->hasMany(\Sp\Models\Article::class, 'user_id')->orderBy('created_at', 'DESC');
    }

    public function payment_requests()
    {
        return $this->hasMany(\Sp\Models\PaymentRequests::class, 'user_id')->orderBy('created_at', 'ASC');
    }

    public function latest_articles()
    {
        return $this->hasMany(\Sp\Models\Article::class, 'user_id')->where('status_id', 3)->orderBy('created_at', 'DESC')->take(5);
    }

    public function newnotifications()
    {
        return $this->hasMany(\Sp\Models\UserNotifications::class, 'user_id')->where('seen', 0);
    }

    public function notifications()
    {
        return $this->hasMany(\Sp\Models\UserNotifications::class, 'user_id')->orderBy('created_at', 'DESC')->take(50);
    }

    public function followers()
    {
        return $this->belongsToMany('App\User', 'followers', 'user_id', 'follower_id');
    }

    public function ifollow()
    {
        return $this->belongsToMany('App\User', 'followers', 'follower_id', 'user_id');
    }

    public function findForPassport($email)
    {
        return $this->where('email', $email)->where('active', '>=', 1)->first();
    }

    public static function edit($user_id, $name, $surname, $username, $email, $social_facebook, $social_google, $social_twitter, $social_website, $description)
    {
        $user = static::find($user_id);

        $user->name = $name;
        $user->surname = $surname;
        $user->username = $username;
        $user->email = $email;
        $user->social_facebook = $social_facebook;
        $user->social_google = $social_google;
        $user->social_twitter = $social_twitter;
        $user->social_website = $social_website;
        $user->description = $description;

        return $user;
    }
}
