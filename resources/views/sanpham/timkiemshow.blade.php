<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
<div  class="" style="width:100%">
@foreach($sanpham as $v)
  <div class="card-body">
    <h3 style="color: red;" class="card-title">San pham ID:{{$v->id}}</h3>
<img style="width: 70px;height:70px" src="{{$v->image}}" alt="">
    <h4>{{$v->name}}</h4> <br>
    <h4> {{number_format($v->price)}}VND</h4> <br>
    <h3 class="card-text">{!!$v->noidung!!}</h3>
  </div>
  @endforeach
</div>
