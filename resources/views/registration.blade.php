@extends('layout')
@section('content')
@section('title','Registration')
<div class="container">
<form action="{{route('register.post')}}" method="POST" class="ms-auto me-auto mt-3" style="width:500px" >
@csrf
  <div class="mb-3">
    <label  class="form-label">User Name</label>
    <input type="text" class="form-control" name="name">
    
  </div>
  <div class="mb-3">
    <label class="form-label">Email address</label>
    <input type="email" class="form-control" name="email">
    
  </div>
  <div class="mb-3">
    <label class="form-label">Password</label>
    <input type="password" class="form-control" name="password">
  </div>
 
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>
@endsection