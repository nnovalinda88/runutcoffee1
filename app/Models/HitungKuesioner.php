<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HitungKuesioner extends Model
{
    protected $table = 'tb_hitungkuesioner';
    protected $fillable = [
         'id_hitung',
          'atribut',
           'variable',
            'jumlah_kasus', 
            'Ya', 
            'Tidak', 
            'Entropy',
             'Gain'];

             

 }

