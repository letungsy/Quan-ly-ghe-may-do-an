
    <!-- Required meta tags -->
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <!-- Bootstrap CSS -->
   
@extends('master')
@section('content')
<style>
.lSSlideOuter .lSPager.lSGallery img {
    display: block;
   height: 60px;
    max-width: 100%;
}
</style>
<div  class="container">
<div class="row">
<div class="col-sm-4">
<ul id="imageGallery">
@foreach($sanpham->galerry as $v)
  <li  data-thumb="{{$v->image}}" data-src="{{$v->image}}">
    <img width="100%" height="100%" src="{{$v->image}}" />
  </li>
   @endforeach
</ul>
</div>
<div class="col-sm-1">
</div>
<div class="col-sm-6">
    <h2 >{{$sanpham->name}} </h2><br>
    @foreach($sanpham->hangmuc as $k)
    @if($k->giamoi!=0)
<input  type="radio"  name="mau" id="tienmat" value="{{$k->giamoi}}"> mau:{{$k->mau}}<br>
@else
@endif 
@endforeach
<!-- <div  id="thay"class="body" > </div> -->
<h3 id="thay"> GIÁ:{{number_format($sanpham->price-($sanpham->price*$sanpham->sale)/100)}}VNĐ</h3>
    <a href="" 
    data-url="{{route('addToCart',['id'=>$sanpham->id])}}"
    class="btn btn-danger add_to_cart"
    >THÊM GIỎ HÀNG</a><br><br>

</div>
</div>
</div>
<div class="col-sm-12">
{!!($sanpham->noidung)!!}
</div>
@endsection
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script>
function addToCart(event){
 event.preventDefault();
 let urlcart=$('.add_to_cart').data('url');
 var thuoctinh=$("input[name='mau']:checked" ).val(); 
 $.ajax({
type:"GET",
data:{thuoctinh:thuoctinh},
url:urlcart,
dataType:'json',
success:function(data){
  if(data.code===200){
    Swal.fire('Thêm hàng thành công')
   $('#quantitytotal').html(data.her);
}
}
});
}
$(function(){
//  $('.add_to_cart').on('click',addToCart);
 $(document).on('click','.add_to_cart',addToCart);
});
</script>
<script>
$(document).ready(function(){
$('input[type="radio"]').change(function(event){
  event.preventDefault();
var data=$(this).val();
$('#thay').html(data)
});
});
</script>

