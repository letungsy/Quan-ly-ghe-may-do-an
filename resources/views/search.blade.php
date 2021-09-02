<!doctype html>
<html lang="en">
  <head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>
  <!-- <a class="btn btn-info" href="{{route('ghemay')}}">quay lai trang cu</a>    -->
<a class="btn btn-dark" href="{{route('ghemay')}}">quay lai trang chu</a>
  <div class="container custom-ghe">
<div class="row">
@foreach($sanpham as $v)
@foreach($v->hangmuc as $k)
@if($k['giamoi']!=0&&$k['mau']!=0)
<div class="col-sm-3" style="width: 180px;margin-left:50px;">
<h3>{{$k->tendanhmuc}}</h3>
  <img class="card-img-top" src="{{$v->image}}" alt="Card image cap">
  <div class="card-body">
  <a href="ghemay/detail/{{$v->id}}" class="tensanpham">{{$v->name}}</a>
  <p class="card-text">mau:{{$k->mau}}</p>
  <p class="card-text">gia:{{number_format($k->giamoi)}}</p>
  </div>
  </div>
@elseif($v['price']!=0)
<div class="col-sm-3" style="width: 200px;margin-top:40px">
  <img style="height:260px;width:260px" class="card-img-top" src="{{$v->image}}" alt="Card image cap">
  <div class="card-body">
  <a href="ghemay/detail/{{$v->id}}" class="tensanpham">{{$v->name}}</a> 
  <p class="card-text">gia:{{number_format($v->price)}}</p>
  </div>
  </div>
@endif
@endforeach 
@endforeach
</div>
</div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>

