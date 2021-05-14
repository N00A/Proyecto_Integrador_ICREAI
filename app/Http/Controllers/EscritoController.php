<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Escrito;
use App\Mensaje;
use PDF;
use App\Genero;
use Carbon\Carbon;

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

    public function index(Request $request)
    {

        $genero_id = $request->genero_id;


        $escritos = DB::table('escritos as es')
            ->join('generos as ge', 'ge.id', '=', 'es.genero_id')
            ->SELECT('es.id', 'es.texto', 'es.user_id', 'es.genero_id')
            ->where('es.genero_id', $genero_id)
            ->get();

        $mensaje = DB::table('mensajes as me')
            ->join('generos as ge', 'ge.id', '=', 'me.genero_id')
            ->join('users as u', 'u.id', '=', 'me.user_id')
            ->SELECT('me.id', 'me.contenido', 'me.genero_id', 'me.user_id', 'me.created_at','u.avatar','u.name')
            ->where('me.genero_id', $genero_id)
            ->get();

        return view('escrito.index', compact('escritos', 'genero_id', 'mensaje'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        if ($request) {

            $genero_id = $request->genero;

            $genero = DB::table('generos as g')
                ->SELECT('g.id', 'g.name', 'g.descripcion')
                ->where('g.id', $genero_id)
                ->paginate(10);

            $escrito = DB::table('escritos as es')
                ->join('generos as ge', 'ge.id', '=', 'es.genero_id')
                ->SELECT('es.id', 'es.texto', 'es.user_id', 'es.genero_id')
                ->where('es.genero_id', $genero_id)
                ->orderByDesc('es.id')
                ->paginate(10);
            $corte = 0;
            if ($escrito != null) {
                foreach ($escrito as $escritoPeq) {

                    $caracteres = Str::length($escritoPeq->texto);
                    $porcentaje = $caracteres * 0.9;
                    $corte = round($porcentaje);
                    break;
                }
            }

            $user_id = $request->user_id;

            $ultimoId = DB::table('escritos as es')
                ->join('generos as ge', 'ge.id', '=', 'es.genero_id')
                ->SELECT('es.user_id')
                ->where('es.genero_id', $genero_id)
                ->orderByDesc('es.created_at')
                ->paginate(1);
            $ultId = 0;
            if ($ultimoId != null) {
                foreach ($ultimoId as $id) {
                    $ultId = $id->user_id;
                }
            }

            return view('escrito.create', compact('genero', 'escrito', 'corte', 'user_id', 'ultId'));
        }
    }
    public function createMensaje(Request $request)
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validate($request, ['texto' => 'required|min:100', 'user_id' => 'required', 'genero_id' => 'required']);

        Escrito::create($request->all());

        $genero_id = $request->genero_id;

        return redirect()->route('escrito.index', compact('genero_id'));
    }

    public function storeMensaje(Request $request)
    {

        $this->validate($request, ['contenido' => 'required', 'genero_id' => 'required', 'user_id' => 'required']);

        Mensaje::create($request->all());

        $genero_id = $request->genero_id;

        return redirect()->route('escrito.index', compact('genero_id'));
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

    public function crearPDF(Request $request)
    {

        $genero_id = $request->genero_id_pdf;

        //Con la primer variable obtenemos un formato general de fecha
        //Con la propiedad monthName obtenemos el nombre del mes que recuperamos en la línea anterior
        //Con la propiedad year recuperamos solo el año
        //Con la propiedad dayName obtenemos el nombre del día de la fecha actualmente recuperada
        //Con la propiedad day obtenemos el número de día
        //$fecha = Carbon::now()->format('d/m/Y'); obtener fecha en formato d/m/y

        $fecha  = now();
        $mes    = $fecha->monthName;
        $anio   = $fecha->year;
        $dia    = $fecha->dayName;
        $diaNumero = $fecha->day;
        $fechaPdf = $dia . " " . $diaNumero . " de " . $mes . " de " . $anio;

        $generoPdf = DB::table('generos as g')
            ->SELECT('g.name')
            ->where('g.id', $genero_id)
            ->get();

        $escritoPdf = DB::table('escritos as es')
            ->join('generos as ge', 'ge.id', '=', 'es.genero_id')
            ->SELECT('es.texto')
            ->where('es.genero_id', $genero_id)
            ->get();

        return PDF::loadView('pdf', compact('generoPdf', 'escritoPdf', 'fechaPdf'))
            ->stream('CadaverExquisito_Icreai.pdf');
    }
}
