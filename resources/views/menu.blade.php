
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.css" />
@include('home')
@can('xemmenu')
<div class="container">
    <div class="row justify-content-center">
        <div  class="col-md-12">
                <table class="table table-hover table-striped table-bordered" border="yes">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">menulon</th>
                            <th scope="col">menunho</th>
                            <th scope="col">menunho2</th>
                            <th scope="col">menunho3</th>
                            <th scope="col">route1</th>
                            <th scope="col">route2</th>
                            <th scope="col">route3</th>
                            <th scope="col">quyen</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($menu as $k)
                        <tr>
                        <th scope="row">{{$k->id}}</th>
                            <th scope="row">{{$k->menulon}}</th>
                            <th>{{$k["menunho"]}}</th>
                            <th>{{$k["menuthu2"]}}</th>
                            <th>{{$k["menunho3"]}}</th>
                            <th>{{$k["route1"]}}</th>
                            <th>{{$k["route2"]}}</th>
                            <th>{{$k["route3"]}}</th>
                            <th>{{$k["quyen"]}}</th>
                         <td> 
                       
                         <a class="btn btn-danger" href="/xoamenu/{{$k->id}}"><svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
  <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"></path>
  <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"></path>
</svg></a>
                            </td>
                        </tr>
                        </tbody>
                        @endforeach
                </table>  
        
        </div>
   </div>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
          <h1>MENU ADD</h1>
              <form action="{{route('banh')}}" method="POST">
              @csrf
              <div  class="input-data">
            menulon:  <input  type="text" name="menulon"><br><br>
            menunho1  <input  type="text" name="menunho"><br><br>
            menunho2 <input  type="text" name="menuthu2"><br><br>
            menunho3 <input  type="text" name="menunho3"><br><br>
            quyen <input type="text" name="quyen"><br><br>
            route1 <input type="text" name="route1"><br><br>
            route2 <input  type="text" name="route2"><br><br>
            route3 <input type="text" name="route3"><br><br>
            chuyenid <input  type="text" name="chuyenid"><br><br>
            </div>
              <input style="border-bottom:none;" class="btn btn-info" type="submit" value="THEM">
            
            </form>
            </div>
    </div>
</div>
@endcan
<script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
<style>
.input-data input {
width: 100%;
border:none;
color:black;
background-color: #F8FAFC;
outline: none;
font-size: 10px;
border-bottom: 2px solid red ;
  }
.input-data label{
  position: relative;
  /* bottom: 26px; */
  left: 0;
  width: 100%;
  pointer-events: none;
}

</style>

