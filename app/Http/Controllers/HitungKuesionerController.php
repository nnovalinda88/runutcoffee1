<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\HitungKuesioner;
use App\Models\Kuesioner;
use Illuminate\Support\Facades\Validator;

class HitungKuesionerController extends Controller
{
    public function index()
    {
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




        return view('hitungkuesioner.hitung', $data);
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

