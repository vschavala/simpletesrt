<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\UserComment;

class DashboardController extends Controller
{
    /**
     * Display a listing of user thanks given.
     *
     * @return \Illuminate\Http\Response
     */
    public function dashboard(Request $request)
    {
        $thanksSenderCount = UserComment::with('thankssenders')->groupBy('sender_id')->get()->count();
        $thanksRecieverCount = UserComment::with('thsnksrecievers')->groupBy('user_id')->get()->count();
        
        return view('dashboard',compact('thanksSenderCount','thanksRecieverCount'));
    }
}
