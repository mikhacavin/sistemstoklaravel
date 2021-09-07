@extends('layout.v_template')
@section('title','Sales')

@section('content')
<div class="container">
    <a href="/sales/add" class="btn btn-md btn-primary"><i class="far fa-id-badge"></i> Tambah Sales</a>
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
                        <th>Nama</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1; ?>
                    @foreach($sales as $data)
                    <tr>
                        <td class="align-middle text-center">{{$no++}}</td>
                        <td class="align-middle">{{$data->nama_sales}}</td>
                        <td class="align-middle text-center">
                            <a href="/sales/edit/{{$data->id_sales}}" class="btn btn-sm btn-warning"><i class="fa fa-edit"></i></a>
                            <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#delete{{$data->id_sales}}">
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

<!-- modal delete data sales -->
@foreach($sales as $data)
<div class="modal fade" id="delete{{$data->id_sales}}">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" style="color: orange;">Konfirmasi Hapus</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Apakah Anda Yakin ingin menghapus <br> {{$data->nama_sales}} ?</p>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                <a href="/sales/delete/{{$data->id_sales}}" class="btn btn-danger">Delete</a>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
@endforeach
@endsection