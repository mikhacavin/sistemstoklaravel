@extends('layout.v_template')
@section('title','Tambah Kategori')

@section('content')

<div class="container">
    <a href="/kategori" class="btn btn-md btn-primary"><i class="far fa-arrow-alt-circle-left"></i> Kembali</a>
    <div class="row pt-2 pb-2">
        <div class="col-6">
            <div class="card card-gray">
                <div class="card-header">
                    <h3 class="card-title">masukkkan Nama Kategori</h3>
                </div>
                <form action="/kategori/insert" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="form-group pb-2">
                            <div class="row">
                                <div class="col-12">
                                    <label for="exampleInputEmail1">Nama Kategori</label>
                                    <input name="nama_kategori" type="text" class="form-control @error('nama_kategori') is-invalid @enderror" value="{{old('nama_kategori')}}">
                                    <div class="invalid-feedback">
                                        @error('nama_kategori')
                                        {{$message}}
                                        @enderror
                                    </div>
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