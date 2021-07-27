<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;

class Kuesioner extends Model
{
    protected $table = 'data_kuesioner';
    protected $primaryKey = 'id';
    protected $fillable = [
        'tanggal',
         'id',
          'jeniskelamin',
           'Pelayanan',
            'Produk',
            'Kebersihan',
            'Harga',
            'Rekomendasi',
            'created_at',
             'updated_at'];

             public function getNextUserID()
             {

              $statement = DB::select("show table status like 'kuesioner'");

              return response()->json(['id' => $statement[0]->Auto_increment]);
             }

            }

