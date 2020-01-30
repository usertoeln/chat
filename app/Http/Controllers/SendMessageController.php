<?php

namespace App\Http\Controllers;

use App\Events\PublicMessageEvent;
use Illuminate\Http\Request;

class SendMessageController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api');
    }

    /**********************************/
    public function public_send(Request $request)
    {
        $user = $request->user();
        $msg = $user->name . ' said : ' . $request->message;
        event(new PublicMessageEvent($msg));
        return response()->json('sent', 200);
    }
    /**********************************/
    /**********************************/
    /**********************************/
}
