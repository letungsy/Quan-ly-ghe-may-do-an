<!doctype html>
<html lang="en">
  <head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
@if(session('update'))
<h6 class="alert alert-success">{{session('update')}}</h6>
@endif
@include('home')
<div class="container">
<div class="row">
<div class="col-sm-12">
<form action="/hang/update/{{$sanpham->id}}" method="post" enctype="multipart/form-data">
@csrf
  <input type="hidden" name="id" value="{{$sanpham->id}}">
  <div class="form-group">
    <label for="name">name</label>
    <input value="{{$sanpham->name}}" type="text" name="name" class="form-control" placeholder="name" >
  </div>
  <div class="form-group">
    <label for="price">price</label>
    <input value="{{$sanpham->price}}" name="price" type="text" class="form-control" placeholder="price" >
  </div>
  <br>
  <div class="form-group">
   image: <input value="{{$sanpham->image}}" type="file" name="image" >
  </div><br>
  <div class="form-group">
  <label for="noidung">noidung:</label>
    <textarea id="mytextarea" class="form-control" name="noidung" >{{$sanpham->noidung}}</textarea>
  </div><br>
  <button type="submit" class="btn btn-primary" value="update">update</button>
</form>
</div>
</div>
</div>

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
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script
  src="https://code.jquery.com/jquery-3.6.0.min.js"
  integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
  crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>



