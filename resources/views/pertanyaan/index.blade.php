@extends('adminlte.master')

@section('content')
<div class="ml-3 mt-3">

  <h1>Data Pertanyaan</h1>

<a href="/pertanyaan/create" class="btn btn-primary mb-3">
  Buat Pertanyaan Baru
</a>

<table class="table table-bordered">
  <thead class="thead-dark">
    <tr>
      <th scope="col">#</th>
      <th scope="col">Nama</th>
      <th scope="col">Pertanyaan</th>
      <th scope="col">Jawaban</th>
      <th scope="col">Choice</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($pertanyaan as $key => $p)
    <tr>
      <td> {{ $key+1 }} </td>
      <td> {{ $p ->name }} </td>
      <td> {{ $p ->pertanyaan }} 
        <br>
        <a href="/pertanyaan/{{ $p->pertanyaan_id }}" class="btn btn-sm btn-info" >Show</a>
           <a href="/pertanyaan/{{ $p->pertanyaan_id }}/edit" class="btn btn-sm btn-default" >Edit</a>  
           <form action="/pertanyaan/{{ $p->pertanyaan_id }}" method="post" style="display:inline">
            @csrf  
            @method('DELETE')
            <button type="submit" class="btn btn-sm btn-danger"> <i class="fas fa-trash"></i> </button>
          </form>
      </td>
      <td>
        <a href="{{ url('/jawaban/'.$p->pertanyaan_id) }} ">
          <button class="btn btn-success">Lihat Jawaban</button>
        </a>
      </td>
      <td>
        <form action=" {{ url('/jawaban/'.$p->pertanyaan_id) }} " method="post">
          @csrf     
          <div class="form-group row">
              <label for="pertanyaan" class="col-sm-2 col-form-label">Jawaban:</label>
              <div class="col-sm-10">
                  <input type="text" class="form-control" id="pertanyaan" name="jawaban" placeholder="Enter Jawaban">
              </div>
          </div>
          <input hidden name="pertanyaan_id" value="{{ $p->pertanyaan_id }} ">
          <input hidden name="tgl_dibuat" value="{{ Carbon\Carbon::now() }} ">
          <input hidden name="tgl_diperbarui" value="{{ Carbon\Carbon::now() }} ">
          <button type="submit" class="btn btn-primary">Submit Jawaban</button>
      </form> 
      </td>
    </tr>  
    @endforeach
  </tbody>
</table>
</div>
@endsection