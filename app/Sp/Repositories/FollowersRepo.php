<?php

namespace Sp\Repositories;

use Sp\Models\Followers;

class FollowersRepo
{
    public function getAllUsersIFollow()
    {
        return Followers::where('follower_id', \Auth::user()->id)->get();
    }

    public function follow($user_id)
    {

        $follower_id = \Auth::user()->id;

        if(!$this->checkIFollow($user_id, $follower_id)) 
        {
            $follow = new Followers;
            $follow->user_id = $user_id;
            $follow->follower_id = $follower_id;

            $follow->save();

            return true;
        }

        return false;
    }


    public function unfollow($user_id)
    {

        $follower_id = \Auth::user()->id;

        $relationship = $this->checkIFollow($user_id, $follower_id);

        if($relationship)
        {
            $relationship->delete();

            return true;
        }

        return false;
    }




    public function checkIFollow($user_id, $follower_id)
    {
        return Followers::where('user_id', $user_id)->where('follower_id', $follower_id)->first();
    }

}
