<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
<link rel="stylesheet" href="{{asset('/css/dash.css')}}">
<x-app-layout>
</x-app-layout>
<div id="chuyen" class="nav-side-menu col-sm-3">
    <div class="brand">MENU ADMIN</div>
    <i class="fa fa-bars fa-2x toggle-btn" data-toggle="collapse" data-target="#menu-content"></i>
    <div class="menu-list">
    @foreach($menu as $v)
        <ul id="menu-content" class="menu-content collapse out">
            <li data-toggle="collapse" data-target="#{{$v->chuyenid}}" class="collapsed">
                @can($v->quyen)
                <a href="#"><i class=""></i>{{$v->menulon}} <span class="arrow"></span></a>
            </li>
            @endcan
            <ul class="sub-menu collapse" id="{{$v->chuyenid}}">
                @can($v->route1)
                <li><a href="{{$v->route1}}">{{$v->menunho}} </a></li>
                @endcan
                @can($v->route2)
                @if($v->route2!=0)
                <li><a href="{{$v->route2}}">{{$v->menuthu2}} </a></li>
                @endif
                @endcan
                @can($v->route3)
                @if($v->route3!=0)
                <li><a href="{{$v->route3}}">{{$v->menunho3}} </a></li>
                @endif
                @endcan
            </ul>
            @endforeach
            
        </ul>
      
    </div>
</div>

<style>
    #chuyen {
        position: relative;
        top: -20px;
        height: 1500px;
    }
</style>
<script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
<script >type="text/javascript"
$(document).ready(function(){
$('.xemchitiet').click(function(event){
    event.preventDefault();
   var id=$(this).data('id');
   var url=$('.modal-body').data('url');
   $.ajax({
url:url,
type:"GET",
data:{id:id},
dataType:'json',
success:function(data){
  $('.modal-body').html(data.xemchitiet);
  $('#xem').modal();
}
});
});
});
</script>