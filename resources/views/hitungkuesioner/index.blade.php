
@extends('layouts.master')

@section('content')

<section class="content">

    <h2> Hitung Data Kuesioner</h2>
    
    <div class="container">
            <h2 class="tittle">Data Soal Kuisioner</h2>                   
            <form action=" {{ url('hitungkuesioner/hitung') }}" method="POST">
                <div class="box-botton">

                <!-- /.content -->
                <div class="box-body">
                 <div id="hitungkuesioner">

                    @csrf
                    

                    <div class="text-center">
                        <input type="submit"
                            class="btn btn-primary mb1 black bg-yellow" value="Proses"/>
                        <a href="#" class="btn btn-primary mb1 bg-red">Batal</a>
                    </div>
                
                </div>
            </form> 
          

           
            
          </section>
@endsection


