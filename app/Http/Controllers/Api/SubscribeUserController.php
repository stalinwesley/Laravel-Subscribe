<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\WebsiteSubscriptionUsers;
use App\Http\Requests\CreateSubscibeRequest;

class SubscribeUserController extends Controller
{
    //
    public function create(CreateSubscibeRequest $request)
    {
        $check_subscriber = WebsiteSubscriptionUsers::where('user_id',$request->user_id)->where('website_list_id',$request->website_list_id)->first();
        if(!empty($check_subscriber)){
            $message = 'Already '.$check_subscriber->user->name . ' Subscribed to ' . $check_subscriber->website_list->website_title . ' WebSite';
            return response()->json(['message'=>$message]);
        }
        $subscribe = new WebsiteSubscriptionUsers();
        $subscribe->user_id = $request->user_id;
        $subscribe->website_list_id = $request->website_list_id;
        $subscribe->save();
        $message = $subscribe->user->name . ' Subscribed to ' . $subscribe->website_list->website_title . ' WebSite';
        return response()->json(['message'=>$message]);
    }
}
