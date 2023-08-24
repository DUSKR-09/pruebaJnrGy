@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="card card-default">
                <div class="card-header">
                    <h3 class="card-title">
                        Incisos
                    </h3>
                </div>

                <div class="card-body">

                    <div class="alert alert-success ">
                        1. Realizar un script en php que solicite un numero e imprima el factorial del mismo ejemplo
                        <a type="button" class="btn btn-block btn-info btn-lg" href="{{route("incisos.factorial")}}">Ver Solución</a>
                    </div>

                    <div class="alert alert-success ">
                        2. Realizar un script en php que imprima la tabla de amortizaciones de un préstamo usado el tipo de cuota sobre saldos, este mismo debe solicitar 3 valores: monto, plazo en meses y tasa de interés mensual
                        <a type="button" class="btn btn-block btn-info btn-lg" href="{{route("incisos.amortizacion")}}">Ver Solución</a>
                    </div>

                </div>

            </div>

        </div>
    </div>
@endsection

