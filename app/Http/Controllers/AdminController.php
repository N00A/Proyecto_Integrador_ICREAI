<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
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
            $users = DB::table('users')
                ->where('email', 'LIKE', '%' . $query . '%')
                ->where('id','<>',$request->User()->id)
                ->orderBy('id', 'asc')
                ->paginate(5);
            return view('adminUser.index', ["users" => $users, "searchText" => $query]);

        }
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('adminUser.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, ['name' => 'required|max:40|min:3', 'email' => 'required|max:40|min:3', 'activo' => 'required|max:1|min:1']);
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
     // $user->password = bcrypt($request->password); // Se encripta la contraseña usando la función bcrypt().
        $user->activo = $request->activo;
        $user->save(); // Se guarda el registro en la base de datos.
        return redirect()->route('administrador.index')->with('success', 'Registro creado satisfactoriamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $users = User::find($id);
        return view('adminUser.show', compact('users'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $users = User::find($id);
        return view('adminUser.edit', compact('users'));
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
        $this->validate($request, ['name' => 'required|max:40|min:3', 'email' => 'required|max:40|min:3', 'activo' => 'required|max:1|min:1']);
        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
      //$user->password = bcrypt($request->password); // Se encripta la contraseña usando la función bcrypt().
        $user->activo = $request->activo;
        $user->save(); // Se guarda el registro en la base de datos.

        return redirect()->route('administrador.index')->with('success', 'Registro actualizado');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::find($id)->delete();
        return redirect()->route('administrador.index')->with('success', 'Registro Eliminado');
    }
}
