<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use Session;
use Gate;

class SuperUsersController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       if(!Gate::allows('isAdmin')){
            return redirect()->route('login');
        }

        $users = User::orderBy('user_type', 'asc')->orderBy('id', 'desc')->where('user_type', 'admin')->orwhere('user_type', 'author')->paginate(10);

        return view('superusers.index')->withUsers($users);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(!Gate::allows('isAdmin')){
            return redirect()->route('login');
        }

        return view('superusers.create');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(!Gate::allows('isAdmin')){
            return redirect()->route('login');
        }

        $request->validate([
            'name' => 'required|max:191',
            'email' => 'required|email|min:5|max:191|unique:users,email',
            'password' => 'required|min:6|max:191|confirmed',
        ]);

        $user = new User;

        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->user_type = $request->user_type;

        $user->save();

        Session::flash('success', 'The user was successfully created!');

        return redirect()->route('superusers.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
            return redirect()->route('login');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if(!Gate::allows('isAdmin')){
            return redirect()->route('login');
        }

        $user = User::find($id);

        return view('superusers.edit')->withUser($user);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if(!Gate::allows('isAdmin')){
            return redirect()->route('login');
        }

        $user = user::find($id);

        if($request->input('email') == $user->email){
            $request->validate([
                'name' => 'required|max:191',
                'password' => 'required|max:191',
            ]);
        }
        else{
            $request->validate([
                'name' => 'required|max:191',
                'email' => 'required|email|min:5|max:191|unique:users,email',
                'password' => 'required|max:191',
            ]);
        }


        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = bcrypt($request->password);
        $user->user_type = $request->input('user_type');
        $user->save();

        Session::flash('success', 'This user was successfully saved.');

        return redirect()->route('superusers.edit', $user->id);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(!Gate::allows('isAdmin')){
            return redirect()->route('login');
        }

        $user = User::find($id);
        
        $user->delete();

        Session::flash('success', 'The user was successfully deleted.');

        return redirect()->route('superusers.index');
    }
}
