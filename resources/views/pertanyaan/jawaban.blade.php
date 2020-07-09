@extends('adminlte.master')

@section('content')

<div class="card">
    <div class="card-head">
        <h3 class="card-title">Jawaban</h3>
    </div>
    <div class="card-body">
        @if (!empty($jawaban))
        <table class="table table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th>Id Pertanyaan</th>
                    <th>Jawaban</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($jawaban as $jawab)
                <tr>
                    <td>{!! $jawab->pertanyaan_id !!}</td>
                    <td>{!! $jawab->jawaban !!}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @else
            Belum Ada Jawaban
        @endif
        <a href="/pertanyaan" class="btn btn-danger form-control">Kembali</a>
    </div>
</div>
    
@endsection