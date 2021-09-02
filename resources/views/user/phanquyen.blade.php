
  @include('home')
<div class="col-sm-6 ml-5 ">
<h1> cap vai tro user:{{$user->email}}</h1>
      <form action="{{route('themrole',$user->id)}}" method="POST">
      @csrf
      @foreach($role as $key=>$r)
      @if(isset($all_colum_roles))
      <div class="form-check form-check-inline">
      <input class="form-check-input" {{$r->id==$all_colum_roles->id?'checked':''}}   type="radio" id="{{$r->id}}" name="role" value="{{$r->name}}">
      <label class="form-check-label" for="{{$r->id}}">{{$r->name}}</label>
      </div>
      @else
      <div class="form-check form-check-inline">
      <input class="form-check-input" type="radio" id="{{$r->id}}" name="role" value="{{$r->name}}">
      <label class="form-check-label" for="{{$r->id}}">{{$r->name}}</label>
      </div>
      @endif
     @endforeach
      <br><br><button class="btn btn-primary" value="submit">cap vai tro</button>
      </form>
      </div>
      <div class="col-sm-3 ml-5">
           <form action="{{route('themvaitronua')}}" method="POST">
           @csrf
          ten vai tro: <input class="form-control" type="text" name="themvaitro"><br><br>
           <input class="btn btn-warning" type="submit" value="them vai tro">
           </form>
    </div> 
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.css" />

