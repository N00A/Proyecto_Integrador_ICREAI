<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function __construct()
    {
        $this->middleware('auth')->only('profile', 'update_profile');
    }

    public function profile()
    {
        $user = Auth::user();
        return view('profile', ['user' => $user]);
    }

    public function update_profile(Request $request)
    {
        $this->validate($request, [
            'avatar' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048','name' => 'required', 'email' => 'required', 'password' => 'required'
        ]);

        $filename = Auth::id() . '_' . time() . '.' . $request->avatar->getClientOriginalExtension();
        
        $filename1 = $request->name;
        
        $filename2 = $request->email;
        
        $filename3 = bcrypt($request->password);

        $request->avatar->move(public_path('uploads/avatars'), $filename);

        $user = Auth::user();
        $user->avatar = $filename;
        $user->name = $filename1;
        $user->email = $filename2;
        $user->password = $filename3;
        $user->save();

        return redirect()->route('user.profile');
    }
}
