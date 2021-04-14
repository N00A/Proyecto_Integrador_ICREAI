<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Escrito;
use App\Genero;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Carbon\Carbon;

class ForoController extends Controller
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


        $id = $request->idGenero;



        $foro = DB::table('foro as fo')
            ->join('generos as ge', 'ge.id', '=', 'fo.genero_id')
            ->SELECT('fo.id', 'fo.contenido', 'fo.genero_id')
            ->where('fo.genero_id', $id)
            ->get();




        return view('escrito.index', compact('escritos', 'id'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        if ($request) {

            $query = $request->genero;

            $genero = DB::table('generos as g')
                ->SELECT('g.id', 'g.name', 'g.descripcion')
                ->where('g.id', $query)
                ->paginate(10);

            $foro = DB::table('foro as fo')
                ->join('generos as ge', 'ge.id', '=', 'fo.genero_id')
                ->SELECT('fo.id', 'fo.descripcion','es.genero_id')
                ->where('fo.genero_id', $query)
                ->orderByDesc('fo.created_at')
                ->paginate(10);
           
            return view('escrito.index', compact('genero', 'foro'));

            return view('escrito.index', ["genero" => $genero, "foro" => $foro]);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        Foro::create($request->all());

        $idGenero = $request->genero_id;

        $foro = DB::table('foro as fo')
            ->join('generos as ge', 'ge.id', '=', 'es.genero_id')
            ->SELECT('fo.id', 'fo.descripcion','es.genero_id')
            ->where('fo.genero_id', $idGenero)
            ->get();


        return redirect()->route('escrito.index', compact('foro', 'idGenero'));

        //return view('escrito.index', compact('escritos', 'idGenero'));
        // return redirect()->route('escrito.index')->with('success', 'Registro creado satisfactoriamente');

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
    public function update(Request $request, $id)
    {
        //
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
