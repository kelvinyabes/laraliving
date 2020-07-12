@extends('adminlte.master')

@section('content')
<h5>Edit Pertanyaan</h5>
<div class="ml-3 mt-3">
<form action="/pertanyaan/{!!$pertanyaan->pertanyaan_id!!}" method="post">
        @csrf
        @method('PUT')

        <div class="form-group row">
            <label for="name" class="col-sm-2 col-form-label">Nama:</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="name" value="{!! $pertanyaan->name !!}" name="name" placeholder="Enter name">
            </div>
        </div>
     
        <div class="form-group row">
            <label for="pertanyaan" class="col-sm-2 col-form-label">Pertanyaan:</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="pertanyaan" value="{!! $pertanyaan->pertanyaan !!}" name="pertanyaan" placeholder="Enter Pertanyaan">
            </div>
        </div>
     
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection