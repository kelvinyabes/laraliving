@extends('adminlte.master')

@push('script-head')
<script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
@endpush

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
      <th scope="col">Judul</th>
      <th scope="col">Pertanyaan</th>
      <th scope="col">Jawaban</th>
      <th scope="col">Choice</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($pertanyaan as $key => $p)
    <tr>
      <td> {{ $key+1 }} </td>
      <td> {{ $p->name }} </td>
      <td> {!! $p->pertanyaan !!} </td>
      <td>
        <a href="{!! url('/jawaban/'.$p->pertanyaan_id) !!} ">
          <button class="btn btn-success">Lihat Jawaban</button>
        </a>
      </td>
      <td>
        <a href="/pertanyaan/{{ $p->pertanyaan_id }}" class="btn btn-sm btn-info" >Show</a>
           <a href="/pertanyaan/{{ $p->pertanyaan_id }}/edit" class="btn btn-sm btn-default" >Edit</a>  
           <form action="/pertanyaan/{{ $p->pertanyaan_id }}" method="post" style="display:inline">
            @csrf  
            @method('DELETE')
            <button type="submit" class="btn btn-sm btn-danger"> <i class="fas fa-trash"></i> </button>
      </td>
    </tr>
    <table>
      <td>
        <form action=" {{ url('/jawaban/'.$p->pertanyaan_id) }} " method="post">
          @csrf     
          <div class="form-group row">
              <label for="jawaban" class="col-sm-2 col-form-label">Jawaban:</label>
              <div class="col-sm-10">
                  {{-- <input type="text" class="form-control" id="jawaban" name="jawaban" placeholder="Enter Jawaban"> --}}
                  <textarea name="jawaban" class="form-control my-editor">{!! old('jawaban', $jawaban ?? '') !!}</textarea>
                  <input hidden name="pertanyaan_id" value="{{ $p->pertanyaan_id }} ">
                  <input hidden name="tgl_dibuat" value="{{ Carbon\Carbon::now() }} ">
                  <input hidden name="tgl_diperbarui" value="{{ Carbon\Carbon::now() }} ">
                  <button type="submit" class="btn btn-primary mt-3">Submit Jawaban</button>
              </div>
          </div>
        </form> 
      </td>
      </div>      
    </table>  
    @endforeach
  </tbody>
</table>
@endsection

@push('scripts')

<script>
    var editor_config = {
      path_absolute : "/",
      selector: "textarea.my-editor",
      plugins: [
        "advlist autolink lists link image charmap print preview hr anchor pagebreak",
        "searchreplace wordcount visualblocks visualchars code fullscreen",
        "insertdatetime media nonbreaking save table contextmenu directionality",
        "emoticons template paste textcolor colorpicker textpattern"
      ],
      toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media",
      relative_urls: false,
      file_browser_callback : function(field_name, url, type, win) {
        var x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName('body')[0].clientWidth;
        var y = window.innerHeight|| document.documentElement.clientHeight|| document.getElementsByTagName('body')[0].clientHeight;
  
        var cmsURL = editor_config.path_absolute + 'laravel-filemanager?field_name=' + field_name;
        if (type == 'image') {
          cmsURL = cmsURL + "&type=Images";
        } else {
          cmsURL = cmsURL + "&type=Files";
        }
  
        tinyMCE.activeEditor.windowManager.open({
          file : cmsURL,
          title : 'Filemanager',
          width : x * 0.8,
          height : y * 0.8,
          resizable : "yes",
          close_previous : "no"
        });
      }
    };
  
    tinymce.init(editor_config);
  </script>
    
@endpush