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
</head>
<body class="bg-light">
    <div class="container">
        <div  class="row">
            <div class="col-md-4 order-md-2 mb-4">
                <h4 class="d-flex justify-content-between align-items-center mb-3">
                    <span class="text-muted">giỏ hàng của bạn</span>
                    <small> <a href="{{route('showCart')}}">CẬP NHẬT</a></small>
                </h4> 
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
                            <h6 class="my-0">{{$v['name']}}</h6>
                            <small class="text-muted">Số lương X {{$v['quantity']}} </small><br>
                            @if($v['thuoctinh']==0)
                            <small class="text-muted">giá:{{number_format($v['price']-($v['price']*$v['sale'])/100)}}VNĐ </small>
      @else
      <small class="text-muted">giá:{{number_format($v['thuoctinh']-($v['thuoctinh']*$v['sale'])/100)}}VNĐ </small>
      @endif
                        </div>
                        @if($v['quantity']>$v['sogiam']&&$v['status']!=0&&$v['thuoctinh']==0)
      <td>{{number_format($v["price"]*$v['quantity']-($v['price']*$v['giamphantram'])/100)}} </td>
      @elseif($v['quantity']>$v['sogiam']&&$v['status']!=0&&$v['thuoctinh']!=0)
      <td>{{number_format($v["thuoctinh"]*$v['quantity']-($v['thuoctinh']*$v['giamphantram'])/100)}} </td>
      @elseif($v['quantity']<$v['sogiam']&&$v['status']!=0&$v['thuoctinh']==0)
      <td>{{number_format(($v["price"]-($v["price"]*$v['sale'])/100)*$v['quantity'])}} </td>
      @elseif($v['quantity']>$v['sogiam']&&$v['status']==0&$v['thuoctinh']==0)
      <td>{{number_format(($v["price"]-($v["price"]*$v['sale'])/100)*$v['quantity'])}} </td>
      @else
      <td>{{number_format(($v["thuoctinh"]-($v["thuoctinh"]*$v['sale'])/100)*$v['quantity'])}} </td>
      @endif 
                    </li>
                    @endforeach
                    <li class="list-group-item d-flex justify-content-between">
                        <span>Tổng tiền là: {{number_format($total)}} VNĐ </span>
                        <strong></strong>
                    </li><br>
                    <form class="needs-validation" novalidate action="{{route('saveCart')}}" method="POST">
                @csrf
                    <li class="wc_payment_method payment_method_bacs">

<input name="thuoctinh" type="radio" id="chuyenkhoan" value="STK:0041000357843,
CHỦ TK:LE TUNG SY,
NGÂN HÀNG VIETCOMBANK">Chuyển khoản ngân hàng<br><br>
<input name="thuoctinh" type="radio" id="tienmat" value="TRẢ TIỀN MẶT KHI NHẬN HÀNG"> Thanh toán tiền mặt<br>

@php
$vnd=$total/23000;
@endphp
<br><div id="paypal-button"></div>
<input type="hidden" id="vnd" value="{{round($vnd,2)}}">
<div  id="thay"class="body" > </div>



<span style="color:red">@error('thuoctinh'){{$message}}@enderror</span>
</li>
                </ul>
            </div>
            <div style="background-color: white;" class="col-md-7 order-md-1">
                <h4 class="mb-3">Thông tin thanh toán</h4>
                <div class="input-data">
                <div class="mb-3">
                        <label for="name">Name </label>
                        <input name="name"  type="email"  id="name" placeholder="name" >
                        <span style="color: red;">@error('name'){{$message}}@enderror</span>
                    </div>
                    <div class="mb-3">
                        <label for="email">Email </label>
                        <input name="email"  type="email"  id="email" placeholder="you@example.com" >
                      <span style="color: red;">@error('email'){{$message}}@enderror</span>
                    </div>
                    <div class="mb-3">
                        <label for="address">Address </label>
                        <input name="address"  type="email"  id="address" placeholder="Address" >
                        <span style="color: red;">@error('address'){{$message}}@enderror</span>
                    </div>
                    <div class="mb-3">
                        <label for="phone">Phone </label>
                        <input name="phone"  type="email"  id="phone" placeholder="Phone" >
                        <span style="color: red;">@error('phone'){{$message}}@enderror</span>
                    </div>
                    <div class="mb-3">
                        <label for="Note">Note<span class=""></span></label><br>
                        <textarea style="width:100%" name="note" id="" cols="70" rows="3"></textarea>
                        <span style="color: red;">@error('note'){{$message}}@enderror</span>
                    </div>
                    </div>
                    <hr class="mb-4">
                    <hr class="mb-4">
                    <button class="btn btn-primary btn-lg btn-block" type="submit">Xác nhận thanh toán</button>
                </form>
            </div>
        </div>
        </div>
    </div>
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
   <script>
        window.jQuery || document.write('<script src="/docs/4.3/assets/js/vendor/jquery-slim.min.js"><\/script>')
    </script> 
   
<script>
$(document).ready(function(){
$('input[type="radio"]').change(function(){
var data=$(this).val();
$('#thay').html(data)
});
});
</script>
<script src="https://www.paypalobjects.com/api/checkout.js"></script>
<script>
    var usd=document.getElementById('vnd').value;
  paypal.Button.render({
    // Configure environment
    env: 'sandbox',
    client: {
      sandbox: 'AVp-vf8E8p45oMu3R9ysQyjgNvLVpnifWCMz0FvVv1YqFWieaXBLHklC3tDLi_5QSwWEkKsMrrQZb-wD',
      production: 'demo_production_client_id'
    },
    // Customize button (optional)
    locale: 'en_US',
    style: {
      size: 'small',
      color: 'gold',
      shape: 'pill',
    },

    // Enable Pay Now checkout flow (optional)
    commit: true,

    // Set up a payment
    payment: function(data, actions) {
      return actions.payment.create({
        transactions: [{
          amount: {
            total: `${usd}`,
            currency: 'USD'
          }
        }]
      });
    },
    // Execute the payment
    onAuthorize: function(data, actions) {
      return actions.payment.execute().then(function() {
        // Show a confirmation message to the buyer
        window.alert('cam on ban mua hang chung toi!');
      });
    }
  }, '#paypal-button');

</script>
</body>
</html>
<style>
#thay{
 color: red;
margin-top: 10px;
}

.input-data input {
width: 100%;
border:none;
color:black;
outline: none;
font-size: 10px;
border-bottom: 2px solid red ;
  }
.input-data label{
  position: relative;
  /* bottom: 26px; */
  left: 0;
  width: 100%;
  pointer-events: none;
}


</style>
</html>