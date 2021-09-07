@extends('layout.v_template')
@section('title','Lapor Produk Keluar')

@section('content')
<div class="container">
    @if (session('pesan'))
    <div class="alert alert-success alert-dismissible mt-2">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <h5><i class="icon fas fa-check"></i> Berhasil!</h5>
        {{ session('pesan')}}.
    </div>
    @endif
    <div class="row pt-3">
        <div class="col-12">
            <table class="table table-bordered table-hover" id="example2">
                <thead>
                    <tr class="text-center">
                        <th>Lokasi</th>
                        <th>Foto</th>
                        <th>Brand</th>
                        <th>Kategori</th>
                        <th>Kode Produk</th>
                        <th>Nama</th>
                        <th>Stok</th>
                        <th>Harga</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody class="align">
                    <?php $no = 1; ?>
                    @foreach($produk as $data)
                    <tr>
                        <td class="align-middle text-center">{{$data->lokasi_produk}}</td>
                        <td class="align-middle"><img src="{{url('foto_produk/'. $data->foto_produk)}}" loading="lazy" alt="" width="100px">
                        </td>
                        <td class="align-middle"><b>{{$data->nama_brand}}</td>
                        <td class="align-middle text-center">{{$data->nama_kategori}}</td>
                        <td class="align-middle text-center">{{$data->kode_produk}}<br>{{$data->kodeproduk_variasi}}</td>
                        <td class="align-middle">{{ Str::limit($data->nama_produk,40)}}<br>{{$data->variasi_produk}}
                        <td class="align-middle text-center">{{$data->stok_produk}}<br>{{$data->variasi_stok_produk}}</td>
                        <td class="align-middle">Rp.{{number_format($data->harga_produk)}},-<br>Rp.{{number_format($data->variasi_harga)}},-</td>
                        <td class="align-middle text-center">
                            <button type="button" class="btn btn-sm btn-success" data-toggle="modal" data-target="#detail{{$data->id_produk}}">
                                <i class="fas fa-search-plus"></i>
                            </button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
                <!-- <tfoot>
                    <tr>
                        <th>Lokasi</th>
                        <th>Foto</th>
                        <th>Kategori</th>
                        <th>Nama</th>
                        <th>Harga</th>
                        <th>Stok</th>
                        <th>Harga</th>
                        <th>Action</th>
                    </tr>
                </tfoot> -->
            </table>
        </div>
    </div>
</div> <br><br> <br>

<!-- detail data modal -->
@foreach($produk as $data)
<div class="modal fade" id="detail{{$data->id_produk}}">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Detail {{$data->nama_produk}}</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-6">
                        <p><img src="{{url('foto_produk/'. $data->foto_produk)}}" loading="lazy" alt="" width="100%"></p>
                        <small style="color: blue;">Tgl Masuk : {{date('d-m-Y', strtotime($data->tglmasuk_produk))}} </small>
                    </div>
                    <div class="col-6">
                        <p style="font-weight: bold;" class="margin:0 !important;">{{$data->nama_brand}}</p>
                        <p>{{$data->nama_produk}}</p>
                        <p>Rp. {{number_format($data->harga_produk)}},-</p>
                        <p>Stok : {{$data->stok_produk}}</p>
                        <p>Kode Produk : {{$data->kode_produk}}</p>
                        <a href="/laporankeluar/proses/{{$data->id_produk}}" class="btn btn-sm btn-warning">Proses ini <i class="fas fa-shopping-basket"></i></a>
                        <div class="col-md-12 mt-3">
                            <div class="card card-primary collapsed-card">
                                <div class="card-header">
                                    <h3 class="card-title">Variasi Harga</h3>
                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-plus"></i>
                                        </button>
                                    </div>
                                    <!-- /.card-tools -->
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <p>{{$data->variasi_produk}}</p>
                                    <p>Stok : {{$data->variasi_stok_produk}}</p>
                                    <p>Harga : Rp. {{number_format($data->variasi_harga)}},-</p>
                                    <p>Kode Produk : {{$data->kodeproduk_variasi}}</p>
                                    <p>Tgl Masuk : {{date('d-m-Y', strtotime($data->tglmasuk_variasi_produk))}}</p>
                                    <a href="/laporankeluar/prosesv/{{$data->id_produk}}" class="btn btn-success btn-sm">Proses ini <i class="fas fa-shopping-basket"></i></a>
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                        </div>
                        <p>{!!$data->deskripsi_produk!!}</p>
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
@foreach($produk as $data)
<div class="modal fade" id="delete{{$data->id_produk}}">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" style="color: orange;">Konfirmasi Hapus</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Apakah Anda Yakin ingin menghapus <br> {{$data->nama_produk}} ?</p>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                <a href="/produk/delete/{{$data->id_produk}}" class="btn btn-danger">Delete</a>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
@endforeach
@endsection