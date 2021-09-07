@extends('layout.v_template')
@section('title','Proses Tambah')


@section('content')
<a href="/laporanmasuk/add" class="btn btn-primary">Kembali</a>
<hr>
<section class="content">
    <div class="container-fluid">
        <div class="card card-default">
            <div class="card-header">
                <h3 class="card-title">Tambahkan jumlah Produk Masuk.</h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                </div>
            </div>
            <form action="/laporanmasuk/insert" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="card card-widget">
                                <!-- informasi produk -->
                                <div class="card-header">
                                    <div class="user-block">
                                        <span class="username"><a href="#">{{$produk->nama_brand}}</a></span>
                                        <span class="description">{{$produk->nama_kategori}}</span>
                                    </div>
                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                            <i class="fas fa-minus"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <img class="img-fluid pad" src="{{url('foto_produk/'. $produk->foto_produk)}}" alt="Photo" width="300" loading="lazy">
                                    <span class="description">Stok Saat ini: <u>{{$produk->stok_produk}}</u>pcs</span>
                                </div>
                            </div>
                        </div>
                        <!-- /.col -->
                        <!-- data informasi yang akan disimpan pada database -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="text" class="form-control" name="tglkeluar_laporan" value="{{$produk->nama_produk}}" readonly>
                            </div>
                            <div class="form-group">
                                <label>Tanggal Masuk:</label>
                                <input type="date" class="form-control" id="birthday" name="tgl_masuk" value="<?php echo date("Y-m-d"); ?>" readonly>
                            </div>
                            <div class="form-group">
                                <label>Kode Produk:</label>
                                <input type="text" class="form-control" name="kodeproduk_masuk" value="{{$produk->kode_produk}}" readonly>
                            </div>
                            <div class="form-group">
                                <label>jumlah masuk:</label>
                                <input type="number" class="form-control" name="jlh_masuk" value="1" min="1">
                            </div>
                            <!-- data input hidden dari user -->
                            <input type="number" class="form-control" name="id_produk" value="{{$produk->id_produk}}" hidden>
                            <input type="number" class="form-control" name="stok_produk" value="{{$produk->stok_produk}}" hidden>
                        </div>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        <button type="submit" class="btn btn-success btn-block btn-flat"><i class="fa fa-save"></i> SIMPAN</button>
                    </div>
                </div>
            </form>
        </div>
</section>


@endsection