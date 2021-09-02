<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
<link rel="stylesheet" href="{{asset('/css/style.css')}}">

<nav class="navbar navbar-expand-lg navbar-light ">
<!-- Modal -->
<div id="basicExampleModal" class="modal" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title"> GIỎ HÀNG</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div data-url="{{route('hover')}}" class="modal-body">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
  <a class="navbar-brand" href="/">GHẾ MÂY</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="/">TRANG CHỦ <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{route('tintuc')}}">TIN TỨC</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{route('gioithieu')}}">GIỚI THIỆU</a>
      </li>
      <li class="nav-item">
        <form id="box-cart" action="/search" class="form-inline my-1 my-lg-0 ">
          <input name="query" class="form-control mr-sm-2 " type="search" placeholder="Tìm kiếm" aria-label="Search">
          <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Tìm kiếm</button>
        </form>
      </li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
      <?php
      $quantitytotal = 0;
      ?>
      <li id="carthover">
        @if(Session::has('cart')!=null)
        @foreach(Session::get('cart') as $key=>$v)
        <?php $quantitytotal += $v['quantity'] ?>
        @endforeach
        <a href="#"><img style="width:40px;height:40px;" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcR0gg1AxLgurycTiBjV2CsonBdV-U-2JRkBfA&usqp=CAU" alt="">
          <span id="quantitytotal" style="color:red;">{{$quantitytotal}}</span>
        </a>
        @else <a href="#"><img  style="width: 40px;height:40px;" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcR0gg1AxLgurycTiBjV2CsonBdV-U-2JRkBfA&usqp=CAU" alt="">
          <span id="quantitytotal" style="color:red;">0</span>
        </a>
        @endif
      </li>
    </ul>
    <div id="menu">
    </div>
</nav>
<script src="{{asset('/js/he.js')}}">
</script>
<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
<script>
  $(document).ready(function(event) {
    $("#carthover").hover(function() {
      var url = $(".modal-body").data('url');
      $.ajax({
        url:url,
        type: "GET",
        dataType: "json",
        success: function(data) {
          $(".modal-body").html(data.carthover);
          $('#basicExampleModal').modal();
        }
      });
    });
  });
</script>
<!-- Messenger Plugin chat Code -->
<div id="fb-root"></div>

<!-- Your Plugin chat code -->
<div id="fb-customer-chat" class="fb-customerchat">
</div>

<script>
  var chatbox = document.getElementById('fb-customer-chat');
  chatbox.setAttribute("page_id", "100246141911806");
  chatbox.setAttribute("attribution", "biz_inbox");

  window.fbAsyncInit = function() {
    FB.init({
      xfbml            : true,
      version          : 'v11.0'
    });
  };

  (function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s); js.id = id;
    js.src = 'https://connect.facebook.net/vi_VN/sdk/xfbml.customerchat.js';
    fjs.parentNode.insertBefore(js, fjs);
  }(document, 'script', 'facebook-jssdk'));
</script>