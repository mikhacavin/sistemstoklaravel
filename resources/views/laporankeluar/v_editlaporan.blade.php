@extends('layout.v_template')
@section('title','Edit Laporan')

@section('content')

<div class="container">
    <a href="/laporankeluar" class="btn btn-md btn-primary"><i class="far fa-arrow-alt-circle-left"></i> Kembali</a>
    <div class="row pt-2 pb-2">
        <div class="col-6">
            <div class="card card-gray">
                <div class="card-header">
                    <h3 class="card-title">Update Status Laporan</h3>
                </div>
                <form action="/laporankeluar/update/{{$laporan->id_laporan}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="form-group pb-2">
                            <div class="row">
                                <div class="col-12">
                                    <label for="exampleInputEmail1">Status Laporan</label>
                                    <select name="status_laporan" type="text" class="custom-select form-control" value="{{$laporan->status_laporan}}">
                                        <option value="CICIL" <?php if ($laporan->status_laporan == "CICIL") echo 'selected="selected"'; ?>>CICIL</option>
                                        <option value="LUNAS" <?php if ($laporan->status_laporan == "LUNAS") echo 'selected="selected"'; ?>>LUNAS</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-success">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection