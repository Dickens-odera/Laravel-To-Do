<?php

namespace App\Http\Controllers;

use App\Lists;
use App\User;
use Illuminate\Auth\Middleware\Authorize;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Validator;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(User $user,Lists $lists)
    {
            $this->authorize('view-lists', $lists);
            $user = Auth::user();
            $lists = $lists->where('user_id','=',$user->id)->paginate(5);
            return view('home', compact('lists'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Lists $lists)
    {
       $this->authorize('create-lists', $lists);
       $validator = Validator::make($request->all(), array(
            'task'=>'required',
            'description'=>'required'
       ));
       if($validator->fails())
       {
           $request->session()->flash('error',$validator->errors());
           return redirect()->back()->withInput($request->only('task','description'));
       }
       if($lists->create(array(
            'task'=>$request->task,
            'description'=>$request->description,
            'isComplete'=>false,
            'user_id'=>Auth::user()->id
            )))
        {
            $request->session()->flash('success','List added successfully');
            return redirect()->route('home');
        }
        else
        {
            $request->session()->flash('error','Failed to add a new list, try again');
            return redirect()->back()->withInput($request->only('task','description'));
        }
    }
    public function update(Request $request, $id, Lists $lists)
    {
        $this->authorize('update-lists', $lists);
        $lists = $lists->findOrFail($id);
        $lists->update(array(
            'task'=>$request->task,
            'description'=>$request->description,
            'isComplete'=>false,
        ));
        return redirect()->back();
    }
}
