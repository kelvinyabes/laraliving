@extends('adminlte.master')

@section('content')
<!--
<div class="ml-3 mt-3">
    <h3>Detail Pertanyaan</h3>
    <p> Name : {{ $pertanyaan->name}} </p>
    <p> Pertanyaan : {{ $pertanyaan->pertanyaan}} </p>
</div>
-->

  <div class="card">
    <div class="card-body">
      <!-- Post -->
      <div class="post">
        <div class="user-block">
          <h2><a href="/pertanyaan/{{ $pertanyaan->pertanyaan_id }}">{{ $pertanyaan->name }}</a></h2>
          <p>Created At {{ $pertanyaan->created_at }}</p>
          <!-- /.user-block -->
          <h3>
            <p>
              {!! $pertanyaan->pertanyaan !!}
            </p>
          </h3>
          <p>
            <a href="#" class="link-black text-sm mr-2"><i class="fas fa-thumbs-up mr-1"></i></a>

              count vote 

          <a href="#" class="link-black text-sm"><i class="far fa-thumbs-down mr-1"></i></a>
          </p>

          

        </div>
      <!-- /.post --> 
    </div>
  </div> 
@endsection