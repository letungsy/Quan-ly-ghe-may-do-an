<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
<link rel="stylesheet" href="{{asset('/css/style.css')}}">
@include('header')
<div class="wrapper fadeInDown">
  <div id="formContent">
    <!-- Tabs Titles -->
    <!-- Icon -->
    <div class="fadeIn first">
      ĐĂNG NHẬP
    </div>
    <span style="color: red;">@error('tieude'){{$message}}@enderror</span>
    <!-- Login Form -->
    <form action="{{route('postLogin')}}" method="POST">
      @csrf
      <input type="text" id="login" class="form-control" name="email" placeholder="email"><br><br>
      <span style="color: red;">@error('email'){{$message}}@enderror</span>
      <input style="background-color:#f6f6f6;width:85%;margin-left: 1.95rem !important;" type="password" id="password" class="form-control ml-4" name="password" placeholder="password"><br>
      <span style="color: red;">@error('password'){{$message}}@enderror</span>
      @if (Route::has('password.request'))
    <a class="btn btn-link" href="{{ route('password.request') }}">
      {{ __('Forgot Your Password?') }}
    </a>
    @endif
     
      <input type="submit" class="fadeIn fourth" value="Log In">
    </form>
<a href="{{route('getRegister')}}">Đăng ký?</a>
    <!-- Remind Passowrd -->
  </div>
</div>