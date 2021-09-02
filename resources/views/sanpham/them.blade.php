<!doctype html>
<html lang="en">
<head>
  <title>them san pham</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    @include('home')
    <div class="container">
      <div class="row">
          <div style="margin-left: 110px;" class="form-group col-sm-10">
            @if(session('status'))
            <h6 class="alert alert-success">{{session('status')}}</h6>
            @endif
                  <form action="/hang/store" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="input-data">
                      <label for="name">TEN:</label>
                      <input type="text" name="name"  class="@error('name') is-invalid @enderror">
                      <label for="price">GIA:</label>
                      <input name="price" type="text"  class="@error('price') is-invalid @enderror">
                      <label for="sale">SALE:</label>
                      <input name="sale" type="text"  class="@error('price') is-invalid @enderror">
                      NEW: <input  type="checkbox" value="1" name="isNew">
                      <label  for="image">ANH:</label>
                      <input style="border-bottom: none;" type="file" name="image">
                      <label for="noidung">NOIDUNG:</label>
                        <textarea name="noidung" id="mytextarea"></textarea>
                        </div>
                     <br> <button type="submit" class="btn btn-primary" value="Save">THEM</button>
                  </form>
                </div>
                </div>
                </div>
<script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <script>
      var editor_config = {
        path_absolute: "/",
        selector: "textarea#mytextarea",
        height: 500,
        plugins: [
          "advlist autolink lists image charmap print preview hr anchor pagebreak",
          "searchreplace wordcount visualblocks visualchars code fullscreen",
          "inserdatetime media nonbreaking save table contextmenu directionality",
          "emoticons template paste textcolor colorpicker textpattern"
        ],
        toolbar: "insertfile undo redo | styleselect | bold italic |alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | image",
        relative_urls: false,
        images_upload_handler: function(blobInfo, success, failure) {
          var xhr, fromDate;
          xhr = new XMLHttpRequest();
          xhr.withCredentials = false;
          xhr.open('POST', '/admin/img_upload');
          var token = '{{csrf_token()}}';
          xhr.setRequestHeader("X-CSRF-Token", token);
          xhr.onload = function() {
            var json;
            if (xhr.status != 200) {
              failure('HTTP Error:' + xhr.status);
              return;
            }
            json = JSON.parse(xhr.responseText);
            if (!json || typeof json.location != 'string') {
              failure('Invalid JSON:' + xhr.responseText);
              return;
            }
            success(json.location);
          };
          formData = new FormData();
          formData.append('file', blobInfo.blob(), blobInfo.filename());
          xhr.send(formData);
        }
      };
      tinymce.init(editor_config);
    </script>
    <style>
.input-data input {
width: 100%;
border:none;
background-color: #F8FAFC;
color:black;
outline:none;
font-size: 10px;
border-bottom: 2px solid red ;
  }
.input-data label{
  position: relative;
  /* bottom: 26px; */
  left: 0;
  width: 100%;
  pointer-events: none;
}
</style>
</body>
</html>