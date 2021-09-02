@extends('master')
@section('content')
<div class="container">
<div class="row">
<div class="col-sm-12">
<h3>{{$showtintuc->title}}</h3>
{!!$showtintuc->content!!}
</div>
</div>
</div>
@endsection