<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v3.8.5">

    <link rel="canonical" href="https://getbootstrap.com/docs/4.3/examples/checkout/">
<link rel="stylesheet" href="{{asset('/css/style.css')}}">
    <!-- Bootstrap core CSS -->
    <link href="/docs/4.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }
    </style>
    <!-- Custom styles for this template -->
    <link href="form-validation.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container">
        <div  class="row">
            <div class="col-md-4 order-md-2 mb-4">
                <h3 class="d-flex justify-content-between align-items-center mb-3">
                Xin chào {{$detail['name']}}
                </h3>
                <h3>HÌNH THỨC THANH TOÁN  {{$detail['thuoctinh']}}</h3>  
                <h3 class="d-flex justify-content-between align-items-center mb-3">
                Địa chỉ email {{$detail['email']}}
                </h3>
               <h3>Số điện thoại {{$detail['phone']}}</h3>
               <h3>Địa chỉ {{$detail['address']}}</h3>
                <?php
                $total=0;
                ?>
                <ul class="list-group mb-3">
                    @foreach($carts as $v)
                    <?php
           if($v['quantity']>$v['sogiam']&&$v['status']!=0&&$v['thuoctinh']==0){
            $total+=$v["price"]*$v['quantity']-($v['price']*$v['giamphantram'])/100;
           }
             elseif($v['quantity']>$v['sogiam']&&$v['status']!=0&&$v['thuoctinh']!=0){
               $total+= $v["thuoctinh"]*$v['quantity']-($v['thuoctinh']*$v['giamphantram'])/100;
             }
              elseif($v['quantity']<$v['sogiam']&&$v['status']!=0&$v['thuoctinh']==0){
               $total+=($v["price"]-($v["price"]*$v['sale'])/100)*$v['quantity'];
             }
              elseif($v['quantity']>$v['sogiam']&&$v['status']==0&$v['thuoctinh']==0){
               $total+=($v["price"]-($v["price"]*$v['sale'])/100)*$v['quantity'];
             } 
              else
              { $total+=$v["thuoctinh"]-($v["thuoctinh"]*$v['sale'])/100*$v['quantity'];
           }
                   ?>  
                    <li class="list-group-item d-flex justify-content-between lh-condensed">
                        <img style="width: 70px;height: 70px;" src="{{$v['image']}}" alt="">
                        <div>
                            <h4 class="my-0">{{$v['name']}}</h4>
                            <small class="text-muted">Số lương X {{$v['quantity']}} </small><br>
                            @if($v['thuoctinh']==0)
                            <small class="text-muted">giá:{{number_format($v['price']-($v['price']*$v['sale'])/100)}}VNĐ </small>
      @else
      <small class="text-muted">giá:{{number_format($v['thuoctinh']-($v['thuoctinh']*$v['sale'])/100)}}VNĐ </small>
      @endif
                        </div>
                    </li>
                    @endforeach
                    <li class="list-group-item d-flex justify-content-between">
                        <span>Tổng tiền là: {{number_format($total)}} VNĐ </span>
                        <strong></strong>
                    </li>
                </ul>
    </div>
    </div>
   </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script>
        window.jQuery || document.write('<script src="/docs/4.3/assets/js/vendor/jquery-slim.min.js"><\/script>')
    </script>
    <script src="https://getbootstrap.com/docs/4.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-xrRywqdh3PHs8keKZN+8zzc5TX0GRTLCcmivcbNJWm2rs5C8PRhcEn3czEjhAO9o" crossorigin="anonymous"></script>
    <script src="https://getbootstrap.com/docs/4.3/examples/checkout/form-validation.js"></script>
</body>

</html>
