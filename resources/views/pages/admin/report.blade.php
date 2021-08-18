@extends('layouts.master')
@section('title', 'Laporan Patroli')

@push('style')
    <link rel="stylesheet" href="assets/vendors/datatables/dataTables.bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/customize.css">
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
                    <th>Jam Mulai</th>
                    <th>Jam Selesai</th>
                    <th>Laporan</th>
                    <th class="text-center">Foto</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($laporan as $index => $laporan)
                    <tr>
                        <td>{{ $index +1 }}</td>
                        <td>{{ $laporan->users->name  }}</td>
                        <td>{{ \Carbon\Carbon::parse($laporan->date)->format('d M Y') }}</td>
                        <td>{{ $laporan->start }}</td>
                        <td>{{ $laporan->end }}</td>
                        <td>{{ $laporan->report }}</td>
                        <td class="text-center"><img onclick="img_popup()" class="img-report-patroli" src="{{ url('/storage/image/'.$laporan->photo) }}" alt="Foto Laporan" style="width: 50%;height: auto"><td>
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

<div id="myModal" class="modal">
    <span class="close text-white" style="font-size: 500%">&times;</span>
    <img style="height: 80%; width: auto" class="modal-content" id="img01">
    <div id="caption"></div>
</div>

@endsection
@push('script')
<script src="assets/vendors/datatables/jquery.dataTables.min.js"></script>
<script src="assets/vendors/datatables/dataTables.bootstrap.min.js"></script>
<script>
    // Get the modal
    let modal = document.getElementById("myModal");

    // Get the image and insert it inside the modal - use its "alt" text as a caption
    let img = document.getElementsByClassName("img-report-patroli");
    let modalImg = document.getElementById("img01");
    let captionText = document.getElementById("caption");
    const img_popup = () => {
        console.log(img);
        modal.style.display = "block";
        modalImg.src = img[0].src;
        captionText.innerHTML = img[0].alt;
    }

    // Get the <span> element that closes the modal
    var span = document.getElementsByClassName("close")[0];

    span.onclick = function() {
      modal.style.display = "none";
    }
</script>
<script>$('#data-table').DataTable();</script>
@endpush
