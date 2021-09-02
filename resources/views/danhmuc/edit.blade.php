<!doctype html>
<html lang="en">
<head>
  <title>them san pham</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
  
    <div class="container">
      <div class="row">
          <div class="form-group col-sm-10">
            @if(session('status'))
            <h6 class="alert alert-success">{{session('status')}}</h6>
            @endif
            <div class="input-data">
                  <form action="{{route('nanglen',$danhmuc->danhmuc_id)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                  
                      <label for="tendanhmuc">TEN:</label>
                      <input type="text" name="tendanhmuc" value="{{$danhmuc->tendanhmuc}}"  placeholder="name" class="@error('name') is-invalid @enderror">
                    </div>
                    <label for="mau">MAU:</label><input type="text" name="mau" value="{{$danhmuc->mau}}" placeholder="name" class="@error('name') is-invalid @enderror">
                    <label for="giamoi">GIAMOI:</label><input type="text" name="giamoi"  value="{{$danhmuc->giamoi}}" placeholder="name" class="@error('name') is-invalid @enderror">
                    <label for="id">ID SAN PHAM:</label><input type="text" name="id"  value="{{$danhmuc->id}}" placeholder="name" class="@error('name') is-invalid @enderror">
                    </div>
           <input style="border-bottom: none;" class="btn btn-dark" type="submit" value="luu">
                  </form>
                 
                </div>
                </div>
                </div>
    <!-- <script src="https://cdn.tiny.cloud/1/ckggdumb56hp9wv2ot3j9q8vtbo8w937pzz53dz0bccri3nn/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>  -->
   
    <script
  src="https://code.jquery.com/jquery-3.6.0.min.js"
  integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
  crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</body>
</html>
<style>
.input-data input {
width: 100%;
border:none;
color:black;
outline:none;
font-size: 10px;
background-color: #FFFFFF;
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