@extends('layout.v_template')
@section('title','Tambah Produk')

@section('content')

<div class="container">
    <a href="/produk" class="btn btn-md btn-primary"><i class="far fa-arrow-alt-circle-left"></i> Kembali</a>
    <div class="row pt-2 pb-2">
        <div class="col-12">
            <div class="card card-gray">
                <div class="card-header">
                    <h3 class="card-title">Isi Informasi Produk Lengkap</h3>
                </div>
                <form action="/produk/insert" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="form-group pb-2">
                            <div class="row">
                                <div class="col-4">
                                    <label for="exampleInputEmail1">Nama Produk</label>
                                    <input type="text" name="nama_produk" class="form-control" placeholder="83607 Signature Rowan Satchel Khaki" required>
                                </div>

                                <div class="col-2">
                                    <label>Kode produk:</label>
                                    <input type="text" class="form-control" name="kode_produk" placeholder="MKT5245" required>
                                </div>

                                <div class="col-3">
                                    <label for="exampleInputEmail1">Brand</label>
                                    <select class="form-control select2" name="id_brand" style="width: 100%;">
                                        @foreach($brand as $b)
                                        <option value="{{$b->id_brand}}">{{$b->nama_brand}}</option>
                                        @endforeach
                                    </select>
                                    <span style="font-size: small;">Tidak ada pilihan Brand? <br> <a href="/brand/add">Tambah Brand [+]</a></span>
                                </div>

                                <div class="col-3">
                                    <label for="exampleInputEmail1">Kategori</label>
                                    <select class="form-control select2" name="id_kategori" style="width: 100%;">
                                        @foreach($kategori as $k)
                                        <option value="{{$k->id_kategori}}">{{$k->nama_kategori}}</option>
                                        @endforeach
                                    </select>
                                    <span style="font-size: small;">Tidak ada pilihan Kategori? <br> <a href="/kategori/add">Tambah Kategori [+]</a></span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group pt-4">
                            <div class="row">
                                <div class="col-2">
                                    <label>Stok:</label>
                                    <input type="number" class="form-control" name="stok_produk" value="1" required>
                                </div>
                                <div class="col-3">
                                    <label>Masuk tgl:</label>
                                    <input type="date" class="form-control" id="birthday" name="tglmasuk_produk" value="<?php echo date("Y-m-d"); ?>">
                                </div>
                                <div class="col-2">
                                    <label>Harga: <small style="color: green;">jangan pakai titik</small></label>
                                    <input type="number" class="form-control" name="harga_produk" placeholder="1.000.000" required>
                                </div>
                                <div class="col-3">
                                    <label for="exampleInputFile">Upload Gambar:</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" name="foto_produk" id="exampleInputFile" required>
                                            <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-2">
                                    <label>Lokasi Produk:</label>
                                    <select name="lokasi_produk" class="form-control">
                                        <option value="BUENA">BUENA</option>
                                        <option value="STOKIS">STOKIS</option>
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
                                            <input type="text" name="variasi_produk" class="form-control" placeholder="Harga Supplier 2">
                                        </div>
                                        <div class="col-10">
                                            <label>Kode produk:</label>
                                            <input type="text" class="form-control" name="kodeproduk_variasi" placeholder="MKT5245">
                                        </div>
                                        <div class="col-2">
                                            <label>Stok:</label>
                                            <input type="number" class="form-control" name="variasi_stok_produk" value="0">
                                        </div>
                                        <div class="col-5">
                                            <label>Masuk tgl:</label>
                                            <input type="date" class="form-control" id="birthday" name="tglmasuk_variasi_produk" value="<?php echo date("Y-m-d"); ?>">
                                        </div>
                                        <div class="col-7">
                                            <label>Harga: <small style="color: green;">jangan pakai titik</small></label>
                                            <input type="number" class="form-control" name="variasi_harga" placeholder="1.000.000">
                                        </div>
                                    </div>
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                        </div>
                        <small>kosongkan Jika tidak ada</small>
                        <div class="form-group pt-4">
                            <label for="exampleInputFile">Deskripsi Produk :</label>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card card-outline card-info">
                                        <div class="card-body">
                                            <textarea id="summernote" name="deskripsi_produk"> tambahkan <em>deskripsi</em> <strong>produk</strong>
                                            </textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-block btn-flat btn-success">[+] Tambah</button>
                    </div>
                </form>
            </div>
            <!-- /.card -->

        </div>
    </div>
</div>
@endsection