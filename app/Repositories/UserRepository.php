<?php

namespace App\Repositories;
use App\User;
use Illuminate\Http\Request;
use DataTables;
use App\UserComment;
use Illuminate\Support\Facades\Auth;

Class UserRepository{

    public function __construct(User $user,UserComment $userComment){
        $this->user = $user;
        $this->userComment = $userComment;
    }

     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($request)
    {
        if ($request->ajax()) {
            $data = User::latest()->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $btn =
                        '<button type="button" data-id=' .
                        $row->id .
                        ' data-name=' .
                        ucwords($row->email) .
                        ' class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                           Thank You
                         </button>
                         ';

                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return true;
    }

    /**
     * Save user comments.
     *
     * @return \Illuminate\Http\Response
     */
    public function commentSave($request)
    {
        $data = $request->all();
        $data['sender_id'] = Auth::user()->id;
        $comments = UserComment::create($data);
        if($comments){
            return true;
        }else{
            return false;
        }
    }

    /**
     * Display a listing of user thanks recived.
     *
     * @return \Illuminate\Http\Response
     */
    public function thanksRecievers($request)
    {
        if ($request->ajax()) {
            $data = UserComment::with('thsnksrecievers')->groupBy('user_id');
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('username', function (UserComment $userComment) {
                    return $userComment->thsnksrecievers->name;
                })
                ->addColumn('useremail', function (UserComment $userComment) {
                    return $userComment->thsnksrecievers->email;
                })
                ->toJson();
        }
        return true;
    }

     /**
     * Display a listing of user thanks given.
     *
     * @return \Illuminate\Http\Response
     */
    public function thanksSenders($request)
    {
        if ($request->ajax()) {
            $data = UserComment::with('thankssenders')->groupBy('sender_id');
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('username', function (UserComment $userComment) {
                    return $userComment->thankssenders->name;
                })
                ->addColumn('useremail', function (UserComment $userComment) {
                    return $userComment->thankssenders->email;
                })
                ->toJson();
        }
        return true;
    }

      /**
     * Display a listing of user thanks given.
     *
     * @return \Illuminate\Http\Response
     */
    public function latestActivity($request)
    {
        if ($request->ajax()) {
            $data = UserComment::with(['thankssenders', 'thsnksrecievers']);
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('parents', function (UserComment $userComment) {
                    return $userComment->thankssenders->name;
                })
                ->addColumn('users', function (UserComment $userComment) {
                    return $userComment->thsnksrecievers->name;
                })
                ->rawColumns(['parents', 'users'])
                ->make(true);
        }
        return true;
    }
}