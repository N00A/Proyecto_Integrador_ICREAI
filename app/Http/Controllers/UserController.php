<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Kernelnullablenull;
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
            'avatar' => 'nullable|image|mimes:jpg,png,jpeg,gif,svg|max:2048', 'name' => 'required|max:40|min:3', 'email' => 'required|max:40|min:3'
        ]);
        if ($request->avatar != null) {
            $filename = Auth::id() . '_' . time() . '.' . $request->avatar->getClientOriginalExtension();
        }

        $filename1 = $request->name;
        $filename2 = $request->email;

        if ($request->avatar != null) {
            $request->avatar->move(public_path('uploads/avatars'), $filename);
        }

        $user = Auth::user();

        if ($request->avatar != null) {
            $user->avatar = $filename;
        }

        $user->name = $filename1;
        $user->email = $filename2;
        $user->save();

        return redirect()->route('user.profile');
    }
}
