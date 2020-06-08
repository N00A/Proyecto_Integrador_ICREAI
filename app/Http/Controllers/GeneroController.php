<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Genero;

class GeneroController extends Controller
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

    public function index()
    {
        $genero = Genero::all();
        return view('genero.index', compact('genero'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $genero = Genero::all();

        //  dd($exquisito);
        return view('genero.create', compact('genero'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validate($request, ['name' => 'required|max:40|min:3', 'descripcion' => 'required|min:10']);
        Genero::create($request->all());
        return redirect()->route('genero.index')->with('success', 'Registro creado satisfactoriamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $genero = Genero::find($id);
        return view('genero.show', compact('genero'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $genero = Genero::find($id);
        return view('genero.edit', compact('genero'));
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
        $this->validate($request, ['name' => 'required|max:40|min:3', 'descripcion' => 'required|min:10']);
        $genero = Genero::find($id);
        $genero->name = $request->name;
        $genero->descripcion = $request->descripcion;
      //$user->password = bcrypt($request->password); // Se encripta la contraseña usando la función bcrypt().
        
        $genero->save(); // Se guarda el registro en la base de datos.

        return redirect()->route('genero.index')->with('success', 'Registro actualizado');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Genero::find($id)->delete();
        return redirect()->route('genero.index')->with('success', 'Registro Eliminado');
    }
}
