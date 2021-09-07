@extends('layout.v_template')
@section('title','Edit User')

@section('content')
<form action="/user/update/{{$user->id}}" method="POST" enctype="multipart/form-data">

    @csrf

    <div class="container">
        <div class="row">
            <div class="col-6">
                <a href="/user" class="btn btn-primary">Kembali</a>
                <hr>
                <div class="form-group">
                    <label for="">Level</label>
                    <select name="level" type="text" class="custom-select form-control" value="{{old('level')}}">
                        <option value="user" <?php if ($user->level == "user") echo 'selected="selected"'; ?>>user</option>
                        <option value="sales" <?php if ($user->level == "sales") echo 'selected="selected"'; ?>>sales</option>
                        <option value="admin" <?php if ($user->level == "admin") echo 'selected="selected"'; ?>>admin</option>
                    </select>
                    </select>
                </div>
                <div class="form-group">
                    <button class="btn btn-success" type="submit">Simpan</button>
                </div>
            </div>
        </div>
    </div>


</form>
@endsection