<?php

namespace Sp\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Sp\Repositories\UserNotificationsRepo;


class NotificationsController extends Controller
{

    public function seen(Request $request, UserNotificationsRepo $notifications_repo)
    {
        $id = $request->input('payload');

        if(UserNotificationsRepo::doesNotificationBelongToUser($id, \Auth::user()->id))
        {
            UserNotificationsRepo::seen($id);
        }

        return 'false';
    }

}
