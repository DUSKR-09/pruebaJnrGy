@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Calcular el factorial de un número</h1>

    <form method="put" action="">
        <label for="num">Introduzca el número:</label>
        <input type="num" name="num" required>
        <button type="submit">Calcular</button>
    </form>


    <?php
    function factorial($n)
    {
        if ($n == 0 || $n == 1) {
            return 1;
        } else {
            return $n * factorial($n - 1);
        }
    }

    if (isset($num)) {
        $result = factorial($num);
        echo "<p>El factorial de $num es $result.</p>";
    }
    ?>
</div>
@endsection

