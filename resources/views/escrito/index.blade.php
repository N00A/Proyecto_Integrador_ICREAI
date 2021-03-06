@extends('layouts.layout')
@section('pp')
<div class="row">
    <section class="content">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="pull-left">
                        <h1>Escrito</h1>
                    </div>
                    <div class="pull-right">
                        <div class="btn-group">
                            <a href="{{ route('inicio') }}" class="btn btninfo">Ir a Escribir</a>
                        </div>
                    </div>
                    <div class="table-container">


                        <table id="mytable" class="table table-bordred table-striped">
                            <thead>
                                @if($escrito->count())
                                <th>
                                    <h3>¡Comenzemos a LEER!</h3>
                                </th>
                            </thead>
                            <tbody>


                                @foreach($escrito as $escrito)
                                <tr>

                                    <td>
                                        <h4 class="textJutificado">{{$escrito->texto}}</h4>
                                    </td>

                                </tr>

                                @endforeach
                                @else
                                <tr>
                                    <td colspan="8"> SORRY, No hay registros todavia TwT!!</td>
                                </tr>
                                @endif
                            </tbody>
                        </table>

                    </div>
                </div>

            </div>
        </div>
    </section>
    @endsection