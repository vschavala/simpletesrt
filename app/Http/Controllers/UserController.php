<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Http\Request;
use DataTables;
use App\UserComment;
use App\Repositories\UserRepository;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(UserRepository $userRepository)
    {
        $this->middleware('auth');
        $this->userRepository = $userRepository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
         return $this->userRepository->index($request);
        } 
        return view('users');
    }

    /**
     * Save user comments.
     *
     * @return \Illuminate\Http\Response
     */
    public function commentSave(Request $request)
    {
        try {
            $this->userRepository->commentSave($request);
        } catch (\Illuminate\Database\QueryException $ex) {
            dd($ex->getMessage());
        }

        return redirect()->back();
    }

    /**
     * Display a listing of user thanks recived.
     *
     * @return \Illuminate\Http\Response
     */
    public function thanksRecievers(Request $request)
    {
        if ($request->ajax()) {
           return $this->userRepository->thanksRecievers($request);
        }
        return view('userrecievers');
    }

    /**
     * Display a listing of user thanks given.
     *
     * @return \Illuminate\Http\Response
     */
    public function thanksSenders(Request $request)
    {
        if ($request->ajax()) {
           return $this->userRepository->thanksSenders($request);
        }
        return view('usersenders');
    }

    /**
     * Display a listing of user thanks given.
     *
     * @return \Illuminate\Http\Response
     */
    public function latestActivity(Request $request)
    {
        if ($request->ajax()) {
          return $this->userRepository->latestActivity($request);
        }
        return view('latestactivity');
    }
}
