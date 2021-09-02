<!doctype html>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
  @include('home')
    <!-- Modal -->
 <div style="width:100%"  id="basicExampleModal" class="modal" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div style="width:99%" class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title"> SUA DANH MUC SAN PHAM</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div data-url="{{route('thaydoidanhmuc')}}" class="modal-body">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
  <form  action="/timkiemxem" class="form-inline my-4 my-lg-0 " method="GET">
                        <br><input name="query" class="form-control mr-sm-2 " type="search" placeholder="Tìm kiếm" aria-label="Search">
                       <br><br> <button type="submit" class="btn btn-primary" value="Save">timkiem</button>
                    </form><br>
               
  <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
                <hr><hr>
                <table class="table table-hover table-striped table-bordered" border="yes">
                <tr>
                <td>#</td>
                <td> ten danh muc</td>
                <td> ten san pham</td>
                <td> anh san pham</td>
                <td> mau san pham</td>
                <td> gia</td>
                <td> gia moi san pham</td>
                <td> Action</td>
                </tr>
     @foreach ($danhmuc as $key=>$v)
<tr>
<td>{{$key}}</td>
<td>{{$v->tendanhmuc}}</td>
<td>{{$v->danhmuc->name}}</td>
<td> <img style="width:70px;height:70px" src="{{$v->danhmuc->image}}" alt=""></td>
<td>{{$v->mau}}</td>
<td>{{$v->danhmuc->price}}</td>
<td>{{$v->giamoi}}</td>
<td style="width: 100px;">
@can('suadanhmuc')        
<a class="btn btn-info editdanhmuc" href="" data-id="{{$v->danhmuc_id}}"><svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
  <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"></path>
  <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"></path>
</svg></a>
@endcan
@can('xoadanhmuc')
<a class="btn btn-danger" href="xoadanhmuc/{{$v->danhmuc_id}}"><svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
  <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"></path>
  <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"></path>
</svg></a>
@endcan
</td>

</tr>
@endforeach
        </table>
{{$danhmuc->links("pagination::bootstrap-4")}}
</div>
</div>
</div>
<script >type="text/javascript"
$(document).ready(function(){
$('.editdanhmuc').click(function(event){
    event.preventDefault();
   var id=$(this).data('id');
   var url=$('.modal-body').data('url');
   $.ajax({
url:url,
type:"GET",
data:{id:id},
dataType:'json',
success:function(data){
  $('.modal-body').html(data.editdanhmuc);
  $('#basicExampleModal').modal();
}
});
});
});
</script>
