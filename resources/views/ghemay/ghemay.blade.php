@extends('master')
@section('content')
<link rel="stylesheet" href="{{asset('/css/repo.css/')}}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.green.css">
@foreach ($ghe as $v)
@if($v->thaydoiten!=0)
<h1 style="color: red;">{{$v->thaydoiten}}</h1>
@else
@endif
@endforeach
<div   style="color: forestgreen;"id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <ol   class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img class="d-block w-100" src="https://mayxinh.com/wp-content/uploads/2020/06/banner2.png" alt="First slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="https://mayxinh.com/wp-content/uploads/2021/04/9.png" alt="Second slide">
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
<div class="col-sm-12 phan cach "><h2 class="noi">SẢN PHẨM NỔI BẬT</h2></div>
<div class="container custom-ghe">
<div class="row">
@foreach($ghe as $v)
@if($v['isNew']!=1&&$v['sale']==0)
<div class="col-sm-4">
<div class="sanpham" style="width: 400px;">
<div class="inner">
  <a  href="{{route('detail',['id'=>$v->id])}}"><img style="width: 250px; height:250px" class="card-img-top" src="{{$v->image}}" alt="Card image cap"></a>
  </div>
  <div class="card-body">
  <a href="{{route('detail',['id'=>$v->id])}}" class="tensanpham">{{$v->name}}</a>
  </div>
  <p class="card-text gia">{{number_format($v->price)}} VNĐ</p>
</div>
</div> 
@endif 
 @endforeach
 </div> 
 </div> 
<!-- het san pham noi bat -->
<div class="col-sm-12 phan cach"><h2 class="noi">SẢN PHẨM SALE</h2></div>
<div class="container custom-ghe">
<div class="row">
@foreach($ghe as $v)
@if($v['sale']>0)
<div class="col-sm-4">
<div class="sanpham" style="width: 400px;">
<div class="inner">
  <a  href="{{route('detail',['id'=>$v->id])}}"><img style="width: 250px; height:250px" class="card-img-top" src="{{$v->image}}" alt="Card image cap"></a>
  </div>
  <div class="sale">
    <span id="giamgia">SALE{{$v->sale}}%</span>
  </div>
  <div class="card-body">
  <a href="{{route('detail',['id'=>$v->id])}}" class="tensanpham">{{$v->name}}</a>
  </div>
  <span style="margin-left: 100px;text-decoration:line-through;color:black" class="card-text gia">{{number_format($v->price)}} VNĐ</span>
  <span class="card-text gia">{{number_format($v->price-($v->price*$v->sale)/100)}} VNĐ</span>
</div>
</div> 
@endif
@endforeach
 </div> 
 </div> 
<!-- het san pham sell -->
<div class="col-sm-12 phan cach "><h2 class="noi">SẢN PHẨM NEW</h2></div>
<div class="container custom-ghe">
<div class="row">
@foreach($ghe as $v)
@if($v->isNew==1)
<div class="col-sm-4">
<div class="sanpham" style="width: 400px;">
<div class="inner">
  <a  href="{{route('detail',['id'=>$v->id])}}"><img style="width: 250px; height:250px" class="card-img-top" src="{{$v->image}}" alt="Card image cap"></a>
  </div>
  <div class="new">
    <span id="new">NEW</span>
  </div>
  <div class="card-body">
  <a href="{{route('detail',['id'=>$v->id])}}" class="tensanpham">{{$v->name}}</a>
  </div>
  <p class="card-text gia">{{number_format($v->price)}} VNĐ</p>
</div>
</div> 
@endif
@endforeach
 </div> 
 </div> 
<!-- het san pham new -->
<div class="banner-bottom">
<div class="row">
<div class="col-xs-12 col-sm-6 home-category-item-2">
<div class="block-home-category"> 
  <div class="inner">
<a href="/ghemay">
<img class="b-lazy b-loaded" src="https://mayxinh.com/wp-content/uploads/2020/06/5.png" alt="Banner">
</a>
</div>		
</div>
</div>
<div class="col-xs-12 col-sm-6 home-category-item-2">
<div class="block-home-category"> 
  <div class="inner">
<a href="/ghemay">
<img class="b-lazy b-loaded" src="https://mayxinh.com/wp-content/uploads/2020/06/6.png" alt="Banner">
</a>	
</div>		
</div>
</div>
</div>
</div>
@endsection
<style>
#giamgia{
  border-radius: 25px;
  background: red;
  padding: 18px; 
  width: 120px;
  height: 40px;  
  margin-left: 200px;
}
#new{
  border-radius: 25px;
  background: yellowgreen;
  padding: 18px; 
  width: 120px;
  height: 40px;  
  margin-left: 200px; 
}
</style>