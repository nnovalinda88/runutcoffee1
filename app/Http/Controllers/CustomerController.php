<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kuesioner;
use App\Models\NilaiKuesioner;

class CustomerController extends Controller
{
    public function customer()
    {
        $kuesioner_list = kuesioner::orderBy('id', 'asc')->simplePaginate(5);
        $jumlah_kuesioner = kuesioner::count();
       return view('customers.index', compact('kuesioner_list',  'jumlah_kuesioner'));
    }

    
    public function show($id) {

        $kuesioner = DB::select("
        select kuesioner.id as id, kuesioner.tanggal as tanggal, kuesioner.jeniskelamin as jeniskelamin, kuesioner.Rekomendasi as Rekomendasi,
        variable1.nama_variable as Pelayanan, variable2.nama_variable as Produk,  variable3.nama_variable as Kebersihan,  variable4.nama_variable as Harga
        from
        data_kuesioner as kuesioner
        join
        variable as variable1
        on kuesioner.Pelayanan = variable1.id_variable
        join
        variable as variable2
        on kuesioner.Produk = variable2.id_variable
        join
        variable as variable3
        on kuesioner.Kebersihan = variable3.id_variable
        join
        variable as variable4
        on kuesioner.Harga = variable4.id_variable
        where kuesioner.id = '".$id."'
        ");

        return view('kuesioner.show', compact('kuesioner'));
    }   

    public function create () {
        $value = NilaiKuesioner::all();
        $data['variable'] = $value;
        return view('kuesioner.createcus', $data);

    }
 //Delete data kuesioner
 public function destroy($id) {
    $kuesioner = kuesioner::findOrFail($id);
    $kuesioner->delete();
    return redirect('kuesioner');
}


public function store(Request $request) {
    $input = $request->all();

    $validator = Validator::make($input, [
        'jeniskelamin' => 'required|in:1,2',
        'Pelayanan'  =>  'required',
        'Produk'  =>  'required',
        'Kebersihan'  =>  'required',
        'Harga'  =>  'required',
        'Rekomendasi'  =>  'required',
    ]);

    if ($validator->fails()) {
        return redirect('/kuesioner/create')
        ->withInput()
        ->withErrors($validator);
    }
    Kuesioner::create($input);

    return redirect('kuesioner');
}


//update

public function edit($id) {

    $value = NilaiKuesioner::all();
    $data['variable'] = $value;
    $data['kuesioner'] = kuesioner::findOrFail($id);
    return view('kuesioner.edit', $data);
}

public function update($id, Request $request) {

    $kuesioner = Kuesioner::findOrfail($request->id);
    $input = $request->all();
   // $kuesioner->update($request->all());

   $validator = Validator::make($input, [
    'tanggal'  =>  'required|date',
    'jeniskelamin' => 'required|in:Lakilaki,Perempuan',
    'Pelayanan'  =>  'required',
    'Produk'  =>  'required',
    'Kebersihan'  =>  'required',
    'Harga'  =>  'required',
    'Rekomendasi'  =>  'required',
]);
    if ($validator->fails()) {
        return redirect('kuesioner/edit' . $id )->withInput()
        ->withErrors($validator);
    }


    $kuesioner->update($input);
    return redirect('/kuesioner');
}
}