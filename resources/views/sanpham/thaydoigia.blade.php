<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    @include('home')
     <!-- Modal -->
<div style="width:100%"  id="basicExampleModal" class="modal" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div style="width:155%" class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title"> XEM SAN PHAM</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div data-url="{{route('show')}}" class="modal-body">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
    <div class="container">
        <div class="row">
                <div class="col-12 ml-5 ">
                    @if(session('msg'))
                    <h6 class="alert alert-success float-left">{{session('msg')}}</h6>
                    @endif
                    <div class="pull-left">
                    <a href="{{route('exportsanpham')}}" class="btn btn-info">Export</a><br>
                <hr><hr>
                <form action="{{route('importsanpham')}}" method="post" enctype="multipart/form-data">
                @csrf
                <input type="file" name="file">
                <input class="btn btn-warning" type="submit" value="import">
                </form>
                </div>
                    <table class="table table-hover table-striped table-bordered" border="yes" style="width: 100%;">
                        <thead>
                            <tr>
                                @foreach($configs as $config)
                                <th>{{$config['name']}}</th>
                                @endforeach
                            </tr>
                        </thead>
                        <thead>
                            @foreach ($sanpham as $v)
                            <tr>
                                @foreach ($configs as $config)
                                <?php switch ($config['type']) {
                                    case "text": ?>
                                        <th>{!! $v[$config['field']] !!}</th>
                                    <?php
                                        break;
                                    case "number": ?>
                                        <th>{{number_format($v[$config['field']])}}</th>
                                    <?php
                                        break;
                                    case "image": ?>
                                        <th><img height="80px" onerror="this.src='/images/1.png'" src="<?= $v[$config['field']] ?>" alt=""></th>
                                    <?php
                                        break;
                                        case "themthuvien": ?>
                                            <th><a class="btn btn-warning " href="{{route('addgalerry',$v->id)}}"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-lg" viewBox="0 0 16 16">
  <path d="M8 0a1 1 0 0 1 1 1v6h6a1 1 0 1 1 0 2H9v6a1 1 0 1 1-2 0V9H1a1 1 0 0 1 0-2h6V1a1 1 0 0 1 1-1z"/>
</svg> ADD</a></th>
                                        <?php
                                            break;
                                    case "show": ?>
                    
                                        <th><a class="btn btn-primary show"data-id="{{$v->id}}" href=""><svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-eye-fill" viewBox="0 0 16 16">
  <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z"></path>
  <path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z"></path>
</svg></a></th>
                                    <?php
                                        break;
                                    case "edit": ?>
                                        <th><a class="btn btn-dark " href="hang/edit/{{$v->id}}"><svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
  <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"></path>
  <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"></path>
</svg></a></th>
                                    <?php
                                        break;
                                    case "delete": ?>
                                        <th><a class="btn btn-danger " href="hang/destroy/{{$v->id}}"><svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
  <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"></path>
  <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"></path>
</svg></a></th>
                                <?php
                                        break;
                                } ?>
                                @endforeach
                            </tr>
                            @endforeach
                        </thead>
                    </table>
                    <div>
                        {{ $sanpham->links("pagination::bootstrap-4")}}
                    </div> 
     
            </div>
        </div>
    </div>
   
    <script>
$(document).ready(function(){
    $('.show').click(function(event){
    event.preventDefault();
    var id=$(this).data('id');
    var url=$('.modal-body').data('url');
    $.ajax({
      url:url,
      type:"GET",
      data:{id:id},
      dataType:"json",
      success:function(data){
     $('.modal-body').html(data.show);
     $('#basicExampleModal').modal();
      }  
    });
 });
});
</script>
   

