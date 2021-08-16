@extends('layouts.master')

@section('title', 'Data Karyawan')

@push('style')
    <link rel="stylesheet" href="assets/vendors/datatables/dataTables.bootstrap.min.css">
    <link href="assets/vendors/select2/select2.css" rel="stylesheet">
@endpush

@section('content')
    <div class="page-header">
        <div class="header-title">
            <h2>@yield('title')</h2>
        </div>
        <br />
        <div class="header-sub-title">
        <nav class="breadcrumb breadcrumb-dash">
            <a href="{{ route('dashboard') }}" class="breadcrumb-item"><i class="anticon anticon-home m-r-5"></i>Home</a>
            <span class="breadcrumb-item active">@yield('title')</span>
        </nav>
        </div>
    </div>

    <button type="button" class="btn btn-primary m-b-20" data-toggle="modal" data-target="#exampleModal">
        Tambah Karyawan
    </button>

    <div class="card">
        <div class="card-body">
            <table id="data-table" class="table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Alamat</th>
                        <th>No. Telp</th>
                        <th>UUID</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $index => $users)
                        <tr>
                            <td>{{ $index +1 }}</td>
                            <td>{{ $users->name }}</td>
                            <td>{{ $users->email }}</td>
                            <td>{{ $users->address }}</td>
                            <td>{{ $users->phone }}</td>
                            <td>{{ $users->uuid }}</td>
                            <td>
                                <div class="d-flex">
                                    <form method="POST" action="{{ route('data-karyawan.destroy', $users->id) }}">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-icon btn-danger btn-tone"><i class="anticon anticon-delete"></i></button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="modal fade" id="exampleModal">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add Renter</h5>
                        <button type="button" class="close" data-dismiss="modal">
                            <i class="anticon anticon-close"></i>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form method="POST" action="{{ route('data-karyawan.store') }}" enctype="multipart/form-data">
                            @csrf
                            @method('POST')
                            <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="uuid">UUID</label>
                                <input name="uuid" type="text" class="form-control" id="uuid" placeholder="Tempelkan kartu rfid...">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="name">Nama</label>
                                <input name="name" type="text" class="form-control" id="name" placeholder="Masukan nama...">
                            </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="email">Email</label>
                                    <input name="email" type="email" class="form-control" id="email" placeholder="Masukan email...">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="phone">No. Telp</label>
                                    <input name="phone" type="tel" class="form-control" id="phone" placeholder="masukan nomor telp...">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="address">Alamat</label>
                                <div class="input-group">
                                    <textarea name="address" class="form-control" aria-label="With textarea" placeholder="Masukan alamat..."></textarea>
                                </div>
                            </div>
                            <input type="text" id="role" class="form-control" name="role" value="karyawan" hidden>
                            <input type="password" id="password" class="form-control" name="password" value="{{ bcrypt('karywan123') }}" hidden>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection

@push('script')
    <script src="assets/vendors/datatables/jquery.dataTables.min.js"></script>
    <script src="assets/vendors/datatables/dataTables.bootstrap.min.js"></script>
    <script>$('#data-table').DataTable();</script>
    <script src="assets/vendors/select2/select2.min.js"></script>
    <script>$('.select2').select2();</script>
@endpush
