@extends('layouts.master')
@section('title','Dashboard')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-sm-6">
                <div class="card">
                    <div class="card-body">
                        <div class="media align-items-center">
                            <div class="avatar avatar-icon avatar-lg avatar-purple">
                                <i class="anticon anticon-user"></i>
                            </div>
                            <div class="m-l-15">
                                <h2 class="m-b-0">{{ $karyawan }}</h2>
                                <p class="m-b-0 text-muted">Karyawan</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="card">
                    <div class="card-body">
                        <div class="media align-items-center">
                            <div class="avatar avatar-icon avatar-lg avatar-purple">
                                <i class="anticon anticon-user"></i>
                            </div>
                            <div class="m-l-15">
                                <h2 class="m-b-0">{{ $admin }}</h2>
                                <p class="m-b-0 text-muted">Admin</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <div class="row align-items-center">
                    <div class="col-md-7 col-sm-4">
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
                    <div class="col-md-5 col-sm-8">
                        <div class="row">
                            <div class="d-md-block d-none border-left col-1"></div>
                            <div class="col">
                                <ul class="list-unstyled m-t-10">
                                    <li class="row">
                                        <p class="col-sm-4 col-4 font-weight-semibold text-dark m-b-5">
                                            <i class="m-r-auto text-primary anticon anticon-mail"></i>
                                            <span>Email: </span>
                                        </p>
                                        <p class="col font-weight-semibold"> {{ Auth::user()->email }}</p>
                                    </li>
                                    <li class="row">
                                        <p class="col-sm-4 col-4 font-weight-semibold text-dark m-b-5">
                                            <i class="m-r-auto text-primary anticon anticon-phone"></i>
                                            <span>No. Hp: </span>
                                        </p>
                                        <p class="col font-weight-semibold"> {{ Auth::user()->phone }}</p>
                                    </li>
                                    <li class="row">
                                        <p class="col-sm-4 col-4 font-weight-semibold text-dark m-b-5">
                                            <i class="m-r-auto text-primary anticon anticon-compass"></i>
                                            <span>Alamat: </span>
                                        </p>
                                        <p class="col font-weight-semibold"> {{ Auth::user()->address }}</p>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
