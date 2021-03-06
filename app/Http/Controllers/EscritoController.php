<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Escrito;
use App\Genero;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
class EscritoController extends Controller
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

    public function index(int $id)
    {
        /*$genero = Genero::all();
        $escrito = Escrito::orderBy('id', 'ASC')->paginate(3);

        return view('escrito.index', compact('genero', 'escrito'));
        */

        $escrito= DB::table('escritos as es')
        ->join('generos as ge', 'ge.id', '=', 'es.genero_id')
        ->SELECT('es.id','es.texto','es.user_id','es.genero_id')
        ->where('es.genero_id', $id)
        ->paginate(10);

        

        return view('escrito.index', compact('escrito'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        if ($request) {
            /*
            $genero = Genero::all();
            $escrito = Escrito::orderBy('id', 'DESC')->paginate(3);

            //  dd($exquisito);
            return view('escrito.create', compact('genero', 'escrito'));
            */
            $query = $request->genero;
           
            $genero = DB::table('generos as g')
                ->SELECT('g.id','g.name','g.descripcion')
                ->where('g.id', $query)
                ->paginate(10);

                $escrito= DB::table('escritos as es')
                ->join('generos as ge', 'ge.id', '=', 'es.genero_id')
                ->SELECT('es.id','es.texto','es.user_id','es.genero_id')
                ->where('es.genero_id', $query)
                ->orderByDesc('es.id')
                ->paginate(10);
                $corte=0;
                if($escrito!=null){
                foreach($escrito as $escritoPeq){

                $caracteres=Str::length($escritoPeq->texto);
                $porcentaje=$caracteres*0.9;
                $corte=round($porcentaje);
                break;
                }
            }
               
                

                return view('escrito.create', compact('genero', 'escrito','corte'));

                return view('escrito.create', ["genero" => $genero, "escrito" => $escrito, "corte" => $corte]);
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

        $this->validate($request, ['texto' => 'required|min:200', 'user_id' => 'required', 'genero_id' => 'required']);
        Escrito::create($request->all());

        $query = $request->genero_id;

        $escrito= DB::table('escritos as es')
                ->join('generos as ge', 'ge.id', '=', 'es.genero_id')
                ->SELECT('es.id','es.texto','es.user_id','es.genero_id')
                ->where('es.genero_id', $query)
                ->paginate(10);

               return view('escrito.index', compact('escrito'));

               return view('escrito.index', ["escrito" => $escrito]);
       
       // return redirect()->route('escrito.index')->with('success', 'Registro creado satisfactoriamente');
      //return view('escrito.index', compact('escrito'));
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
