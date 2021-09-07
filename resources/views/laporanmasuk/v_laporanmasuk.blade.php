@extends('layout.v_template')
@section('title','Laporan Produk Masuk')

@section('content')

<div class="container">
    <a href="/laporanmasuk/add" class="btn btn-md btn-primary"><i class="far fa-plus-square"></i> Buat Laporan Masuk</a>
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
                        <th>Tgl Masuk</th>
                        <th>Produk</th>
                        <th>Kode</th>
                        <th>Lokasi</th>
                        <th>jumlah</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody class="align">
                    <?php $no = 1; ?>
                    @foreach($laporan as $data)
                    <tr>
                        <td class="align-middle text-center">{{$no++}}</td>
                        <td class="align-middle">{{date('d-M-Y', strtotime($data->tgl_masuk))}}</td>
                        <td class="align-middle">{{ Str::limit($data->nama_produk,30)}}</td>
                        <td class="align-middle">{{$data->kodeproduk_masuk}}</td>
                        <td class="align-middle">{{$data->lokasi_produk}}</td>
                        <td class="align-middle text-center">{{$data->jlh_masuk}}</td>
                        <td class="align-middle text-center">
                            <button type="button" class="btn btn-sm btn-success" data-toggle="modal" data-target="#detail{{$data->id_laporan}}">
                                <i class="fas fa-search-plus"></i>
                            </button>
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
                        <th>Tgl Masuk</th>
                        <th>Produk</th>
                        <th>Kode</th>
                        <th>Lokasi</th>
                        <th>jumlah</th>
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
                <h4 class="modal-title">Detail laporan Barang Masuk</h4>
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
                        <p>Kode produk : <button class="btn btn-success">{{$data->kodeproduk_masuk}}</button></p>
                        <p>Jumlah Masuk : {{$data->jlh_masuk}} </p>
                        <p>Tanggal Masuk : {{date('d-m-Y', strtotime($data->tgl_masuk))}}</p>
                    </div>
                </div>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
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
                <p>Apakah Anda Yakin ingin menghapus Laporan Masuk Produk ini ?</p>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                <a href="/laporanmasuk/delete/{{$data->id_laporan}}" class="btn btn-danger">Delete</a>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
@endforeach

@endsection