<!doctype html>
<html lang="en">
<head>
  <title>them san pham</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
    @include('home')
    <div class="container">
      <div class="row">
          <div style="margin-left: 150px;margin-top: 150px;" class="form-group col-sm-8 ">
            @if(session('status'))
            <h6 class="alert alert-success">{{session('status')}}</h6>
            @endif
                  <form action="{{route('storedanhmuc')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="input-data">
                      <label for="tendanhmuc">TEN:</label>
                      <input type="text" name="tendanhmuc"   class="@error('name') is-invalid @enderror">
                    <label  for="tendanhmuc">MAU:</label><input type="text" name="mau"   class="@error('name') is-invalid @enderror">
                    <label  for="tendanhmuc">GIAMOI:</label><input type="text" name="giamoi" class="input-text"  class="@error('name') is-invalid @enderror">
                    <label>IDSANPHAM:</label>
                    @foreach($sanpham as $v)
                    <select name="id" id="ma" class="form-select" size="5" aria-label="size 3 select example">
                    <option value="{{$v->id}}">{{$v->name}}</option>
                    </select>
                    @endforeach
                    </div>
                    <br><br> <input class="btn btn-dark" type="submit" value="THEM">
                  </form>
                </div>
                </div>
                </div>
                <script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
   
<style>
.input-data input {
width: 100%;
border:none;
color:black;
outline: none;
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