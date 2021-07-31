@extends('layouts.master')

@section('content')
<section class="content">

    <h2>Tambah Kuesioner</h2>

    <form action="<?php echo "/kuesioner/update/".$kuesioner->id; ?>" method="POST">
        @csrf
        {{ Form::hidden('id_kuesioner', '$kuesioner->id_kuesioner') }}
        
        <div class="form-group">
            <label>Jenis Kelamin</label>
            <select class="form-control select2" style="width: 100%;" name="jeniskelamin">
                <?php
                if($kuesioner->jeniskelamin == "Perempuan"){
            ?>
                <option value="2" selected>Perempuan</option>
                <option value="1">Laki-Laki</option>
                <?php
                }
                else
                {
                ?>
                <option value="2">Perempuan</option>
                <option value="1" selected>Laki-Laki</option>
                <?php
                    }
                ?>
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
                        <input type="radio" name="Pelayanan" class="form-check-input"
                            value="<?php echo $item->id_variable; ?>"
                            <?php if($kuesioner->Pelayanan == $item->id_variable){ echo "checked"; } ?>>
                        <?php echo $item->nama_variable; ?>
                    </label>
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
                        <input type="radio" name="Produk" class="form-check-input"
                            value="<?php echo $item->id_variable; ?>"
                            <?php if($kuesioner->Produk == $item->id_variable){ echo "checked"; } ?>>
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
                        <input type="radio" name="Kebersihan" class="form-check-input"
                            value="<?php echo $item->id_variable; ?>"
                            <?php if($kuesioner->Kebersihan == $item->id_variable){ echo "checked"; } ?>>
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
                        <input type="radio" name="Harga" class="form-check-input"
                            value="<?php echo $item->id_variable; ?>"
                            <?php if($kuesioner->Harga == $item->id_variable){ echo "checked"; } ?>>
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

                    <?php
                    if($kuesioner->Rekomendasi == "Ya"){
                ?>
                <div class="form-check">
                    <div class="form-label"></div>
                    <label>
                        <div class="label-check"></div>
                        <input type="radio" name="Rekomendasi" class="form-check-input"
                            value="Ya" checked> Ya
                    </label>
                </div>
                <div class="form-check">
                    <div class="form-label"></div>
                    <label>
                        <div class="label-check"></div>
                        <input type="radio" name="Rekomendasi" class="form-check-input"
                            value="Tidak"> Tidak
                    </label>
                </div>
                <?php
                    }
                    else
                    {
                        ?>


<div class="form-check">
                    <div class="form-label"></div>
                    <label>
                        <div class="label-check"></div>
                        <input type="radio" name="Rekomendasi" class="form-check-input"
                            value="Ya"> Ya
                    </label>
                </div>
                <div class="form-check">
                    <div class="form-label"></div>
                    <label>
                        <div class="label-check"></div>
                        <input type="radio" name="Rekomendasi" class="form-check-input"
                            value="Tidak" checked> Tidak
                    </label>
                </div>

                        <?php
                    }
                            ?>

                @error('Rekomendasi')
                <span class="text-danger">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
                <hr style="height:1px; width:150%; border-width:0; color:black; background-color:gray">
                </hr>
            </div>


        </div>

        <button type="button" class="btn btn-outline-light" data-dismiss="modal">Close</button>
        <input type="submit" id="submit" class="btn btn-outline-light"></input>

    </form>

</section>
@endsection

<!-- /.content -->
