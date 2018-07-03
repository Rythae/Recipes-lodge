@extends('layouts.app')

@section('content')
<div class="col-md-6 col-lg-6" style="margin: 0 auto;">
<div class="card">
  <div class="card-header text-white bg-primary">Recipes <a class="float-sm-right btn btn-primary" href="/recipes/create">Create recipe</a></div>
  <div class="card-body">
    <p class="card-text">

    <div class="card" style="color: #000;">
    <ul class="list-group list-group-flush">
    @foreach($recipes as $recipe)
    <li class="list-group-item"> <a href="/recipes/{{ $recipe->id }}" >{{ $recipe->title }}</a></li>
    @endforeach
    </ul>
    </div>

  </div>
  </div>
</div>

@endsection

