@extends('layouts.master')
@section('title','Dashboard')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-body">
                <ul class="list-unstyle m-10 d-flex justify-content-center align-items-center">
                    @if ($patroli == null || $patroli['end'] != null)
                        <div class="col-sm-4 col-6 font-weight-semibold text-dark m-b-5 text-center">
                                <h3>Silahkan Tempelkan Kartu RFID Anda</h3>
                                <img src="{{ url('/assets/images/rfid.png') }}" style="width: 200px"> <br>
                                <img src="{{ url('/assets/images/animasi2.gif') }}" class="mt-2">
                        </div>
                    @else
                        @if ($patroli->end == null)
                            <div class="col-sm-6 col-6 font-weight-semibold text-dark m-b-5 text-center">
                                <span>Status: </span>
                                <span class="btn bg-success p-1 text-white badge" style="font-size: 80%">Laporan Patroli</span>
                            </div>
                            <div class="col-sm-6 col-6 font-weight-semibold text-dark m-b-5">
                                @if (count($errors) > 0)
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                                <form action="{{ route('selesai-patroli') }}" enctype="multipart/form-data" method="post">
                                    @csrf
                                    <label for="photo">Foto Patroli</label>
                                    <input type="file" name="photo" id="photo" class="form-control">
                                    <label class="mt-4" for="report">Laporan Patroli</label>
                                    <textarea name="report" id="report" cols="30" rows="4" class="form-control" placeholder="Isi laporan patroli"></textarea>
                                    <button type="submit" class="btn btn-danger mt-3">Selesai</button>
                                </form>
                            </div>
                        @endif
                    @endif
                </ul>
            </div>
        </div>
    </div>
@endsection
