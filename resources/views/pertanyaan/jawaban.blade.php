@extends('adminlte.master')

@section('content')

<div class="card">
    @foreach ($jawaban as $j)
    <h1>{{ $j->jawaban }} </h1> <br>   
    @endforeach
    
</div>
    
@endsection