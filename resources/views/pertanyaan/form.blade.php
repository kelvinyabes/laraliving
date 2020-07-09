@extends('adminlte.master')


@section('content')
<h5>Form Pertanyaan</h5>
<div class="ml-3 mt-3">
    <form action="/pertanyaan" method="post">
        @csrf
        <div class="form-group row">
            <label for="name" class="col-sm-2 col-form-label">Nama:</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="name" name="name" placeholder="Enter name">
            </div>
        </div>
     
        <div class="form-group row">
            <label for="pertanyaan" class="col-sm-2 col-form-label">Pertanyaan:</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="pertanyaan" name="pertanyaan" placeholder="Enter Pertanyaan">
            </div>
        </div>
        <input hidden name="tgl_dibuat" value="{{ Carbon\Carbon::now() }} ">
        <input hidden name="tgl_diperbarui" value="{{ Carbon\Carbon::now() }} ">
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection