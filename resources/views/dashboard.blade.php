

<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
<link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
<link rel="stylesheet" href="{{asset('/css/dash.css')}}">
<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
<x-app-layout>
</x-app-layout>
<div id="chuyen" class="nav-side-menu col-md-3">
    <div class="brand">MENU ADMIN</div>

    <i class="fa fa-bars fa-2x toggle-btn" data-toggle="collapse" data-target="#menu-content"></i>
        <div class="menu-list">
            <ul id="menu-content" class="menu-content collapse out">
            <li  data-toggle="collapse" data-target="#vai" class="collapsed ">
            @can('danhmucsanpham')
                  <a href="#"><i class="fa fa-gift fa-lg"></i> DANHMUC SANPHAM <span class="arrow"></span></a>
                </li>
                @endcan
                <ul class="sub-menu collapse" id="vai">
                @can('themdanhmuc')
                    <li ><a href="/themdanhmuc">THEM DANH MUC SAN PHAM</a></li>
                    @endcan
                    @can('lietkedanhmuc')
                    <li><a href="/xemdanhmuc">LIET KE DANH MUC SAN PHAM</a></li>
                    @endcan
                </ul>
                <li  data-toggle="collapse" data-target="#products" class="collapsed ">
                  @can('sanpham')
                  <a href="#"><i class="fa fa-gift fa-lg"></i> SAN PHAM <span class="arrow"></span></a>
                </li>
                @endcan
                <ul class="sub-menu collapse" id="products">
                @can('themsanpham')
                    <li ><a href="/hang/create">THEM SAN PHAM</a></li>
                    @endcan
                    @can('lietkesanpham')
                    <li><a href="/hang">LIET KE SAN PHAM</a></li>
                    @endcan
                </ul>
                <li data-toggle="collapse" data-target="#service" class="collapsed">
                @can('tintuc')
                  <a href="#"><i class="fa fa-globe fa-lg"></i> TIN TUC <span class="arrow"></span></a>
                  @endcan
                  </li>  
                <ul class="sub-menu collapse" id="service">
                @can('themtintuc')
                  <li><a href="/baiviet/create">THEM TIN TUC</a></li>
                  @endcan
                  @can('lietketintuc')
                  <li><a href="/baiviet">LIET KE TIN TUC</a></li>
                  @endcan
                </ul>
                <li data-toggle="collapse" data-target="#new" class="collapsed">
                @can('thaydoigia')
                <a href="#"><i class="fa fa-border fa-lg"></i> THAY DOI GIA <span class="arrow"></span></a>
                </li>
                <ul class="sub-menu collapse" id="new">
                <li><a href="{{route('thaydoigia')}}">THAY DOI GIA</a></li>
                @endcan
                </ul>
                 <li data-toggle="collapse" data-target="#donhang" class="collapsed">
                   @can('donhang')
                  <a href="#"><i class="fa fa-sort fa-lg"></i> DON HANG <span class="arrow"></span></a>
                  @endcan
                </li>
                <ul class="sub-menu collapse" id="donhang">
                @can('xemdonhang')
                <li><a href="/donhang">DON HANG</a></li>
                @endcan
                </ul>
                <li data-toggle="collapse" data-target="#user" class="collapsed">
                @can('quanlyuser')
                  <a href="#"><i class="fa fa-users fa-lg"></i> QUAN LY USER <span class="arrow"></span></a>
                  @endcan
               </li>
              
                <ul class="sub-menu collapse" id="user">
                @can('themuser')
                <li><a href="/user/themthanhvien">THEM USER </a></li>
                @endcan
                @can('lietkeuser')
                <li><a href="/xemuser">LIET KE USER </a></li>
                @endcan
                </ul>
                <li data-toggle="collapse" data-target="#quyen" class="collapsed">
                @can('xoauservaitroquyen')
                  <a href="#"><i class="fa fa-cog "></i> XOA USER VAI TRO QUYEN <span class="arrow"></span></a>
                  @endcan
                </li>
                <ul class="sub-menu collapse" id="quyen">
                @can('xoauser')
                <li><a href="{{route('xoauser')}}">XOA USER </a></li>
                @endcan
                @can('xoavaitro')
                <li><a href="/xoavaitro">XOA VAI TRO </a></li>
                @endcan
                @can('xoaquyen')
                <li><a href="/xoaquyen">XOA QUYEN </a></li>
                @endcan
                </ul>
                </ul>
         
     </div>
   
</div>

<style>
#chuyen{
  position: relative;
  top: -20px;
}
</style>