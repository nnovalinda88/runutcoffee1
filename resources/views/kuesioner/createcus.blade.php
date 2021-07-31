@extends('layouts.cusmas')

@section('content')
<section class="content">
    <h2>Tambah Kuesioner</h2>

    <form action="/kuesioner/store" method="POST">
        @csrf
        <div class="form-group">
            <label>Jenis Kelamin</label>
            <select class="form-control select2" style="width: 100%;" name="jeniskelamin">
                <option value="2">Perempuan</option>
                <option value="1">Laki-Laki</option>
            </select>
                @error('jeniskelamin')
                <span class="text-danger">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
        </div>


        <div class="form-group">
            <div class="col-md-12">
                <label> Apakah anda merasa puas dengan pelayanan kedai kami? </label>

                <?php
                    foreach($variable as $item){
                ?>
                <div class="form-check">
                    <div class="form-label"></div>
                    <label>
                        <div class="label-check"></div>
                        <input type="radio" name="Pelayanan" class="form-check-input" value="<?php echo $item->id_variable; ?>">
                        <?php echo $item->nama_variable; ?>
                    </label>
                </div>
                    </div>
                
                <?php
                    }
                ?>

                @error('Pelayanan')
                <span class="text-danger">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
                <hr style="height:1px; width:150%; border-width:0; color:black; background-color:gray">
                </hr>
            </div>
        </div>

        <div class="form-group">
            <div class="col-md-12">
                <label> Apakah anda merasa puas dengan menu kopi kedai kami?</label>

                <?php
                    foreach($variable as $item){
                ?>
                <div class="form-check">
                    <div class="form-label"></div>
                    <label>
                        <div class="label-check"></div>
                        <input type="radio" name="Produk" class="form-check-input" value="<?php echo $item->id_variable; ?>">
                        <?php echo $item->nama_variable; ?>
                    </label>
                </div>
                <?php
                    }
                ?>

                @error('Produk')
                <span class="text-danger">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
                <hr style="height:1px; width:150%; border-width:0; color:black; background-color:gray">
                </hr>
            </div>
        </div>

        <div class="form-group">
            <div class="col-md-12">
                <label> Apakah anda merasa puas dengan kebersihan kedai kami?</label>

                <?php
                    foreach($variable as $item){
                ?>
                <div class="form-check">
                    <div class="form-label"></div>
                    <label>
                        <div class="label-check"></div>
                        <input type="radio" name="Kebersihan" class="form-check-input" value="<?php echo $item->id_variable; ?>">
                        <?php echo $item->nama_variable; ?>
                    </label>
                </div>
                <?php
                    }
                ?>

                @error('Kebersihan')
                <span class="text-danger">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
                <hr style="height:1px; width:150%; border-width:0; color:black; background-color:gray">
                </hr>
            </div>
        </div>


        <div class="form-group">
            <div class="col-md-12">
                <label> Apakah anda merasa puas dengan harga pada menu kedai
                    kami?</label>

                <?php
                    foreach($variable as $item){
                ?>
                <div class="form-check">
                    <div class="form-label"></div>
                    <label>
                        <div class="label-check"></div>
                        <input type="radio" name="Harga" class="form-check-input" value="<?php echo $item->id_variable; ?>">
                        <?php echo $item->nama_variable; ?>
                    </label>
                </div>
                <?php
                    }
                ?>

                @error('Harga')
                <span class="text-danger">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
                <hr style="height:1px; width:150%; border-width:0; color:black; background-color:gray">
                </hr>
            </div>

        </div>


        <div class="form-group">
            <div class="col-md-12">
                <label> Secara keseluruhan, apakah anda puas telah menjadi konsumen
                    kami?</label>

                <div class="form-check">
                    <div class="form-label"></div>
                    <label>
                        <div class="label-check"></div>
                        <input type="radio" name="Rekomendasi" class="form-check-input"
                            value="1"> Ya
                    </label>
                </div>
                <div class="form-check">
                    <div class="form-label"></div>
                    <label>
                        <div class="label-check"></div>
                        <input type="radio" name="Rekomendasi" class="form-check-input"
                            value="0"> Tidak
                    </label>
                </div>

                @error('Rekomendasi')
                <span class="text-danger">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
                <hr style="height:1px; width:150%; border-width:0; color:black; background-color:gray">
                </hr>
            </div>


        </div>

        <a href="{{ url('main') }}" class="btn btn-outline-light">Close</button> </a>  
        <input type="submit" id="submit" class="btn btn-outline-light"></input>

    </form>
            
</section>
@endsection

<!-- /.content -->
