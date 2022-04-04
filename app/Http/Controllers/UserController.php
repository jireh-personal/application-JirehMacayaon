<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\UserRegister;
use App\Http\Requests\UserLogin;
use App\Http\Requests\UserProfile;
use App\Models\User;
use Auth;
use Hash;
use Session;

use App\Events\EmailEvent;
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('profile');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserProfile $request, $id)
    {
        $user = User::find($id);
        $user->fill($request->validated());
        $user->infos()->updateorCreate(['user_id' => $user->id],$request->validated());
        $user->save();

        Session::flash('success','Profile successfuly updated');
        return redirect('/profile');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function register(UserRegister $request)
    {
        $user = new User;
        $user->firstname = $request->firstname;
        $user->lastname = $request->lastname;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();
        
        Auth::login($user);
        event(new EmailEvent(Auth::user()));
        return redirect(url('/profile'));
    }
    public function login(UserLogin $request)
    {

        if(Auth::attempt(['email' => $request->email,'password' => $request->password],$request->remember_me))
        {            
            return redirect(url('/profile'));
        }
        else
        {
            Session::flash('error','Incorrect Email or Password.');
            return redirect(route('login'));
        }
        
    }
    public function logout()
    {
        Auth::logout();
        return redirect(route('login'));
    }
    public function deleteUser()
    {
        Auth::user()->infos()->delete();
        Auth::user()->delete();

        return redirect(route('login'));
    }
}
