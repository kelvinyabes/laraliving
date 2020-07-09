@extends('adminlte.master')

@section('content')

<div class="card">
    <div class="card-head mt-2 ml-3">
        <h2 class="card-title">Jawaban</h2>
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
        <br><br>
        <a href="/pertanyaan" class="btn btn-danger form-control">Kembali</a>
    </div>
</div>
    
@endsection