@extends('layouts.master')
@section('title', 'Laporan Patroli')

@push('style')
    <link rel="stylesheet" href="assets/vendors/datatables/dataTables.bootstrap.min.css">
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

<div class="card">
    <div class="card-body">
        <table id="data-table" class="table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Karyawan</th>
                    <th>Tanggal Patroli</th>
                    <th>Jalm Mulai</th>
                    <th>Jam Selesai</th>
                    <th>Laporan</th>
                    <th>Foto</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($laporan as $index => $laporan)
                    <tr>
                        <td>{{ $index +1 }}</td>
                        <td>{{ $laporan->users->name  }}</td>
                        <td>{{ $laporan->date }}</td>
                        <td>{{ $laporan->start }}</td>
                        <td>{{ $laporan->end }}</td>
                        <td>{{ $laporan->report }}</td>
                        <td>{{ $laporan->photo }}</td>
                        <td>
                            <div class="d-flex">
                                <form method="POST" action="#">
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
</div>



@endsection
@push('script')
<script src="assets/vendors/datatables/jquery.dataTables.min.js"></script>
<script src="assets/vendors/datatables/dataTables.bootstrap.min.js"></script>
<script>$('#data-table').DataTable();</script>
@endpush
