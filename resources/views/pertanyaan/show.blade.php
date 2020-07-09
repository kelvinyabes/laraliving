@extends('adminlte.master')

@section('content')

<div class="ml-3 mt-3">
    <h3>Detail Pertanyaan</h3>
    <p> Name : {{ $pertanyaan->name}} </p>
    <p> Pertanyaan : {{ $pertanyaan->pertanyaan}} </p>
</div>
    
@endsection