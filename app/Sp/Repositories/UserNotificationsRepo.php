<?php

namespace Sp\Repositories;

use Sp\Models\UserNotifications;

class UserNotificationsRepo
{

    public static function store($user_id, $text, $type)
    {
        $notification = new UserNotifications;
        $notification->user_id = $user_id;
        $notification->text = $text;
        $notification->type = $type;

        $notification->save();

        return $notification->id;

    }

    public static function seen($notification_id)
    {
        $notification = UserNotifications::find($notification_id);
        $notification->seen = 1;
        $notification->save();

    }

    public static function mute($notification_id)
    {
        $notification = UserNotifications::find($notification_id);
        $notification->muted = 1;
        $notification->save();

    }

    public static function doesNotificationBelongToUser($notification_id, $user_id)
    {
        $notification = UserNotifications::whereId($notification_id)->where('user_id', $user_id)->get();

        if($notification) return true;

        return false;

    }

}
