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
           
                  <form action="{{route('updatemenu',$menu->id)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                      <label for="menulon">menulon:</label>
                      <input type="text" name="menulon" value="{{$menu->menulon}}" class="form-control" placeholder="name" class="@error('name') is-invalid @enderror">
                    </div>
                    menunho:<input type="text" name="menunho" class="form-control" value="{{$menu->menunho}}" placeholder="name" class="@error('name') is-invalid @enderror">
                    menunho2:<input type="text" name="menunho2" class="form-control" value="{{$menu->menunho2}}" placeholder="name" class="@error('name') is-invalid @enderror">
                    menunho3:<input type="text" name="menunho3" class="form-control" value="{{$menu->menunho3}}" placeholder="name" class="@error('name') is-invalid @enderror">
chuyen ID:<input type="text" name="chuyenid" class="form-control" value="{{$danhmuc->id}}" placeholder="name" class="@error('name') is-invalid @enderror">
route1:<input type="text" name="route1" class="form-control" value="{{$menu->route1}}" >
route2:<input type="text" name="route2" class="form-control" value="{{$menu->route2}}" >
route3:<input type="text" name="route3" class="form-control" value="{{$menu->route3}}" >
quyen:<input type="text" name="quyen" class="form-control" value="{{$menu->quyen}}" >
           <input class="btn btn-dark" type="submit" value="luu">
                  </form>
                </div>
                </div>
                </div>
    <!-- <script src="https://cdn.tiny.cloud/1/ckggdumb56hp9wv2ot3j9q8vtbo8w937pzz53dz0bccri3nn/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>  -->
   
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</body>
</html>