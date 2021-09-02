<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
@include('home')
<div class="container">
    <div class="row">
            <div class="col-11 ml-5 ">
           
            <br><br> 
            @if(session('message'))
                    <h6 class="alert alert-success float-left">{{session('message')}}</h6>
                    @endif
                    <div class="row justify-content-center">
        <div class="col-md-12">
            <table id="update_cart_url" class="table table-hover table-striped table-bordered" border="yes" data-url="{{route('updateCart')}}">
                    <thead>
                    @if(session('msg'))
                    <h1 class="alert alert-danger float-left">{{session('msg')}}</h1>
                    @endif
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">ten quyen</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        
                    @foreach($permission as $key=>$p)
                        <tr>
                            <th scope="row">{{$p->id}}</th>
                            <th>{{$p["name"]}}</th>
                            <td style="width: 30px;"><a  href="{{route('xoaquyenthat',$p->id)}}" class="btn btn-danger "><svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
  <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"></path>
  <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"></path>
</svg></a>  
                            </td>
                        </tr>
                        </tbody>
                        @endforeach
                      
                </table>
                {{$permission->links("pagination::bootstrap-4")}}
            </div>
        </div>
    </div>
    </div>
        </div>
    </div>
<script src="https://code.jquery.com/jquery-3.3.1.min.js"
    integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>