@extends('layout.v_template')
@section('title','Edit Produk')

@section('content')

<div class="container">
    <a href="/produk" class="btn btn-md btn-primary"><i class="far fa-arrow-alt-circle-left"></i> Kembali</a>
    <div class="row pt-2 pb-2">
        <div class="col-12">
            <div class="card card-gray">
                <div class="card-header">
                    <h3 class="card-title">Isi Informasi Produk Lengkap</h3>
                </div>
                <form action="/produk/update/{{$produk->id_produk}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="form-group pb-2">
                            <div class="row">
                                <div class="col-4">
                                    <label for="exampleInputEmail1">Nama Produk</label>
                                    <input type="text" name="nama_produk" class="form-control" value="{{$produk->nama_produk}}">
                                </div>
                                <div class="col-2">
                                    <label>Kode Produk :</label>
                                    <input type="text" name="kode_produk" class="form-control" value="{{$produk->kode_produk}}">
                                </div>

                                <div class="col-3">
                                    <label for="exampleInputEmail1">Brand</label>
                                    <select class="form-control select2" name="id_brand" style="width: 100%;">
                                        @foreach($brand as $b)
                                        <option value="{{$b->id_brand}}" <?php if ($produk->id_brand == $b->id_brand) {
                                                                                echo 'selected';
                                                                            } ?>>{{$b->nama_brand}}</option>
                                        @endforeach
                                    </select>
                                    <span style="font-size: small;">Tidak ada pilihan Brand? <br> <a href="/brand/add">Tambah Brand [+]</a></span>
                                </div>

                                <div class="col-3">
                                    <label for="exampleInputEmail1">Kategori</label>
                                    <select class="form-control select2" name="id_kategori" style="width: 100%;">
                                        @foreach($kategori as $k)
                                        <option value="{{$k->id_kategori}}" <?php if ($produk->id_kategori == $k->id_kategori) {
                                                                                echo 'selected';
                                                                            } ?>>{{$k->nama_kategori}}</option>
                                        @endforeach
                                    </select>
                                    <span style="font-size: small;">Tidak ada pilihan Kategori? <br> <a href="/kategori/add">Tambah Kategori [+]</a></span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group pt-2">
                            <div class="row">
                                <div class="col-3">
                                    <label for="exampleInputFile">Ganti Gambar: </label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" name="foto_produk" id="exampleInputFile">
                                            <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                        </div>
                                    </div>
                                    <small style="color: green;">Kosongkan jika tidak mengganti produk</small>
                                    <label for="">Gambar Produk :</label>
                                    <div class="col-sm-4">
                                        <img src="{{url('foto_produk/'. $produk->foto_produk)}}" alt="" width="150px">
                                    </div>
                                </div>
                                <div class="col-2">
                                    <label>Stok:</label>
                                    <input type="number" class="form-control" name="stok_produk" value="{{$produk->stok_produk}}">
                                </div>
                                <div class="col-3">
                                    <label>Masuk tgl:</label>
                                    <input type="date" class="form-control" id="birthday" name="tglmasuk_produk" value="{{$produk->tglmasuk_produk}}" readonly>
                                </div>
                                <div class="col-2">
                                    <label>Harga: <small style="color: green;">jangan pakai titik</small></label>
                                    <input type="number" class="form-control" name="harga_produk" value="{{$produk->harga_produk}}">
                                </div>
                                <div class="col-2">
                                    <label for="">Lokasi produk</label>
                                    <select name="lokasi_produk" type="text" class="custom-select form-control" value="{{old('lokasi_produk')}}">
                                        <option value="BUENA" <?php if ($produk->lokasi_produk == "BUENA") echo 'selected="selected"'; ?>>BUENA</option>
                                        <option value="STOKIS" <?php if ($produk->lokasi_produk == "STOKIS") echo 'selected="selected"'; ?>>STOKIS</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="card card-primary collapsed-card">
                                <div class="card-header">
                                    <h3 class="card-title">Variasi Harga Berbeda</h3>

                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-plus"></i>
                                        </button>
                                    </div>
                                    <!-- /.card-tools -->
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-10">
                                            <label for="exampleInputEmail1">Nama Variasi:</label>
                                            <input type="text" name="variasi_produk" class="form-control" placeholder="Harga Suppier 2" value="{{$produk->variasi_produk}}">
                                        </div>
                                        <div class="col-10">
                                            <label for="exampleInputEmail1">Kode Produk:</label>
                                            <input type="text" name="kodeproduk_variasi" class="form-control" placeholder="MKT4535" value="{{$produk->kodeproduk_variasi}}">
                                        </div>
                                        <div class=" col-2">
                                            <label>Stok:</label>
                                            <input type="number" class="form-control" name="variasi_stok_produk" placeholder="1" value="{{$produk->variasi_stok_produk}}">
                                        </div>
                                        <div class="col-5">
                                            <label>Masuk tgl:</label>
                                            <input type="date" class="form-control" id="birthday" name="tglmasuk_variasi_produk" value="{{$produk->tglmasuk_variasi_produk}}">
                                        </div>
                                        <div class="col-7">
                                            <label>Harga: <small style="color: green;">jangan pakai titik</small></label>
                                            <input type="number" class="form-control" name="variasi_harga" placeholder="1.000.000" value="{{$produk->variasi_harga}}">
                                        </div>
                                    </div>
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                        </div>
                        <small>kosongkan Jika tidak ada</small>
                        <div class=" form-group pt-4">
                            <label for="exampleInputFile">Deskripsi Produk :</label>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card card-outline card-info">
                                        <div class="card-body">
                                            <textarea id="summernote" name="deskripsi_produk">{{$produk->deskripsi_produk}}</textarea>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.col-->
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-success btn-block btn-flat"><i class="fa fa-save"></i> Simpan</button>
                    </div>
                </form>
            </div>
            <!-- /.card -->

        </div>
    </div>
</div>
@endsection