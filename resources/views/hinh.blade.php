<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<ul class="nav navbar-nav navbar-right">
    <?php
    $quantitytotal=0;
    ?>
    <li>
    @if(Session::has('cart')!=null)
      @foreach(Session::get('cart') as $key=>$v)
      <?php $quantitytotal+=$v['quantity']?>
      @endforeach
      <a href="{{route('showCart')}}"><img style="width: 50px;height:50px;margin-top: -68px;margin-left: -8px;" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcR0gg1AxLgurycTiBjV2CsonBdV-U-2JRkBfA&usqp=CAU" alt="">
      <span id="quantitytotal" style="color:red;">{{$quantitytotal}}</span>
   </a>
     @else <a href="{{route('showCart')}}"><img style="width: 40px;height:40px;" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcR0gg1AxLgurycTiBjV2CsonBdV-U-2JRkBfA&usqp=CAU" alt="">
      <span id="quantitytotal" style="color:red;" >0</span>
   </a>
   @endif
    </li>
    </ul>