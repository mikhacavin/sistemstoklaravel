@extends('layout.v_template')
@section('title','Kategori')

@section('content')
<div class="container">
<div class="row">
        <div class="col-3"></div>
        <div class="col-3">
            <div class="card card-success collapsed-card">
                <div class="card-header">
                    <h3 class="card-title">Info</h3>

                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-plus"></i>
                        </button>
                    </div>
                    <!-- /.card-tools -->
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    Harap perhatikan dengan baik. Menghapus kategori mengakibatkan kategori produk terhapus pada tiap-tiap produk.
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
    </div>
    <a href="/kategori/add" class="btn btn-md btn-primary"><i class="far fa-id-badge"></i> Tambah Kategori</a>
    @if (session('pesan'))
    <div class="alert alert-success alert-dismissible mt-2">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <h5><i class="icon fas fa-check"></i> Berhasil!</h5>
        {{ session('pesan')}}.
    </div>
    @endif
    <div class="row">
        <div class="col-sm-6">
            <table class="table table-bordered" id="example2">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Kategori</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1; ?>
                    @foreach($kategori as $data)
                    <tr>
                        <td class="align-middle text-center">{{$no++}}</td>
                        <td class="align-middle">{{$data->nama_kategori}}</td>
                        <td class="align-middle text-center">
                            <a href="/kategori/edit/{{$data->id_kategori}}" class="btn btn-sm btn-warning"><i class="fa fa-edit"></i></a>
                            <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#delete{{$data->id_kategori}}">
                                <i class="fa fa-trash"></i>
                            </button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- modal delete data kategori -->
@foreach($kategori as $data)
<div class="modal fade" id="delete{{$data->id_kategori}}">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" style="color: orange;">Konfirmasi Hapus</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Apakah Anda Yakin ingin menghapus <br> {{$data->nama_kategori}} ?</p>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                <a href="/kategori/delete/{{$data->id_kategori}}" class="btn btn-danger">Delete</a>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
@endforeach
@endsection