<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\RoleUser;
use Illuminate\Support\Facades\DB;
class RolController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     * 
     */

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
     
        $request->User()->authorizeRoles('admin');

        if ($request) {
            $query = trim($request->get('searchText'));
            $roles = DB::table('role_user')
            ->join('users', 'users.id', '=', 'role_user.user_id')
            ->select('role_user.*', 'users.name')
            ->where('role_user.user_id', 'LIKE', '%' . $query . '%')
            ->where('role_user.user_id','<>',$request->User()->id)
            ->orderBy('users.id', 'asc')
            ->paginate(5);
            return view('adminRol.index', ["roles" => $roles, "searchText" => $query]);
            
        }
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
        $roles = RoleUser::find($id);
        return view('adminRol.edit', compact('roles'));
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
        $this->validate($request, ['role_id' => 'required|max:1|min:1']);
        RoleUser::find($id)->update($request->all());
        return redirect()->route('rol.index')->with('success', 'Registro actualizado');
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
}
