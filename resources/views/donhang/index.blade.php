
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    @include('home')
    <!-- Modal -->
 <div style="width:100%"  id="xem" class="modal" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div style="width:99%" class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title"> CHI TIET DON HANG</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div data-url="{{route('xemchitiet')}}" class="modal-body">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
 <!-- Modal -->
 <div style="width:100%"  id="basicExampleModal" class="modal" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div style="width:99%" class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title"> SUA DON HANG</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div data-urlsua="{{route('sua')}}" class="suahang">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<div class="container">
               <div class="row justify-content-center">
                     <div class="col-md-15">
                    <table  class="table table-hover table-striped table-bordered" border="yes">
                        <thead>
                            <tr>
                                <td scope="col">#</td>
                                <td scope="col">ten khach hang</td>
                                <td scope="col">dia chi email</td>
                                <td scope="col">dia chi</td>
                                <td scope="col">so dien thoai</td>
                                <td scope="col">tong tien</td>
                                <td scope="col">trang thai</td>
                                <td scope="col">Action</td>
                            </tr>
                        </thead>
                        @foreach($donhang as $key=>$v )
                        <tr>
                            <td>{{$key}}</td>
                            <td>{{$v->name }}</td>
                            <td>{{$v->email }}</td>
                            <td>{{$v->address}}</td>
                            <td>{{$v->phone}}</td>
                            <td>{{number_format($v->total)}} VND</td>
                            <td>
                            @if($v->status==1)
                            <a href="#" class="label-success label">da xu ly</a>
                            @elseif($v->status==0)
                            <a href="#" class="label-default label">chua xu ly</a>
                            @elseif($v->status==2)
                            <a href="#" class="label-primary label">dang cho dien thoai</a>
                            @elseif($v->status==3)
                            <a href="#" class="label-info label">da nghe dien thoai</a>
                            @elseif($v->status==4)
                            <a href="#" class="label-danger label">don hang hoan thanh</a>
                            @endif
                            </td>
                            @can('admin')
                            <td style="width: 80px;" ><a style="display:inline" data-id="{{$v->id}}" class="suadonhang"   href=""><svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
  <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"></path>
  <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"></path>
</svg></a>
                            <a style="display:inline" class="xemchitiet" data-id="{{$v->id}}" href=""><svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-eye-fill" viewBox="0 0 16 16">
  <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z"></path>
  <path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z"></path>
</svg></a>
                           <a style="display:inline" href="donhang/destroy/{{$v->id}}"><svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
  <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"></path>
  <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"></path>
</svg></a>
@endcan
</td>
                        </tr>
                        @endforeach
                    </table>
                    {{ $donhang->links("pagination::bootstrap-4")}}
                </div>
            </div>
        </div>
      
 

<script
  src="https://code.jquery.com/jquery-3.6.0.slim.js"
  integrity="sha256-HwWONEZrpuoh951cQD1ov2HUK5zA5DwJ1DNUXaM6FsY="
  crossorigin="anonymous"></script> 
<script >type="text/javascript"
$(document).ready(function(){
$('.suadonhang').click(function(event){
    event.preventDefault();
   var id=$(this).data('id');
   var url=$('.suahang').data('urlsua');
   $.ajax({
url:url,
type:"GET",
data:{id:id},
dataType:'json',
success:function(data){
  $('.suahang').html(data.suadonhang);
  $('#basicExampleModal').modal();
}
});
});
});
</script>

<style>
.tdnho{
  width: 180px;
}
</style>

