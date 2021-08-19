@extends('layouts.master')
@section('title','Dashboard')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-body">
                <div class="row align-items-center">
                    <div class="col-md-5 col-sm-4">
                        <div class="d-md-flex align-items-center">
                            <div class="text-center text-sm-left ">
                                <div class="avatar avatar-image" style="width: 150px; height:150px">
                                    <img src="{{ Auth::user()->profile_photo_url }}" alt="">
                                </div>
                            </div>
                            <div class="text-center text-sm-left m-v-15 p-l-30">
                                <h2 class="m-b-5">{{ Auth::user()->name }}</h2>
                                <p class="text-dark m-b-20">Posisi : {{ Auth::user()->role }}</p>
                                <a href="{{ route('profile.show') }}"><button class="btn btn-primary btn-tone">Edit Profile</button></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-7 col-sm-8">
                        <div class="row">
                            <div class="d-md-block d-none border-left col-1"></div>
                            <div class="col">
                                <ul class="list-unstyled m-t-10">
                                    <div class="row">
                                        @if ($patroli == null || $patroli['end'] != null)
                                            <div class="col-sm-4 col-4 font-weight-semibold text-dark m-b-5 text-center">
                                                {{-- <form action="{{ route('mulai-patroli') }}" method="post">
                                                    @csrf
                                                    <span>Mulai Patroli: </span>
                                                    <button type="submit" class="btn btn-success">Mulai</button>
                                                </form> --}}
                                                    <h3>Silahkan Tempelkan Kartu RFID Anda</h3>
                                                    <img src="{{ url('/storage/image/rfid.png') }}" style="width: 200px"> <br>
                                                    <img src="{{ url('/storage/image/animasi2.gif') }}">
                                            </div>
                                        @else
                                            @if ($patroli->end == null)
                                                <div class="col-sm-6 col-6 font-weight-semibold text-dark m-b-5 text-center">
                                                    <span>Mulai Patroli: </span>
                                                    <span class="btn bg-success p-1 text-white badge" style="font-size: 80%">Sedang Berpatroli</span>
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
                                                        <span>Selesai Patroli: </span>
                                                        <input type="file" name="photo" id="photo" class="form-control">
                                                        <textarea name="report" id="report" cols="30" rows="4" class="form-control" placeholder="report"></textarea>
                                                        <button type="submit" class="btn btn-danger mt-3">Selesai</button>
                                                    </form>
                                                </div>
                                            @endif
                                        @endif
                                    </div>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
