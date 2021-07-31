<?php

namespace App\Http\Controllers;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\customer;
use App\Models\Kuesioner;
use App\Models\NilaiKuesioner;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\DB;
#!/usr/bin/env python

class KuesionerController extends Controller
{
    public function index()
    {
        $kuesioner_list = kuesioner::orderBy('id', 'asc')->simplePaginate(5);
         $jumlah_kuesioner = kuesioner::count();
        return view('kuesioner.index', compact('kuesioner_list',  'jumlah_kuesioner'));
    }

    
 
    public function show($id) {

       
        $kuesioner = kuesioner::findOrFail($id);
        return view('kuesioner.show', compact('kuesioner'));
    
    }   

    public function create () {
        $value = NilaiKuesioner::all();
        $data['variable'] = $value;
        return view('kuesioner.create', $data);

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
    'jeniskelamin' => 'required|in:1,2',
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
