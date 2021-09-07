@extends('layout.v_template')
@section('title','Laporan Produk Keluar')

@section('content')

<div class="container">
    <a href="/laporankeluar/add" class="btn btn-md btn-primary"><i class="far fa-plus-square"></i> Buat Laporan Keluar</a>
    @if (session('pesan'))
    <div class="alert alert-success alert-dismissible mt-2">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <h5><i class="icon fas fa-check"></i> Berhasil!</h5>
        {{ session('pesan')}}.
    </div>
    @endif

    <div class="row pt-3">
        <div class="col-12">
            <table class="table table-bordered table-striped" id="example1">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Tgl keluar</th>
                        <th>Sales</th>
                        <th>Produk</th>
                        <th>Kode</th>
                        <!-- <th>Lokasi</th> -->
                        <th>jumlah</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody class="align">
                    <?php $no = 1; ?>
                    @foreach($laporan as $data)
                    <tr>
                        <td class="align-middle text-center">{{$no++}}</td>
                        <td class="align-middle">{{date('d-M-Y', strtotime($data->tglkeluar_laporan))}}</td>
                        <td class="align-middle">{{Str::limit($data->nama_sales,10)}}</td>
                        <td class="align-middle">{{ Str::limit($data->nama_produk,25)}}</td>
                        <td class="align-middle">{{$data->kodeproduk_keluar}}</td>
                        <!-- <td class="align-middle">{{$data->lokasi_produk}}</td> -->
                        <td class="align-middle text-center">{{$data->jlhproduk_laporan}}</td>
                        <td class="align-middle text-center">{{$data->status_laporan}}</td>
                        <td class="align-middle text-center">
                            <button type="button" class="btn btn-sm btn-success" data-toggle="modal" data-target="#detail{{$data->id_laporan}}">
                                <i class="fas fa-search-plus"></i>
                            </button>
                            <a href="/laporankeluar/edit/{{$data->id_laporan}}" class="btn btn-sm btn-warning"><i class="fa fa-edit"></i></a>
                            <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#delete{{$data->id_laporan}}">
                                <i class="fa fa-trash"></i>
                            </button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <th>No</th>
                        <th>Tgl keluar</th>
                        <th>Sales</th>
                        <th>Produk</th>
                        <th>Kode</th>
                        <!-- <th>Lokasi</th> -->
                        <th>jumlah</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div> <br><br> <br>

<!-- detail laporan modal -->
@foreach($laporan as $data)
<div class="modal fade" id="detail{{$data->id_laporan}}">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Detail laporan ambil barang oleh <u>{{$data->nama_sales}}</u></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-6">
                        <p><img src="{{url('foto_produk/'. $data->foto_produk)}}" loading="lazy" alt="" width="350px"></p>
                    </div>
                    <div class="col-6">
                        <p>{{$data->nama_produk}}</p>
                        <p>Di ambil oleh : {{$data->nama_sales}}</p>
                        <p>Sebanyak : {{$data->jlhproduk_laporan}} </p>
                        <p>Tanggal Ambil : {{date('d-m-Y', strtotime($data->tglkeluar_laporan))}}</p>
                        <p>Status : <button class="btn btn-flat btn-primary disabled">{{$data->status_laporan}}</button></p>
                    </div>
                </div>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <a href="/laporankeluar/edit/{{$data->id_laporan}}" class="btn btn-warning">Ada yang Salah? <u>Edit</u></a>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
@endforeach

<!-- delete data modal -->
@foreach($laporan as $data)
<div class="modal fade" id="delete{{$data->id_laporan}}">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" style="color: orange;">Konfirmasi Hapus</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Apakah Anda Yakin ingin menghapus Laporan <br> {{$data->nama_sales}} ?</p>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                <a href="/laporan/delete/{{$data->id_laporan}}" class="btn btn-danger">Delete</a>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
@endforeach

@endsection