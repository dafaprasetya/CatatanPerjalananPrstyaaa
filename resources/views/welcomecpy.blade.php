@extends('layouts.app')

@section('content')



    <div class="container text-center">
        <h3>Catatan Perjalanan</h3>
        <div class="help">
        </div>
        <div id="kopi-covid"></div>
    </div>

    <script>
    var f = document.createElement("iframe")
    f.src = "https://kopi.dev/widget-covid-19/#footer=false"
    f.width = "100%"
    f.height = 250
    f.scrolling = "no"
    f.frameBorder = 0
    var rootEl = document.getElementById("kopi-covid")
    console.log(rootEl)
    rootEl.appendChild(f)
    </script>
    <div class="container text-center">

        <p>Stay Healthty dan Patuhi 3M©</p>
        <p>catatan perjalalan dibuat untuk mencegah penyebaran covid 19 dengan cara mentrack kemana anda berpergian</p>

    </div>
@endsection
