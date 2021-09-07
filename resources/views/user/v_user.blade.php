@extends('layout.v_template')
@section('title','User Management')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-5"></div>
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
                    User Management digunakan untuk membatasi akses kepada user yang sudah teregistrasi.
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
    </div>

    <div class="row">
        <div class="col-8 pb-4">
            <table class="table table-bordered table-striped" id="example2">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Level</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1; ?>
                    @foreach($user as $data)
                    <tr>
                        <td class="align-middle text-center">{{$no++}}</td>
                        <td class="align-middle">{{$data->name}}</td>
                        <td class="align-middle">{{$data->email}}</td>
                        <td class="align-middle">{{$data->level}}</td>
                        <td class="align-middle text-center">
                            <a href="/user/edit/{{$data->id}}" class="btn btn-sm btn-warning"><i class="fa fa-edit"></i></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

</div>

@endsection