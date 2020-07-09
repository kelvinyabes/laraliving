@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="card">
                        <h3 class="card-title mx-auto">Hallo {{ Auth::user()->name }}</h3>
                        <div class="card-body mx-auto">
                          <p class="h3">Selamat Datang di 
                              <small class="text-muted">Laraliving</small>
                          </p>
                            <a href="{{ url('/pertanyaan/user/'. Auth::user()->id) }}" class="btn btn-success btn-lg">Daftar Pertanyaan</a>
                          <a href="/pertanyaan" class="btn btn-info btn-lg">Pertanyaanku</a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
