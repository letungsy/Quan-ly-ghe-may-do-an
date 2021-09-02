<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
@include('home')
<div class="container">
    <div class="row">
            <div class="col-14 ml-5 ">
            <form action="{{route('timuser')}}" >
            @csrf
            tim kiem user:<input style="width: 300px;" class="form-control" type="text" name="query"><br>
            <input type="submit" value="timkiem" class="btn btn-success">
            </form>
            <!-- <a class="btn btn-info ml-5" href="{{route('themthanhvien')}}">them thanh vien</a> -->
            <br><br> 
            @if(session('message'))
                    <h6 class="alert alert-success float-left">{{session('message')}}</h6>
                    @endif
                    <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
              
            <table id="update_cart_url" class="table table-hover table-striped table-bordered" border="yes" data-url="{{route('updateCart')}}">
                    <thead>
                    @if(session('msg'))
                    <h6 class="alert alert-success float-left">{{session('msg')}}</h6>
                    @endif
                        <tr>
                            <td scope="col">#</td>
                            <td scope="col">ten</td>
                            <td scope="col">email</td>
                            <td scope="col">vaitro va quyen</td>
                            <td scope="col">Action</td>
                        </tr>
                    </thead>
                    <tbody>
                        @if(isset($users))
                        @foreach($users as $user)
                        <tr>
                            <td scope="row">{{$user->id}}</td>
                            <td>{{$user["name"]}}</td>
                            <td>{{$user["email"]}}</td>
                         @foreach($user->roles as $v)
                         <td  style="background-color:rgb(71, 219, 26)" class="badge badge-info">{{ isset($v->name) ? $v->name:'[N\A]'}}</td>
                      @foreach($v->permissions as $k)
                            <td class="badge bg-secondary">{{$k['name']}}</td>
                       @endforeach
                       @endforeach
                        @role('admin')
                         <td style="width: 180px;"><a  href="{{route('phanquyen',$user->id)}}" class="btn btn-primary ">Phan vai tro</a>  
                          <a href="{{route('phanquyennho',$user->id)}}" class="btn btn-dark ">Phan quyen</a> 
                         
                            </td>
                            @endrole
                        </tr>
                        </tbody>
                        @endforeach
                        @endif
                </table>
                {{ $users->links("pagination::bootstrap-4")}}
            </div>
        </div>
    </div>
    </div>
        </div>
    </div>

<script src="https://code.jquery.com/jquery-3.3.1.min.js"
    integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
