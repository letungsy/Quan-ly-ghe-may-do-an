<!doctype html>
  <head>
    <title>ghe may</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="{{asset('/css/repo.css')}}">
    <link rel="stylesheet" href="{{asset('/css/repo.css')}}">
    <link rel="stylesheet" href="{{asset('/css/lightGallery.css')}}">
    <link rel="stylesheet" href="{{asset('/css/lightslider.css')}}">
    <link rel="stylesheet" href="{{asset('/css/prettify.css')}}">
    <!-- Bootstrap CSS -->
    <link rel="icon" href="{{ URL::asset('favicon.ico') }}" type="image/x-icon"/>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  {{View::make('header')}}
   @yield('content')
      <main style="background-color: #b2d9f7">{{View::make('footer')}}</main>
      <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script> 
      <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="{{asset('/js/lightgallery-all.min.js')}}"></script>
    <script src="{{asset('/js/lightslider.js')}}"></script>
    <script src="{{asset('/js/prettify.js')}}"></script>
<style>
 
 .formcon{
    float: right;
    height: 200px;
}
.phancach{
  margin-top: 55px;
}
.noi{
  margin-left: 500px;
  margin-top: 20px;
}
a.tensanpham {
  color: black;
  text-decoration:none; 
}
 a:hover{
 color: rgb(73, 22, 22);
}
.card-img-top{
  width: 180px;
  height: 150px;
}
.gia{
 color:rgb(214, 42, 42);
}
p{
  color: black;
}
.chu{
width: 500px;
}

.container{
    margin-top: 3%;
   
}
.inner{
    overflow: hidden;
}
.inner img{
    transition: all 1.5 ease ;
}
.inner:hover img{
transform: scale(1.5);
}
</style>
<script>
$(document).ready(function() {
    $('#imageGallery').lightSlider({
        gallery:true,
        item:1,
        loop:true,
        thumbItem:5,
        slideMargin:0,
        enableDrag: false,
        currentPagerPosition:'left',
        onSliderLoad: function(el) {
            el.lightGallery({
                selector: '#imageGallery .lslide'
            });
        }   
    });  
  });
  </script>

