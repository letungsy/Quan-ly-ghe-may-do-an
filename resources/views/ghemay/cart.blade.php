@extends('master')
@section('content')
@include("ghemay.component.cart_component")
@endsection
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script>
function cartUpdate(event){
    event.preventDefault();
    let urlUpdateCart=$('#update_cart_url').data('url');
    let id=$(this).data('id');
    let quantity=$(this).parents('tr').find('input.quantity').val();
    $.ajax({
type:"GET",
url:urlUpdateCart,
data:{id:id,quantity:quantity},
dataType:'json',
success:function(data){
if(data.code===200){
$('#cart_to').html(data.cart_component);
$('#quantitytotal').html(data.her);
Swal.fire('cập nhật hàng thành công')
}
},
error:function(){
}
 });
}
function deleteCart(event){
  event.preventDefault();
  let urlDelete=$('.cart').data('url');
  let id=$(this).data('id');
  $.ajax({
type:"GET",
url:urlDelete,
data:{id:id},
dataType:'json',
success:function(data){
if(data.code===200){
$('#quantitytotal').html(data.her);
$('#cart_to').html(data.cart_component);
Swal.fire({
  title: 'bạn có muốn xoá không?',
  text: 'bạn chắc chắn xoá chứ',
  icon: 'warning',
  // showCancelButton: true,
  confirmButtonText: 'Vâng, Đã xoá nó!',
}).then((result) => {
  if (result.isConfirmed) {
    Swal.fire(
      'ĐÃ XOÁ!',
      'Xoá Thành Công'
    )
  // For more information about handling dismissals please visit
  // https://sweetalert2.github.io/#handling-dismissals
  } 
})
}
},
error:function(){
}
 });
}
$(function(){
 $(document).on('click','.cart_update',cartUpdate);
 $(document).on('click','.cart_delete',deleteCart);
});
</script>
