
@extends('master')
@section('content')

<div class="container">
<div class="row">
@foreach($tintuc as $v)
<div class="col-sm-3">
<a href="{{route('showtintuc',['id'=>$v->id])}}"><img height="100px" width="150px" src="{{$v->image}}"></a>
</div>
<div id="mota" class="col-sm-7">
<div  style="width: 80rem;">
  <div class="card-body">
    <a href="{{route('showtintuc',['id'=>$v->id])}}"><h5 class="card-title">{{$v->title}}</h5></a><br>
    <small>{{$v['created_at']}}</small><br>
    <h6>{{$v->mota}}</h6>
  </div>
</div>
</div>
@endforeach
</div>{{ $tintuc->links("pagination::bootstrap-4")}}</div>
@endsection
<style>
#mota{
    position: relative;
    left: -100px;
}
</style>