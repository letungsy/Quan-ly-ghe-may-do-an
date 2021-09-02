<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  @include('home')
<div class="col-sm-6 ml-5 ">
<h1> cap quyen user:{{$user->email}}</h1>
      <form action="{{route('themrolenho',$user->id)}}" method="POST">
      @csrf
      @if(isset($name_roles))
     <h1>vai tro hien tai: {{$name_roles}}</h1>
     @endif
@foreach($permission as $key=>$v)
<div class="form-check-inline form-switch ">
  <input class="form-check-input"
  @foreach($get_permission_via_role as $key=>$k)
  @if($k->id==$v->id)
  checked
  @endif
@endforeach
   name="permission[]" type="checkbox" value="{{$v->name}}" id="{{$v->id}}">
  <label class="form-check-label" for="{{$v->id}}">{{$v->name}}</label>
</div>
@endforeach
      <br><br><button class="btn btn-primary" value="submit">cap quyen user</button>
      </form>
      </div>
 
    <div class="col-sm-3 ml-5">
           <form action="{{route('themquyennua')}}" method="POST">
           @csrf
          ten quyen: <input class="form-control" type="text" name="themquyen"><br><br>
           <input class="btn btn-warning" type="submit" value="themquyen">
           </form>
    </div> 

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.css" />
<style>
.form-check-label{
  font-size:15px;
}
</style>
  
