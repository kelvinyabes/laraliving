@extends('adminlte.master')

@push('script-head')
<script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
@endpush

@section('content')
<h5>Form Pertanyaan</h5>
<div class="ml-3 mt-3">
  <form action="/pertanyaan" method="post">
    @csrf
    <div class="form-group row">
      <label for="name" class="col-sm-2 col-form-label">Judul:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="name" name="name" placeholder="Masukkan Judul">
      </div>
    </div>

    <div class="form-group row">
      <label for="pertanyaan" class="col-sm-2 col-form-label">Pertanyaan:</label>
      <div class="col-sm-10">
        {{-- <input type="text" class="form-control" id="pertanyaan" name="pertanyaan" placeholder="Enter Pertanyaan"> --}}
        <textarea name="pertanyaan" class="form-control my-editor">{!! old('pertanyaan', $p ?? '') !!}</textarea>
      </div>
    </div>

    {{-- <div class="form-group row">
      <label for="tags" class="col-sm-2 col-form-label">Tags:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="tags" name="tags" placeholder="Tags">
      </div>
    </div> --}}

    @php
    $user_id = Auth::id();
    @endphp
    <input hidden name="user_id" value="{{ $user_id }}">
    <input hidden name="tgl_dibuat" value="{{ Carbon\Carbon::now() }} ">
    <input hidden name="tgl_diperbarui" value="{{ Carbon\Carbon::now() }} ">
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
</div>
@endsection

@push('scripts')

<script>
  var editor_config = {
    path_absolute: "/",
    selector: "textarea.my-editor",
    plugins: [
      "advlist autolink lists link image charmap print preview hr anchor pagebreak",
      "searchreplace wordcount visualblocks visualchars code fullscreen",
      "insertdatetime media nonbreaking save table contextmenu directionality",
      "emoticons template paste textcolor colorpicker textpattern"
    ],
    toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media",
    relative_urls: false,
    file_browser_callback: function(field_name, url, type, win) {
      var x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName('body')[0].clientWidth;
      var y = window.innerHeight || document.documentElement.clientHeight || document.getElementsByTagName('body')[0].clientHeight;

      var cmsURL = editor_config.path_absolute + 'laravel-filemanager?field_name=' + field_name;
      if (type == 'image') {
        cmsURL = cmsURL + "&type=Images";
      } else {
        cmsURL = cmsURL + "&type=Files";
      }

      tinyMCE.activeEditor.windowManager.open({
        file: cmsURL,
        title: 'Filemanager',
        width: x * 0.8,
        height: y * 0.8,
        resizable: "yes",
        close_previous: "no"
      });
    }
  };

  tinymce.init(editor_config);
</script>

@endpush