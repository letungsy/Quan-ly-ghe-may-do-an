
<div id="cart_to">
<div id="cart" class="cart" data-url="{{route('deleteCart')}}">
<table id="update_cart_url" class="table  " data-url="{{route('updateCart')}}">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">ảnh sản phẩm</th>
      <th scope="col">tên</th>
      <th scope="col">giá</th>
      <th scope="col">số lượng</th>
      <th scope="col">tổng tiền</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <?php
  $total=0;
  ?>
  <tbody>
  @foreach($carts as $id=>$v)
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
    <tr>
      <th scope="row">{{$id}}</th>
      <td> <img style="width: 100px; height:100px;" src="{{$v['image']}}" alt=""></td>
      <td>{{$v["name"]}}</td>
      @if($v['thuoctinh']==0)
      <td>{{number_format($v['price']-($v['price']*$v['sale'])/100)}}</td>
      @else
      <td>{{number_format($v['thuoctinh']-($v['thuoctinh']*$v['sale'])/100)}}</td>
      @endif
      <td>
      <input class="quantity" style="width:50px;" type="number" value="{{$v['quantity']}}" min=1>
     </td>
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
     <td> <a href="" data-id="{{$id}}" class="btn btn-primary cart_update"><svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-box-arrow-up" viewBox="0 0 16 16">
  <path fill-rule="evenodd" d="M3.5 6a.5.5 0 0 0-.5.5v8a.5.5 0 0 0 .5.5h9a.5.5 0 0 0 .5-.5v-8a.5.5 0 0 0-.5-.5h-2a.5.5 0 0 1 0-1h2A1.5 1.5 0 0 1 14 6.5v8a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 14.5v-8A1.5 1.5 0 0 1 3.5 5h2a.5.5 0 0 1 0 1h-2z"/>
  <path fill-rule="evenodd" d="M7.646.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1-.708.708L8.5 1.707V10.5a.5.5 0 0 1-1 0V1.707L5.354 3.854a.5.5 0 1 1-.708-.708l3-3z"/>
</svg></a>
     <a href="" data-id="{{$id}}" class="btn btn-danger cart_delete"><svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
  <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"></path>
  <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"></path>
</svg></a>
     </td>
    </tr>
    @endforeach
    <div class="card">
  <div style="background-color: #498dc1; color:red" class="card-body">

</div> 

  </tbody>
</table>
<div class="col-sm-12">
<h1>TỔNG TIỀN HÀNG:</h1>
<h1 style="color:brown">
{{number_format($total)}} VNĐ</h1>
</div>
<br><a class="btn btn-warning chu" href="{{route('thanhtoan')}}">Tiến hành mua hàng</a><br><br>
</div>
</div>


