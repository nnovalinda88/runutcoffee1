<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HasilGain extends Model
{
    use HasFactory;

    protected $table = 'hasil_gain';

    protected $fillable = [
        'variable',
        'gain'
    ];
}
