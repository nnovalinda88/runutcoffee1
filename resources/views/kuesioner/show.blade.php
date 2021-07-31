@extends('layouts.master')

@section('content')

<section class="content">


<div id="kuesioner">

        <h2>Detail Kuesioner</h2>
        <table class="table table-striped">
       
        <tr>
            <th>id kuesioner</th>
            <td>{{ $kuesioner->id }}</td>
        </tr>
        <tr>
            <th>Jenis Kelamin</th>
            <td>{{ $kuesioner->jeniskelamin }}</td>
        </tr>
        <th>Pelayanan</th>
            <td>{{ $kuesioner->Pelayanan }}</td>
        <tr>
            <th>Produk</th>
            <td>{{ $kuesioner->Produk }}</td>
        </tr>

        <tr>
            <th>Kebersihan</th>
            <td>{{ $kuesioner->Kebersihan }}</td>
        </tr>

        <tr>
            <th>Harga</th>
            <td>{{ $kuesioner->Harga }}</td>
        </tr>

        <tr>
            <th>Rekomendasi</th>
            <td>{{ $kuesioner->Rekomendasi }}</td>
        </tr>


    </table>
</div>
@endsection

    <!-- /.content -->

