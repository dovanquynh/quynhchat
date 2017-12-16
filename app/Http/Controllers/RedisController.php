<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Messages;
use App\Events\RedisEvent;



class RedisController extends Controller
{
    public function index(){
        $messages = Messages::orderBy('created_at', 'desc')->paginate(10);
        return view('messages',compact('messages'));
    }


    public function postSendMessage(Request $request){
    	$messages = Messages::create($request->all());
    	event(
    		$e = new RedisEvent($messages)
    	);
    	return redirect()->back();
    }

    public function getDel(){
        $messages = Messages::truncate();
        return back();
    }

}
