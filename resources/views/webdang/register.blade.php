<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<a href="{{route('ghemay')}}" class="btn btn-warning">quay lại trang chủ</a>
<br><br><div class="container">
            <div style="margin-left: 250px;margin-top:100px" class="form">
                <div style="margin-left: 150px;" class="note">
                    <p>MỜI BẠN ĐĂNG KÝ </p>
                </div>
                    <form action="/dang-ky/store" method="POST">
                       @csrf
                        <div class="col-md-6">
                        <div class="input-data">
                        <label for="NAME">NAME:</label>  <input  name="name" type="text"  placeholder="Your Name *" value=""/>
                      <span style="color: red;"> @error('name'){{$message}}@enderror</span>
                       <label for="EMAIL">EMAIL:</label>   <input    name="email"  type="text" placeholder="Email" value=""/>
                       <span style="color: red;">  @error('email'){{$message}}@enderror</span>
                      <label for="PASSWORD">PASSWORD:</label>  <input   name="password"  type="password"  placeholder="Your Password *" value=""/>
                      <span style="color: red;"> @error('password'){{$message}}@enderror</span>
                        <label for="RE-PASSWORD">RE-PASSWORD:</label>  <input  type="password"  name="re-password"  placeholder="Confirm Password *" value=""/>
                        <span style="color: red;">  @error('re-password'){{$message}}@enderror</span>
                        <input type="hidden" name="role_id" value="0">
                        </div>
                        <br><button  value="dangky" type="submit" class="btn btn-dark">ĐĂNG KÝ </button>
                    </form>
            </div>
        </div>
        <style>
.input-data input {
width: 100%;
border:none;
color:black;
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