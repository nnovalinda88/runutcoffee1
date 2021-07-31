@extends('layouts.master')

@section('content')

<section class="content">

    <h2> Hitung Data Kuesioner</h2>
    <h4> Hasil tabel </h4>

    <div class="box-botton">

        <!-- /.content -->
        <div class="box-body">
            <table class="table" border="5">
                <thead>
                    <tr>
                        <th>Attribute</th>
                        <th>Nilai</th>
                        <th>Sum(Nilai)</th>
                        <th>Sum(Ya)</th>
                        <th>Sum(Tidak)</th>
                        <th>Entrophy</th>
                        <th>Gain</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td colspan="2">Total Kasus</td>
                        @php
                            $tot_nilai = $arr['total']->sum_nilai;
                            $tot_ya = $arr['total']->sum_ya;
                            $tot_tidak = $arr['total']->sum_tidak;

                            // PELAYANAN
                            $tot_nilai_pel1 = $arr['pelayanan']->sum_nilai_pelayanan1;
                            $tot_ya_pel1 = $arr['pelayanan']->sum_ya_pelayanan1;
                            $tot_tidak_pel1 = $arr['pelayanan']->sum_tidak_pelayanan1;

                            $tot_nilai_pel2 = $arr['pelayanan']->sum_nilai_pelayanan2;
                            $tot_ya_pel2 = $arr['pelayanan']->sum_ya_pelayanan2;
                            $tot_tidak_pel2 = $arr['pelayanan']->sum_tidak_pelayanan2;

                            $tot_nilai_pel3 = $arr['pelayanan']->sum_nilai_pelayanan3;
                            $tot_ya_pel3 = $arr['pelayanan']->sum_ya_pelayanan3;
                            $tot_tidak_pel3 = $arr['pelayanan']->sum_tidak_pelayanan3;

                            $tot_nilai_pel4 = $arr['pelayanan']->sum_nilai_pelayanan4;
                            $tot_ya_pel4 = $arr['pelayanan']->sum_ya_pelayanan4;
                            $tot_tidak_pel4 = $arr['pelayanan']->sum_tidak_pelayanan4;

                            $tot_nilai_pel5 = $arr['pelayanan']->sum_nilai_pelayanan5;
                            $tot_ya_pel5 = $arr['pelayanan']->sum_ya_pelayanan5;
                            $tot_tidak_pel5 = $arr['pelayanan']->sum_tidak_pelayanan5;

                            // PRODUK
                            $tot_nilai_produk1 = $arr['produk']->sum_nilai_produk1;
                            $tot_ya_produk1 = $arr['produk']->sum_ya_produk1;
                            $tot_tidak_produk1 = $arr['produk']->sum_tidak_produk1;

                            $tot_nilai_produk2 = $arr['produk']->sum_nilai_produk2;
                            $tot_ya_produk2 = $arr['produk']->sum_ya_produk2;
                            $tot_tidak_produk2 = $arr['produk']->sum_tidak_produk2;

                            $tot_nilai_produk3 = $arr['produk']->sum_nilai_produk3;
                            $tot_ya_produk3 = $arr['produk']->sum_ya_produk3;
                            $tot_tidak_produk3 = $arr['produk']->sum_tidak_produk3;

                            $tot_nilai_produk4 = $arr['produk']->sum_nilai_produk4;
                            $tot_ya_produk4 = $arr['produk']->sum_ya_produk4;
                            $tot_tidak_produk4 = $arr['produk']->sum_tidak_produk4;

                            $tot_nilai_produk5 = $arr['produk']->sum_nilai_produk5;
                            $tot_ya_produk5 = $arr['produk']->sum_ya_produk5;
                            $tot_tidak_produk5 = $arr['produk']->sum_tidak_produk5;

                            // KEBERSIHAN
                            $tot_nilai_kebersihan1 = $arr['kebersihan']->sum_nilai_kebersihan1;
                            $tot_ya_kebersihan1 = $arr['kebersihan']->sum_ya_kebersihan1;
                            $tot_tidak_kebersihan1 = $arr['kebersihan']->sum_tidak_kebersihan1;

                            $tot_nilai_kebersihan2 = $arr['kebersihan']->sum_nilai_kebersihan2;
                            $tot_ya_kebersihan2 = $arr['kebersihan']->sum_ya_kebersihan2;
                            $tot_tidak_kebersihan2 = $arr['kebersihan']->sum_tidak_kebersihan2;

                            $tot_nilai_kebersihan3 = $arr['kebersihan']->sum_nilai_kebersihan3;
                            $tot_ya_kebersihan3 = $arr['kebersihan']->sum_ya_kebersihan3;
                            $tot_tidak_kebersihan3 = $arr['kebersihan']->sum_tidak_kebersihan3;

                            $tot_nilai_kebersihan4 = $arr['kebersihan']->sum_nilai_kebersihan4;
                            $tot_ya_kebersihan4 = $arr['kebersihan']->sum_ya_kebersihan4;
                            $tot_tidak_kebersihan4 = $arr['kebersihan']->sum_tidak_kebersihan4;

                            $tot_nilai_kebersihan5 = $arr['kebersihan']->sum_nilai_kebersihan5;
                            $tot_ya_kebersihan5 = $arr['kebersihan']->sum_ya_kebersihan5;
                            $tot_tidak_kebersihan5 = $arr['kebersihan']->sum_tidak_kebersihan5;

                            // HARGA
                            $tot_nilai_harga1 = $arr['harga']->sum_nilai_harga1;
                            $tot_ya_harga1 = $arr['harga']->sum_ya_harga1;
                            $tot_tidak_harga1 = $arr['harga']->sum_tidak_harga1;

                            $tot_nilai_harga2 = $arr['harga']->sum_nilai_harga2;
                            $tot_ya_harga2 = $arr['harga']->sum_ya_harga2;
                            $tot_tidak_harga2 = $arr['harga']->sum_tidak_harga2;

                            $tot_nilai_harga3 = $arr['harga']->sum_nilai_harga3;
                            $tot_ya_harga3 = $arr['harga']->sum_ya_harga3;
                            $tot_tidak_harga3 = $arr['harga']->sum_tidak_harga3;

                            $tot_nilai_harga4 = $arr['harga']->sum_nilai_harga4;
                            $tot_ya_harga4 = $arr['harga']->sum_ya_harga4;
                            $tot_tidak_harga4 = $arr['harga']->sum_tidak_harga4;

                            $tot_nilai_harga5 = $arr['harga']->sum_nilai_harga5;
                            $tot_ya_harga5 = $arr['harga']->sum_ya_harga5;
                            $tot_tidak_harga5 = $arr['harga']->sum_tidak_harga5;
                        @endphp
                        <td>{{ $tot_nilai }}</td>
                        <td>{{ $tot_ya }}</td>
                        <td>{{ $tot_tidak }}</td>
                        <td>{{ $arr['entrophy_total'] }}</td>
                        <td></td>
                    </tr>

                    <!-- PELAYANAN -->
                    <tr>
                        <td colspan="6">Pelayanan</td>
                        <td>{{ $arr['gain_pelayanan'] }}</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>1</td>
                        <td>{{ $tot_nilai_pel1 }}</td>
                        <td>{{ $tot_ya_pel1 }}</td>
                        <td>{{ $tot_tidak_pel1 }}</td>
                        <td>{{ $arr['entrophy_pelayanan1'] }}</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>2</td>
                        <td>{{ $tot_nilai_pel2 }}</td>
                        <td>{{ $tot_ya_pel2 }}</td>
                        <td>{{ $tot_tidak_pel2 }}</td>
                        <td>{{ $arr['entrophy_pelayanan2'] }}</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>3</td>
                        <td>{{ $tot_nilai_pel3 }}</td>
                        <td>{{ $tot_ya_pel3 }}</td>
                        <td>{{ $tot_tidak_pel3 }}</td>
                        <td>{{ $arr['entrophy_pelayanan3'] }}</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>4</td>
                        <td>{{ $tot_nilai_pel4 }}</td>
                        <td>{{ $tot_ya_pel4 }}</td>
                        <td>{{ $tot_tidak_pel4 }}</td>
                        <td>{{ $arr['entrophy_pelayanan4'] }}</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>5</td>
                        <td>{{ $tot_nilai_pel5 }}</td>
                        <td>{{ $tot_ya_pel5 }}</td>
                        <td>{{ $tot_tidak_pel5 }}</td>
                        <td>{{ $arr['entrophy_pelayanan5'] }}</td>
                        <td></td>
                    </tr>

                    <!-- PRODUK -->
                    <tr>
                        <td colspan="6">Produk</td>
                        <td>{{ $arr['gain_produk'] }}</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>1</td>
                        <td>{{ $tot_nilai_produk1 }}</td>
                        <td>{{ $tot_ya_produk1 }}</td>
                        <td>{{ $tot_tidak_produk1 }}</td>
                        <td>{{ $arr['entrophy_produk1'] }}</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>2</td>
                        <td>{{ $tot_nilai_produk2 }}</td>
                        <td>{{ $tot_ya_produk2 }}</td>
                        <td>{{ $tot_tidak_produk2 }}</td>
                        <td>{{ $arr['entrophy_produk2'] }}</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>3</td>
                        <td>{{ $tot_nilai_produk3 }}</td>
                        <td>{{ $tot_ya_produk3 }}</td>
                        <td>{{ $tot_tidak_produk3 }}</td>
                        <td>{{ $arr['entrophy_produk3'] }}</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>4</td>
                        <td>{{ $tot_nilai_produk4 }}</td>
                        <td>{{ $tot_ya_produk4 }}</td>
                        <td>{{ $tot_tidak_produk4 }}</td>
                        <td>{{ $arr['entrophy_produk4'] }}</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>5</td>
                        <td>{{ $tot_nilai_produk5 }}</td>
                        <td>{{ $tot_ya_produk5 }}</td>
                        <td>{{ $tot_tidak_produk5 }}</td>
                        <td>{{ $arr['entrophy_produk5'] }}</td>
                        <td></td>
                    </tr>

                    <!-- KEBERSIHAN -->
                    <tr>
                        <td colspan="6">Kebersihan</td>
                        <td>{{ $arr['gain_kebersihan'] }}</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>1</td>
                        <td>{{ $tot_nilai_kebersihan1 }}</td>
                        <td>{{ $tot_ya_kebersihan1 }}</td>
                        <td>{{ $tot_tidak_kebersihan1 }}</td>
                        <td>{{ $arr['entrophy_kebersihan1'] }}</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>2</td>
                        <td>{{ $tot_nilai_kebersihan2 }}</td>
                        <td>{{ $tot_ya_kebersihan2 }}</td>
                        <td>{{ $tot_tidak_kebersihan2 }}</td>
                        <td>{{ $arr['entrophy_kebersihan2'] }}</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>3</td>
                        <td>{{ $tot_nilai_kebersihan3 }}</td>
                        <td>{{ $tot_ya_kebersihan3 }}</td>
                        <td>{{ $tot_tidak_kebersihan3 }}</td>
                        <td>{{ $arr['entrophy_kebersihan3'] }}</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>4</td>
                        <td>{{ $tot_nilai_kebersihan4 }}</td>
                        <td>{{ $tot_ya_kebersihan4 }}</td>
                        <td>{{ $tot_tidak_kebersihan4 }}</td>
                        <td>{{ $arr['entrophy_kebersihan4'] }}</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>5</td>
                        <td>{{ $tot_nilai_kebersihan5 }}</td>
                        <td>{{ $tot_ya_kebersihan5 }}</td>
                        <td>{{ $tot_tidak_kebersihan5 }}</td>
                        <td>{{ $arr['entrophy_kebersihan5'] }}</td>
                        <td></td>
                    </tr>

                    <!-- HARGA -->
                    <tr>
                        <td colspan="6">Harga</td>
                        <td>{{ $arr['gain_harga'] }}</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>1</td>
                        <td>{{ $tot_nilai_harga1 }}</td>
                        <td>{{ $tot_ya_harga1 }}</td>
                        <td>{{ $tot_tidak_harga1 }}</td>
                        <td>{{ $arr['entrophy_harga1'] }}</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>2</td>
                        <td>{{ $tot_nilai_harga2 }}</td>
                        <td>{{ $tot_ya_harga2 }}</td>
                        <td>{{ $tot_tidak_harga2 }}</td>
                        <td>{{ $arr['entrophy_harga2'] }}</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>3</td>
                        <td>{{ $tot_nilai_harga3 }}</td>
                        <td>{{ $tot_ya_harga3 }}</td>
                        <td>{{ $tot_tidak_harga3 }}</td>
                        <td>{{ $arr['entrophy_harga3'] }}</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>4</td>
                        <td>{{ $tot_nilai_harga4 }}</td>
                        <td>{{ $tot_ya_harga4 }}</td>
                        <td>{{ $tot_tidak_harga4 }}</td>
                        <td>{{ $arr['entrophy_harga4'] }}</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>5</td>
                        <td>{{ $tot_nilai_harga5 }}</td>
                        <td>{{ $tot_ya_harga5 }}</td>
                        <td>{{ $tot_tidak_harga5 }}</td>
                        <td>{{ $arr['entrophy_harga5'] }}</td>
                        <td></td>
                    </tr>
                </tbody>
            </table>
            <br>
            <br>
            <h4>Hasil Peringkat Berdasarkan Perhitungan Gain</h4>
            <table class="table" border="5">
                <thead>
                    <tr>
                        <th>Peringkat</th>
                        <th>Variable</th>
                        <th>Keterangan</th>
                    </tr>
                </thead>
                    @php $peringkat = 1; @endphp
                    @foreach($hasilGain as $v)
                        <tr>
                            <td>{{ $peringkat++ }}</td>
                            <td>{{ $v->variable }}</td>
                            <td>Gain: {{ $v->gain }} x 100 = {{  number_format($v->gain * 100, 2, ',', ' ') }}%</td>
                        </tr>
                    @endforeach
                <tbody>
                </tbody>
            </table>
            <!-- <div id="hitungkuesioner">

                @if (!empty($hitungkuesioner_list) )
                <table class="table">
                    <thead>
                        <tr>
                            <th>Atribut</th>
                            <th>Variable</th>
                            <th>Jumlah Kasus</th>
                            <th>Ya</th>
                            <th>Tidak</th>
                            <th>Entropy</th>
                            <th>Gain</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($hitungkuesioner_list as $hitungkuesioner)
                        <tr>
                            <td>{{ $hitungkuesioner->atribut }}</td>
                            <td>{{ $hitungkuesioner->variable }}</td>
                            <td>{{ $hitungkuesioner->jumlah_kasus }}</td>
                            <td>{{ $hitungkuesioner->Ya }}</td>
                            <td>{{ $hitungkuesioner->Tidak }}</td>
                            <td>{{ $hitungkuesioner->Entropy }}</td>
                            <td>{{ $hitungkuesioner->Gain }}</td>
                            <td>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

                @else
                <p>Tidak ada data Perhitungan</p>
                @endif

                <div class="table-nav">

                </div>

                <div class="table-button">


                </div>

                <hr style="height:1px; width:150%; border-width:0; color:black; background-color:gray">
                </hr>
                <h3> Pohon Keputusan </h3>

                <hr style="height:1px; width:150%; border-width:0; color:black; background-color:gray">
                </hr>

                <h3> Kesimpulan Peringkat Kepuasan Pelanggan Berdasarkan Data Kuesioner Dari Tanggal 01-05-2021 sampai
                    04-06-2021 - 30 Responden </h3>


            </div> -->

            Array Biasa
            <table class="table" border="5">
                <thead>
                    <tr>
                        <th>Pelayanan</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($pelayanan as $data_pelayanan)
                    <tr>
                        <td>{{ $data_pelayanan }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

            Array Pake Nama
            <table class="table" border="5">
                <thead>
                    <tr>
                        <th>Nama</th>
                        <th>Nilai</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>ID
                        <td>{{ $array_Nama["ID"] }}</td>
                    </tr>

                    <tr>
                        <td>Produk
                        <td>{{ $array_Nama["Produk"] }}</td>
                    </tr>

                    <tr>
                        <td>Kebersihan
                        <td>{{ $array_Nama["Kebersihan"] }}</td>
                    </tr>

                    <tr>
                        <td>Harga
                        <td>{{ $array_Nama["Harga"] }}</td>
                    </tr>
                    <tr>
                        <td>Rekomendasi
                        <td>{{ $array_Nama["Rekomendasi"] }}</td>
                    </tr>
                </tbody>
            </table>

            Multidimensional Array
            <table class="table" border="5">
                <thead>
                    <tr>
                        <th>Array 1</th>
                        <th>Array 2</th>
                        <th>Array 3</th>
                        <th>Array 4</th>
                        <th>Array 5</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($Array_Multidimensional as $data_array_multidimensional)
                    <tr>
                        <td>{{ $data_array_multidimensional[0] }}</td>
                        <td>{{ $data_array_multidimensional[1] }}</td>
                        <td>{{ $data_array_multidimensional[2] }}</td>
                        <td>{{ $data_array_multidimensional[3] }}</td>
                        <td>{{ $data_array_multidimensional[4] }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

            Multidimensional Array Pake Nama
            <table class="table" border="5">
                <thead>
                    <tr>
                        <th>Array 1</th>
                        <th>Array 2</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($Array_Multidimensional_Nama as $data_array_multidimensional_nama)
                    <tr>
                        <td>{{ $data_array_multidimensional_nama["ID"] }}</td>
                        <td>{{ $data_array_multidimensional_nama["Nama"] }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

            Max Array
            <?php echo($Max_array); ?>
</section>


@endsection
