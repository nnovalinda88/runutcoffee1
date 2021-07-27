<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableKuesioner extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kuesioner', function (Blueprint $table) {
            $table->date(tanggal);
            $table->int(id_kuesioner);
            $table->char(jeniskelamin)->nullable();
            $table->char(Pelayanan)->nullable();
            $table->char(Produk)->nullable();
            $table->char(Kebersihan)->nullable();
            $table->char(Harga)->nullable();
            $table->timestamps();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kuesioner');
    }
}
