<!doctype html>
<html lang="en">
<head>
  <title>them san pham</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
    @include('home')
    <div class="container">
      <div class="row">
          <div class="form-group col-sm-10">
            @if(session('status'))
            <h6 class="alert alert-success">{{session('status')}}</h6>
            @endif
                  <form action="{{route('storega')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                      <label for="galerry_name">ten:</label>
                     <input type="text" name="galerry_name" class="form-control" placeholder="name" class="@error('name') is-invalid @enderror">
                    </div>
                    <div class="form-group">
                      <label for="image">anh:</label>
                      <input name="image[]" type="file" multiple >
                    </div>
                    <div class="row">
  <div class="col-md-12">

ID:<input type="text" name="id" class="form-control" placeholder="name" class="@error('name') is-invalid @enderror">
  </div>
</div>
                    <input class="btn btn-dark" type="submit" value="THEM">
                  </form>
                </div>
                </div>
                </div>
    <!-- <script src="https://cdn.tiny.cloud/1/ckggdumb56hp9wv2ot3j9q8vtbo8w937pzz53dz0bccri3nn/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>  -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.css" />


</body>
</html>