<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
  @include('home')
<div class="col-sm-6 ml-5 ">
<div style="margin-left: 200px; margin-top:150px" class="input-data">
      <form action="{{route('store')}}" method="POST">
      @csrf
      <label for="NAME">NAME:</label><input type="text" name="name" value=""><br>
      <label for="EMAIL">EMAIL:</label><input  type="text" name="email" value=""><br>
      <label for="PASSWORD">PASSWORD:</label><input  type="password" name="password" value=""><br>

      <br><br><button class="btn btn-primary" value="submit">THEM</button>
      </div>  
    </form>
      </div>
      <script src="https://code.jquery.com/jquery-3.3.1.min.js"
    integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    
    <style>
.input-data input {
width: 100%;
border:none;
color:black;
background-color:#F8FAFC;
outline: none;
font-size:10px;
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
 
