<!doctype html>
<html lang="en">
  <head>
    <title>add anh</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>
  @include('home')
  <a class="btn btn-info" href="{{route('themthuvien')}}"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-lg" viewBox="0 0 16 16">
  <path d="M8 0a1 1 0 0 1 1 1v6h6a1 1 0 1 1 0 2H9v6a1 1 0 1 1-2 0V9H1a1 1 0 0 1 0-2h6V1a1 1 0 0 1 1-1z"/>
</svg> ADD</a>
  <div class="container">
      <div class="row">
      
  <table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">ten anh</th>
      <th scope="col">up anh</th>
      <th scope="col">id san pham</th>
      <th scope="col">chuc nang</th>
    </tr>
  </thead>
  <tbody>
    <tr>

    @foreach($sanpham->galerry as $v)
      <th scope="row">{{$pro_id}}</th>
      <td>{{$v->galerry_name}}</td>
      <td> <img src="{{$v->image}}" alt=""></td>
   </td>
      <td>{{$v->id}}</td>
      <td>
<a class="btn btn-danger" href="{{route('xoaanh',$v->galery_id)}}"><svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
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
   
  </body>
</html>