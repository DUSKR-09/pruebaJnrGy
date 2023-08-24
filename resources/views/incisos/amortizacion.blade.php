@extends('layouts.app')

@section('content')
    <div class="container">
        <?php
        error_reporting(E_ALL ^ E_NOTICE);

        if (!isset($tas)) {
            $cap = $monto;
            $tas = $tasa;
            $per = $periodo;

            $tasaint = ($tas) / 100;
            $saldoini = $cap;
            $amortizacion = $cap == 0 ? 0 : (float)($cap / $per);
        }
        ?>

        <h2>Tabla de Amortizaciones</h2>
        <div class="row">
            <div class="col-sm-12">
                <form action="{{action('IncisosController@amortizacion')}}" method="PUT">
                    <div class="col-sm-3">
                        <label for="">Monto:</label>
                        <input type="text" class="form-control" id="monto" name="monto">
                    </div>
                    <div class="col-sm-3">
                        <label for="">Tasa Interés:</label>
                        <input type="text" class="form-control" id="tasa" name="tasa">
                    </div>
                    <div class="col-sm-3">
                        <label for="">Período:</label>
                        <input type="text" class="form-control" id="periodo" name="periodo">
                    </div>
                    <div class="col-sm-3">
                        <button class="btn btn-success" type="submit">Generear</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="row mt-3">
            <table class="table">
                <thead class="table-bordered">
                <tr>
                    <th>Período</th>
                    <th>Saldo</th>
                    <th>Interés</th>
                    <th>Abono</th>
                    <th>Pago</th>
                </tr>
                </thead>
                <tbody>
                <?php
                $capital = (float)$saldoini;
                for ($i = 1; $i <= $per; $i++) {
                    $saldo = $capital;
                    $int = ($capital * $tasaint);
                    $abono = $amortizacion;
                    $pago = ($amortizacion + $int);
                    $saldofin = ($saldo - $abono);
                    $capital = $saldofin;

                    echo "<tr><td>" . $i . "</td>";
                    echo "<td>" . number_format($saldo, 2, ".", ",") . "</td>";
                    echo "<td>" . number_format($int, 2, ".", ",") . "</td>";
                    echo "<td>" . number_format($abono, 2, ".", ",") . "</td>";
                    echo "<td>" . number_format($pago, 2, ".", ",") . "</td></tr>";
                }
                ?>
                </tbody>
            </table>
        </div>
    </div>
@endsection
