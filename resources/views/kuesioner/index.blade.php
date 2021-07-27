@extends('layouts.master')

@section('content')

<section class="content">

    <h2> Data Kuesioner</h2>

    <div class="col-md-12">
        <form action="#" method="get" class="navbar-form navbar-right">
            <div class="input-group ">
                <input type="text" name="q" class="form-control" placeholder="Search...">
                <span class="input-group-btn">
                    <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i
                            class="fa fa-search"></i>
                    </button>
                </span>
            </div>
        </form>
    </div>
    <div class="box-botton">

        <a href="{{ url('kuesioner/create') }}" class="btn btn-primary btn btn-primary" style="float: left;">Tambah
            Kuesioner</a>


        <!-- /.content -->
        <div class="box-body">
            <div id="kuesioner">


                @if (!empty($kuesioner_list) )
                <table class="table">
                    <thead>
                        <tr>
                            <th>tanggal</th>
                            <th>id</th>
                            <th>jenis kelamin</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($kuesioner_list as $kuesioner)
                        <tr>
                            <td>{{ $kuesioner->tanggal }}</td>
                            <td>{{ $kuesioner->id }}</td>
                            <td>{{ $kuesioner->jeniskelamin }}</td>
                            <td>
                                <div class="box-botton">

                                    <a class="btn btn-success btn-sm" href="/kuesioner/show/{{ $kuesioner->id }}">Detail</a>
                                </div>
                                <div class="box-botton">
                                    {{ link_to('kuesioner/' . $kuesioner->id . '/edit', 'Edit', ['class'
                                                            => 'btn btn-warning btn-sm']) }}
                                </div>

                                <div class="box-button">
                                    <form action="/kuesioner/destroy/{{$kuesioner->id}}" method="POST">
                                        @csrf
                                        <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                                    </form>
                                </div>

                            </td>

                        </tr>
                        @endforeach
                    </tbody>
                </table>

                @else
                <p>Tidak ada data Kuesioner</p>
                @endif

                <div class="table-nav">
                    <div class="jumlah-data">
                        <strong> Jumlah Kuesioner: {{ $jumlah_kuesioner }} </strong>
                    </div>
                    <div class="paging">
                        {{ $kuesioner_list->links() }}
                    </div>
                </div>

                <div class="table-button">


                </div>

                <div class="pull-right">
                    Pagination
                </div>
            </div>

</section>


@endsection
