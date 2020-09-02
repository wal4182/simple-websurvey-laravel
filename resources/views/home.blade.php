@extends('layouts.app')

@section('content')
@if ($message = Session::get('success'))
<div class="alert alert-success alert-block text-center">
  <button type="button" class="close" data-dismiss="alert">×</button>
  {{ $message }}
</div>
@endif
<div class="header">
  <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 text-center m-auto">
    <h1 id="title" class="text-center">Welcome To Foodnesia</h1>
    <p id="description">Lorem ipsum dolor sit amet consectetur adipisicing elit. Qui totam deleniti optio
      accusamus reiciendis neque id, incidunt consequuntur ea rem, facilis quae explicabo ex ratione quisquam
      facere voluptates a. Quaerat!</p>
  </div>
</div>
@endsection
