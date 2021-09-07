@extends('layout.v_template')
@section('title','Proses Laporan')


@section('content')
<a href="/laporankeluar/add" class="btn btn-primary">Kembali</a>
<hr>
<section class="content">
    <div class="container-fluid">
        <div class="card card-default">
            <div class="card-header">
                <h3 class="card-title">Lengkapi Informasi sebelum mengambil barang.</h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                </div>
            </div>
            <form action="/laporankeluar/insert" method="POST" enctype="multipart/form-data">
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
                                    <span class="description">Tersedia: <u>{{$produk->stok_produk}}</u>pcs</span>
                                </div>
                            </div>
                        </div>
                        <!-- /.col -->
                        <!-- data informasi yang akan disimpan pada database -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">nama produk</label>
                                <input type="text" class="form-control" name="nama_produk" value="{{$produk->nama_produk}}" readonly>
                            </div>

                            <div class="form-group">
                                <label for="">kode produk</label>
                                <input type="text" class="form-control" name="kodeproduk_keluar" value="{{$produk->kode_produk}}" readonly>
                            </div>

                            <div class="form-group">
                                <label>Diambil tanggal:</label>
                                <input type="date" class="form-control" id="birthday" name="tglkeluar_laporan" value="<?php echo date("Y-m-d"); ?>" readonly>
                            </div>
                            <div class="form-group">
                                <label>jumlah ambil:</label>
                                <input type="number" class="form-control" name="jlhproduk_laporan" value="1" min="1" max="{{$produk->stok_produk}}">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Nama Sales:</label>
                                <div class="select2-purple">
                                    <select class="select2" multiple="multiple" name="id_sales" data-placeholder="Nama Sales" data-dropdown-css-class="select2-purple" style="width: 100%;" required>
                                        @foreach($sales as $b)
                                        <option value="{{$b->id_sales}}">{{$b->nama_sales}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Status:</label>
                                <select name="status_laporan" class="form-control">
                                    <option value="BOOK">BOOK</option>
                                    <option value="CICIL">CICIL</option>
                                    <option value="LUNAS">LUNAS</option>
                                </select>
                            </div>
                            <!-- data input hidden dari user -->
                            <input type="number" class="form-control" name="id_produk" value="{{$produk->id_produk}}" hidden>
                            <input type="number" class="form-control" name="stok_produk" value="{{$produk->stok_produk}}" hidden>
                        </div>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        <button type="submit" class="btn btn-success btn-block btn-flat"><i class="fa fa-save"></i> PROSES</button>
                    </div>
                </div>
            </form>
        </div>
</section>


@endsection