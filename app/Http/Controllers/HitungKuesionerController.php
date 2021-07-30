<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\HitungKuesioner;
use App\Models\Kuesioner;
use Illuminate\Support\Facades\Validator;
use App\Models\HasilGain;
use DB;

class HitungKuesionerController extends Controller
{
    public function index()
    {
        HasilGain::query()->truncate();

        $arr = [];
        $tot = DB::select('select count(rekomendasi) as sum_nilai, (SELECT count(rekomendasi) FROM data_kuesioner where rekomendasi = 1) as sum_ya, (SELECT count(rekomendasi) FROM data_kuesioner where rekomendasi = 0) as sum_tidak from data_kuesioner');
        foreach ($tot as $v) {
            $entrophy_total = (-$v->sum_ya/$v->sum_nilai)*log($v->sum_ya/$v->sum_nilai)+(-$v->sum_tidak/$v->sum_nilai)*log($v->sum_tidak/$v->sum_nilai);
            $arr['total'] = $v;
            $arr['entrophy_total'] = $entrophy_total;
        }

        $pelayanan = DB::select('select 
            (SELECT count(Pelayanan) FROM data_kuesioner where Pelayanan = 1) as sum_nilai_pelayanan1, 
            (SELECT count(Pelayanan) FROM data_kuesioner where Pelayanan = 1 and rekomendasi = 1) as sum_ya_pelayanan1, 
            (SELECT count(Pelayanan) FROM data_kuesioner where Pelayanan = 1 and rekomendasi = 0) as sum_tidak_pelayanan1,

            (SELECT count(Pelayanan) FROM data_kuesioner where Pelayanan = 2) as sum_nilai_pelayanan2, 
            (SELECT count(Pelayanan) FROM data_kuesioner where Pelayanan = 2 and rekomendasi = 1) as sum_ya_pelayanan2, 
            (SELECT count(Pelayanan) FROM data_kuesioner where Pelayanan = 2 and rekomendasi = 0) as sum_tidak_pelayanan2, 

            (SELECT count(Pelayanan) FROM data_kuesioner where Pelayanan = 3) as sum_nilai_pelayanan3, 
            (SELECT count(Pelayanan) FROM data_kuesioner where Pelayanan = 3 and rekomendasi = 1) as sum_ya_pelayanan3, 
            (SELECT count(Pelayanan) FROM data_kuesioner where Pelayanan = 3 and rekomendasi = 0) as sum_tidak_pelayanan3, 

            (SELECT count(Pelayanan) FROM data_kuesioner where Pelayanan = 4) as sum_nilai_pelayanan4, 
            (SELECT count(Pelayanan) FROM data_kuesioner where Pelayanan = 4 and rekomendasi = 1) as sum_ya_pelayanan4, 
            (SELECT count(Pelayanan) FROM data_kuesioner where Pelayanan = 4 and rekomendasi = 0) as sum_tidak_pelayanan4, 

            (SELECT count(Pelayanan) FROM data_kuesioner where Pelayanan = 5) as sum_nilai_pelayanan5,
            (SELECT count(Pelayanan) FROM data_kuesioner where Pelayanan = 5 and rekomendasi = 1) as sum_ya_pelayanan5, 
            (SELECT count(Pelayanan) FROM data_kuesioner where Pelayanan = 5 and rekomendasi = 0) as sum_tidak_pelayanan5
            from data_kuesioner');
        foreach ($pelayanan as $v) {
            $entrophy_pelayanan1 = (-$v->sum_ya_pelayanan1/$v->sum_nilai_pelayanan1)*log($v->sum_ya_pelayanan1/$v->sum_nilai_pelayanan1)+(-$v->sum_tidak_pelayanan1/$v->sum_nilai_pelayanan1)*log($v->sum_tidak_pelayanan1/$v->sum_nilai_pelayanan1);

            $entrophy_pelayanan2 = (-$v->sum_ya_pelayanan2/$v->sum_nilai_pelayanan2)*log($v->sum_ya_pelayanan2/$v->sum_nilai_pelayanan2)+(-$v->sum_tidak_pelayanan2/$v->sum_nilai_pelayanan2)*log($v->sum_tidak_pelayanan2/$v->sum_nilai_pelayanan2);

            $entrophy_pelayanan3 = (-$v->sum_ya_pelayanan3/$v->sum_nilai_pelayanan3)*log($v->sum_ya_pelayanan3/$v->sum_nilai_pelayanan3)+(-$v->sum_tidak_pelayanan3/$v->sum_nilai_pelayanan3)*log($v->sum_tidak_pelayanan3/$v->sum_nilai_pelayanan3);

            $entrophy_pelayanan4 = (-$v->sum_ya_pelayanan4/$v->sum_nilai_pelayanan4)*log($v->sum_ya_pelayanan4/$v->sum_nilai_pelayanan4)+(-$v->sum_tidak_pelayanan4/$v->sum_nilai_pelayanan4)*log($v->sum_tidak_pelayanan4/$v->sum_nilai_pelayanan4);

            $entrophy_pelayanan5 = (-$v->sum_ya_pelayanan5/$v->sum_nilai_pelayanan5)*log($v->sum_ya_pelayanan5/$v->sum_nilai_pelayanan5)+(-$v->sum_tidak_pelayanan5/$v->sum_nilai_pelayanan5)*log($v->sum_tidak_pelayanan5/$v->sum_nilai_pelayanan5);

            (is_nan($entrophy_pelayanan1)) ? $entrophy_pelayanan1 = 0 : $entrophy_pelayanan1 = $entrophy_pelayanan1;
            (is_nan($entrophy_pelayanan2)) ? $entrophy_pelayanan2 = 0 : $entrophy_pelayanan2 = $entrophy_pelayanan2;
            (is_nan($entrophy_pelayanan3)) ? $entrophy_pelayanan3 = 0 : $entrophy_pelayanan3 = $entrophy_pelayanan3;
            (is_nan($entrophy_pelayanan4)) ? $entrophy_pelayanan4 = 0 : $entrophy_pelayanan4 = $entrophy_pelayanan4;
            (is_nan($entrophy_pelayanan5)) ? $entrophy_pelayanan5 = 0 : $entrophy_pelayanan5 = $entrophy_pelayanan5;

            $gain_pelayanan = ($arr['entrophy_total'])-(($v->sum_nilai_pelayanan1/$arr['total']->sum_nilai)*$entrophy_pelayanan1)-(($v->sum_nilai_pelayanan2/$arr['total']->sum_nilai)*$entrophy_pelayanan2)-(($v->sum_nilai_pelayanan3/$arr['total']->sum_nilai)*$entrophy_pelayanan3)-(($v->sum_nilai_pelayanan4/$arr['total']->sum_nilai)*$entrophy_pelayanan4)-(($v->sum_nilai_pelayanan5/$arr['total']->sum_nilai)*$entrophy_pelayanan5);

            $arr['pelayanan'] = $v;
            $arr['entrophy_pelayanan1'] = $entrophy_pelayanan1;
            $arr['entrophy_pelayanan2'] = $entrophy_pelayanan2;
            $arr['entrophy_pelayanan3'] = $entrophy_pelayanan3;
            $arr['entrophy_pelayanan4'] = $entrophy_pelayanan4;
            $arr['entrophy_pelayanan5'] = $entrophy_pelayanan5;
            $arr['gain_pelayanan'] = $gain_pelayanan;
        }
        HasilGain::create(['variable' => "Pelayanan", 'gain' => $gain_pelayanan]);

        $produk = DB::select('select 
            (SELECT count(Produk) FROM data_kuesioner where Produk = 1) as sum_nilai_produk1, 
            (SELECT count(Produk) FROM data_kuesioner where Produk = 1 and rekomendasi = 1) as sum_ya_produk1, 
            (SELECT count(Produk) FROM data_kuesioner where Produk = 1 and rekomendasi = 0) as sum_tidak_produk1,

            (SELECT count(Produk) FROM data_kuesioner where Produk = 2) as sum_nilai_produk2, 
            (SELECT count(Produk) FROM data_kuesioner where Produk = 2 and rekomendasi = 1) as sum_ya_produk2, 
            (SELECT count(Produk) FROM data_kuesioner where Produk = 2 and rekomendasi = 0) as sum_tidak_produk2, 

            (SELECT count(Produk) FROM data_kuesioner where Produk = 3) as sum_nilai_produk3, 
            (SELECT count(Produk) FROM data_kuesioner where Produk = 3 and rekomendasi = 1) as sum_ya_produk3, 
            (SELECT count(Produk) FROM data_kuesioner where Produk = 3 and rekomendasi = 0) as sum_tidak_produk3, 

            (SELECT count(Produk) FROM data_kuesioner where Produk = 4) as sum_nilai_produk4, 
            (SELECT count(Produk) FROM data_kuesioner where Produk = 4 and rekomendasi = 1) as sum_ya_produk4, 
            (SELECT count(Produk) FROM data_kuesioner where Produk = 4 and rekomendasi = 0) as sum_tidak_produk4, 

            (SELECT count(Produk) FROM data_kuesioner where Produk = 5) as sum_nilai_produk5,
            (SELECT count(Produk) FROM data_kuesioner where Produk = 5 and rekomendasi = 1) as sum_ya_produk5, 
            (SELECT count(Produk) FROM data_kuesioner where Produk = 5 and rekomendasi = 0) as sum_tidak_produk5
            from data_kuesioner');
        foreach ($produk as $v) {
            $entrophy_produk1 = (-$v->sum_ya_produk1/$v->sum_nilai_produk1)*log($v->sum_ya_produk1/$v->sum_nilai_produk1)+(-$v->sum_tidak_produk1/$v->sum_nilai_produk1)*log($v->sum_tidak_produk1/$v->sum_nilai_produk1);

            $entrophy_produk2 = (-$v->sum_ya_produk2/$v->sum_nilai_produk2)*log($v->sum_ya_produk2/$v->sum_nilai_produk2)+(-$v->sum_tidak_produk2/$v->sum_nilai_produk2)*log($v->sum_tidak_produk2/$v->sum_nilai_produk2);

            $entrophy_produk3 = (-$v->sum_ya_produk3/$v->sum_nilai_produk3)*log($v->sum_ya_produk3/$v->sum_nilai_produk3)+(-$v->sum_tidak_produk3/$v->sum_nilai_produk3)*log($v->sum_tidak_produk3/$v->sum_nilai_produk3);

            $entrophy_produk4 = (-$v->sum_ya_produk4/$v->sum_nilai_produk4)*log($v->sum_ya_produk4/$v->sum_nilai_produk4)+(-$v->sum_tidak_produk4/$v->sum_nilai_produk4)*log($v->sum_tidak_produk4/$v->sum_nilai_produk4);

            $entrophy_produk5 = (-$v->sum_ya_produk5/$v->sum_nilai_produk5)*log($v->sum_ya_produk5/$v->sum_nilai_produk5)+(-$v->sum_tidak_produk5/$v->sum_nilai_produk5)*log($v->sum_tidak_produk5/$v->sum_nilai_produk5);

            (is_nan($entrophy_produk1)) ? $entrophy_produk1 = 0 : $entrophy_produk1 = $entrophy_produk1;
            (is_nan($entrophy_produk2)) ? $entrophy_produk2 = 0 : $entrophy_produk2 = $entrophy_produk2;
            (is_nan($entrophy_produk3)) ? $entrophy_produk3 = 0 : $entrophy_produk3 = $entrophy_produk3;
            (is_nan($entrophy_produk4)) ? $entrophy_produk4 = 0 : $entrophy_produk4 = $entrophy_produk4;
            (is_nan($entrophy_produk5)) ? $entrophy_produk5 = 0 : $entrophy_produk5 = $entrophy_produk5;

            $gain_produk = ($arr['entrophy_total'])-(($v->sum_nilai_produk1/$arr['total']->sum_nilai)*$entrophy_produk1)-(($v->sum_nilai_produk2/$arr['total']->sum_nilai)*$entrophy_produk2)-(($v->sum_nilai_produk3/$arr['total']->sum_nilai)*$entrophy_produk3)-(($v->sum_nilai_produk4/$arr['total']->sum_nilai)*$entrophy_produk4)-(($v->sum_nilai_produk5/$arr['total']->sum_nilai)*$entrophy_produk5);

            $arr['produk'] = $v;
            $arr['entrophy_produk1'] = $entrophy_produk1;
            $arr['entrophy_produk2'] = $entrophy_produk2;
            $arr['entrophy_produk3'] = $entrophy_produk3;
            $arr['entrophy_produk4'] = $entrophy_produk4;
            $arr['entrophy_produk5'] = $entrophy_produk5;
            $arr['gain_produk'] = $gain_produk;
        }
        HasilGain::create(['variable' => "Produk", 'gain' => $gain_produk]);

        $kebersihan = DB::select('select 
            (SELECT count(Kebersihan) FROM data_kuesioner where Kebersihan = 1) as sum_nilai_kebersihan1, 
            (SELECT count(Kebersihan) FROM data_kuesioner where Kebersihan = 1 and rekomendasi = 1) as sum_ya_kebersihan1, 
            (SELECT count(Kebersihan) FROM data_kuesioner where Kebersihan = 1 and rekomendasi = 0) as sum_tidak_kebersihan1,

            (SELECT count(Kebersihan) FROM data_kuesioner where Kebersihan = 2) as sum_nilai_kebersihan2, 
            (SELECT count(Kebersihan) FROM data_kuesioner where Kebersihan = 2 and rekomendasi = 1) as sum_ya_kebersihan2, 
            (SELECT count(Kebersihan) FROM data_kuesioner where Kebersihan = 2 and rekomendasi = 0) as sum_tidak_kebersihan2, 

            (SELECT count(Kebersihan) FROM data_kuesioner where Kebersihan = 3) as sum_nilai_kebersihan3, 
            (SELECT count(Kebersihan) FROM data_kuesioner where Kebersihan = 3 and rekomendasi = 1) as sum_ya_kebersihan3, 
            (SELECT count(Kebersihan) FROM data_kuesioner where Kebersihan = 3 and rekomendasi = 0) as sum_tidak_kebersihan3, 

            (SELECT count(Kebersihan) FROM data_kuesioner where Kebersihan = 4) as sum_nilai_kebersihan4, 
            (SELECT count(Kebersihan) FROM data_kuesioner where Kebersihan = 4 and rekomendasi = 1) as sum_ya_kebersihan4, 
            (SELECT count(Kebersihan) FROM data_kuesioner where Kebersihan = 4 and rekomendasi = 0) as sum_tidak_kebersihan4, 

            (SELECT count(Kebersihan) FROM data_kuesioner where Kebersihan = 5) as sum_nilai_kebersihan5,
            (SELECT count(Kebersihan) FROM data_kuesioner where Kebersihan = 5 and rekomendasi = 1) as sum_ya_kebersihan5, 
            (SELECT count(Kebersihan) FROM data_kuesioner where Kebersihan = 5 and rekomendasi = 0) as sum_tidak_kebersihan5
            from data_kuesioner');
        foreach ($kebersihan as $v) {
            $entrophy_kebersihan1 = (-$v->sum_ya_kebersihan1/$v->sum_nilai_kebersihan1)*log($v->sum_ya_kebersihan1/$v->sum_nilai_kebersihan1)+(-$v->sum_tidak_kebersihan1/$v->sum_nilai_kebersihan1)*log($v->sum_tidak_kebersihan1/$v->sum_nilai_kebersihan1);

            $entrophy_kebersihan2 = (-$v->sum_ya_kebersihan2/$v->sum_nilai_kebersihan2)*log($v->sum_ya_kebersihan2/$v->sum_nilai_kebersihan2)+(-$v->sum_tidak_kebersihan2/$v->sum_nilai_kebersihan2)*log($v->sum_tidak_kebersihan2/$v->sum_nilai_kebersihan2);

            $entrophy_kebersihan3 = (-$v->sum_ya_kebersihan3/$v->sum_nilai_kebersihan3)*log($v->sum_ya_kebersihan3/$v->sum_nilai_kebersihan3)+(-$v->sum_tidak_kebersihan3/$v->sum_nilai_kebersihan3)*log($v->sum_tidak_kebersihan3/$v->sum_nilai_kebersihan3);

            $entrophy_kebersihan4 = (-$v->sum_ya_kebersihan4/$v->sum_nilai_kebersihan4)*log($v->sum_ya_kebersihan4/$v->sum_nilai_kebersihan4)+(-$v->sum_tidak_kebersihan4/$v->sum_nilai_kebersihan4)*log($v->sum_tidak_kebersihan4/$v->sum_nilai_kebersihan4);

            $entrophy_kebersihan5 = (-$v->sum_ya_kebersihan5/$v->sum_nilai_kebersihan5)*log($v->sum_ya_kebersihan5/$v->sum_nilai_kebersihan5)+(-$v->sum_tidak_kebersihan5/$v->sum_nilai_kebersihan5)*log($v->sum_tidak_kebersihan5/$v->sum_nilai_kebersihan5);

            (is_nan($entrophy_kebersihan1)) ? $entrophy_kebersihan1 = 0 : $entrophy_kebersihan1 = $entrophy_kebersihan1;
            (is_nan($entrophy_kebersihan2)) ? $entrophy_kebersihan2 = 0 : $entrophy_kebersihan2 = $entrophy_kebersihan2;
            (is_nan($entrophy_kebersihan3)) ? $entrophy_kebersihan3 = 0 : $entrophy_kebersihan3 = $entrophy_kebersihan3;
            (is_nan($entrophy_kebersihan4)) ? $entrophy_kebersihan4 = 0 : $entrophy_kebersihan4 = $entrophy_kebersihan4;
            (is_nan($entrophy_kebersihan5)) ? $entrophy_kebersihan5 = 0 : $entrophy_kebersihan5 = $entrophy_kebersihan5;

            $gain_kebersihan = ($arr['entrophy_total'])-(($v->sum_nilai_kebersihan1/$arr['total']->sum_nilai)*$entrophy_kebersihan1)-(($v->sum_nilai_kebersihan2/$arr['total']->sum_nilai)*$entrophy_kebersihan2)-(($v->sum_nilai_kebersihan3/$arr['total']->sum_nilai)*$entrophy_kebersihan3)-(($v->sum_nilai_kebersihan4/$arr['total']->sum_nilai)*$entrophy_kebersihan4)-(($v->sum_nilai_kebersihan5/$arr['total']->sum_nilai)*$entrophy_kebersihan5);

            $arr['kebersihan'] = $v;
            $arr['entrophy_kebersihan1'] = $entrophy_kebersihan1;
            $arr['entrophy_kebersihan2'] = $entrophy_kebersihan2;
            $arr['entrophy_kebersihan3'] = $entrophy_kebersihan3;
            $arr['entrophy_kebersihan4'] = $entrophy_kebersihan4;
            $arr['entrophy_kebersihan5'] = $entrophy_kebersihan5;
            $arr['gain_kebersihan'] = $gain_kebersihan;
        }
        HasilGain::create(['variable' => "Kebersihan", 'gain' => $gain_kebersihan]);

        $harga = DB::select('select 
            (SELECT count(Harga) FROM data_kuesioner where Harga = 1) as sum_nilai_harga1, 
            (SELECT count(Harga) FROM data_kuesioner where Harga = 1 and rekomendasi = 1) as sum_ya_harga1, 
            (SELECT count(Harga) FROM data_kuesioner where Harga = 1 and rekomendasi = 0) as sum_tidak_harga1,

            (SELECT count(Harga) FROM data_kuesioner where Harga = 2) as sum_nilai_harga2, 
            (SELECT count(Harga) FROM data_kuesioner where Harga = 2 and rekomendasi = 1) as sum_ya_harga2, 
            (SELECT count(Harga) FROM data_kuesioner where Harga = 2 and rekomendasi = 0) as sum_tidak_harga2, 

            (SELECT count(Harga) FROM data_kuesioner where Harga = 3) as sum_nilai_harga3, 
            (SELECT count(Harga) FROM data_kuesioner where Harga = 3 and rekomendasi = 1) as sum_ya_harga3, 
            (SELECT count(Harga) FROM data_kuesioner where Harga = 3 and rekomendasi = 0) as sum_tidak_harga3, 

            (SELECT count(Harga) FROM data_kuesioner where Harga = 4) as sum_nilai_harga4, 
            (SELECT count(Harga) FROM data_kuesioner where Harga = 4 and rekomendasi = 1) as sum_ya_harga4, 
            (SELECT count(Harga) FROM data_kuesioner where Harga = 4 and rekomendasi = 0) as sum_tidak_harga4, 

            (SELECT count(Harga) FROM data_kuesioner where Harga = 5) as sum_nilai_harga5,
            (SELECT count(Harga) FROM data_kuesioner where Harga = 5 and rekomendasi = 1) as sum_ya_harga5, 
            (SELECT count(Harga) FROM data_kuesioner where Harga = 5 and rekomendasi = 0) as sum_tidak_harga5
            from data_kuesioner');
        foreach ($harga as $v) {
            $entrophy_harga1 = (-$v->sum_ya_harga1/$v->sum_nilai_harga1)*log($v->sum_ya_harga1/$v->sum_nilai_harga1)+(-$v->sum_tidak_harga1/$v->sum_nilai_harga1)*log($v->sum_tidak_harga1/$v->sum_nilai_harga1);

            $entrophy_harga2 = (-$v->sum_ya_harga2/$v->sum_nilai_harga2)*log($v->sum_ya_harga2/$v->sum_nilai_harga2)+(-$v->sum_tidak_harga2/$v->sum_nilai_harga2)*log($v->sum_tidak_harga2/$v->sum_nilai_harga2);

            $entrophy_harga3 = (-$v->sum_ya_harga3/$v->sum_nilai_harga3)*log($v->sum_ya_harga3/$v->sum_nilai_harga3)+(-$v->sum_tidak_harga3/$v->sum_nilai_harga3)*log($v->sum_tidak_harga3/$v->sum_nilai_harga3);

            $entrophy_harga4 = (-$v->sum_ya_harga4/$v->sum_nilai_harga4)*log($v->sum_ya_harga4/$v->sum_nilai_harga4)+(-$v->sum_tidak_harga4/$v->sum_nilai_harga4)*log($v->sum_tidak_harga4/$v->sum_nilai_harga4);

            $entrophy_harga5 = (-$v->sum_ya_harga5/$v->sum_nilai_harga5)*log($v->sum_ya_harga5/$v->sum_nilai_harga5)+(-$v->sum_tidak_harga5/$v->sum_nilai_harga5)*log($v->sum_tidak_harga5/$v->sum_nilai_harga5);

            (is_nan($entrophy_harga1)) ? $entrophy_harga1 = 0 : $entrophy_harga1 = $entrophy_harga1;
            (is_nan($entrophy_harga2)) ? $entrophy_harga2 = 0 : $entrophy_harga2 = $entrophy_harga2;
            (is_nan($entrophy_harga3)) ? $entrophy_harga3 = 0 : $entrophy_harga3 = $entrophy_harga3;
            (is_nan($entrophy_harga4)) ? $entrophy_harga4 = 0 : $entrophy_harga4 = $entrophy_harga4;
            (is_nan($entrophy_harga5)) ? $entrophy_harga5 = 0 : $entrophy_harga5 = $entrophy_harga5;

            $gain_harga = ($arr['entrophy_total'])-(($v->sum_nilai_harga1/$arr['total']->sum_nilai)*$entrophy_harga1)-(($v->sum_nilai_harga2/$arr['total']->sum_nilai)*$entrophy_harga2)-(($v->sum_nilai_harga3/$arr['total']->sum_nilai)*$entrophy_harga3)-(($v->sum_nilai_harga4/$arr['total']->sum_nilai)*$entrophy_harga4)-(($v->sum_nilai_harga5/$arr['total']->sum_nilai)*$entrophy_harga5);

            $arr['harga'] = $v;
            $arr['entrophy_harga1'] = $entrophy_harga1;
            $arr['entrophy_harga2'] = $entrophy_harga2;
            $arr['entrophy_harga3'] = $entrophy_harga3;
            $arr['entrophy_harga4'] = $entrophy_harga4;
            $arr['entrophy_harga5'] = $entrophy_harga5;
            $arr['gain_harga'] = $gain_harga;
        }
        HasilGain::create(['variable' => "Harga", 'gain' => $gain_harga]);

        $hasilGain = HasilGain::orderBy('gain', 'DESC')->get();

        //Array Biasa
        $data['pelayanan'] = ["5","5","5","5","5","5"];
        $data['produk'] = ["5","5","5","5","5","5"];
        $data['kebersihan'] = ["5","5","5","5","5","5"];
        $data['harga'] = ["5","5","5","5","5","5"];
        $data['rekomendasi'] = ["1","1","1","1","1","1"];

        //Array Pake Nama
        $data['array_Nama'] = (
            [
            "ID" => "1",
            "Produk" => "5",
            "Kebersihan" => "5",
            "Harga" => "5",
            "Rekomendasi" => "5"
            ]
        );


        //Array Multidimensional
        $data['Array_Multidimensional'] = array (
            array("1",5,5,5,5),
            array("2",5,5,5,5),
            array("3",5,5,5,5),
            array("4",5,5,5,5)
        );

        //Array Multidimensional Pake Nama
        $data['Array_Multidimensional_Nama'] = array (
            array(
                "ID" => "1",
                "Nama" => "Nama 1",
            ),
            array(
                "ID" => "2",
                "Nama" => "Nama 2",
            ),
            array(
                "ID" => "3",
                "Nama" => "Nama 3",
            )
        );

        //Max Dari Array
        $data['Max_array'] = Max($data['pelayanan']);



        // dd($arr);die();
        return view('hitungkuesioner.hitung', $data)->with(['arr' => $arr, 'hasilGain' => $hasilGain]);
    }


    public function klasifikasi()
    {
        $command = escapeshellcmd('klasifikasi.py');
        $result = shell_exec("python " . app_path(). "\http\controllers\algoritma\klasifikasi.py " );
        echo($result);
    }





  //  public function hitung(Request $request) {
    //    $data_all_kuesioner = kuesioner::all();
      //  $total_kuesioner_ya = 0;
        //$total_kuesioner_tidak = 0;
        //$total_kuesioner = 0;
        //foreach($data_all_kuesioner as $items)
        //{
          //  if($items->Rekomendasi == "Ya")
            //{
              //  $total_kuesioner_ya += 1;
                //$total_kuesioner += 1;
            //}
            //else
            //{
              //  $total_kuesioner_tidak += 1;
                //$total_kuesioner += 1;
            //}
        //}
        //$data_total = ["total" => $total_kuesioner, "ya" => $total_kuesioner_ya, "tidak" => $total_kuesioner_tidak];




       //$hitungkuesioner_list = hitungkuesioner::orderBy('id_hitung', 'asc')->simplePaginate(5);
        //return view('hitungkuesioner.hitung', $data);
    //}
//}
            }

