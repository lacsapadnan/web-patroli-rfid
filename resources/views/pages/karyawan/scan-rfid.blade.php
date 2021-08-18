@extends('layouts.master')
@section('title','Dashboard')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-body">
                <div class="row align-items-center">
                    <div class="col-md-12 col-sm-12">
                        <div class="container-fluid text-center" style="padding-top: 10%">
                            @if ($nokartu == null)
                                <h3>Silahkan Tempelkan Kartu RFID Anda</h3>
                                <img src="{{ url('/storage/image/rfid.png') }}" style="width: 200px"> <br>
                                <img src="{{ url('/storage/image/animasi2.gif') }}">
                            @else
                                <h1>Hi {{Auth::user()->name}}, Anda sudah scan</h1>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>

    </script>
@endsection
