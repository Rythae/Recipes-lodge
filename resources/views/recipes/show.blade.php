@extends('layouts.app')

@section('content')

      <div class="col-md-9 col-lg-9 col-sm-9 float-sm-left">
      <div class="jumbotron">
        <h1>{{ $recipe->title }}</h1>
        <p class="lead">{{ $recipe->description }}</p>
      </div>
    </div>

    <div class="col-sm-3 col-md-3 col-lg-3 float-sm-right">
    
          <div class="sidebar-module">
            <h4><a href="/recipes/create" class="btn btn-primary">Create recipe</a></h4>
            <ol class="list-unstyled">
              <li><a href="/recipes/{{ $recipe->id }}/edit">Edit</a></li>
              <li><a href="/recipes">View recipes</a></li>
              <li>
              
              <a
              href="#"
                onclick="
                var result = confirm('Are you sure you want to delete this recipe?');
                if( result ){
                        event.preventDefault();
                        document.getElementById('delete-form').submit();
                }   
                  "
                  >
                Delete
              </a>

              <form id='delete-form' action="{{ route('recipes.destroy', [$recipe->id]) }}"
                method="POST" style="display: none;">
                        <input type="hidden" name="_method" value="delete">
                        {{ csrf_field() }}
              </form>

              </li>
            </ol>
          </div>
        </div>
        <br/>


        {{-- <div class="col-md-9 col-lg-9 col-sm-9" style="margin: 0;">
        <form method="post" action="{{ route('recipes.store') }}">
                            {{ csrf_field() }}
                        
                            <input type="hidden" name="commentable" value="Recipe">
                            <input type="hidden" name="commentable_id" value="{{ $recipe->id}}">


                            <div class="form-group">
                            <label for="comment-content">Comment</label>
                            <textarea placeholder="Enter comment"
                                    style="resize: vertical"
                                    id="comment-content"
                                    name="body"
                                    rows="3" spellcheck="false"
                                    class="form-control autosize-target text-left">
                    
                            </textarea>
                            </div>
                            <div class="form-group">
                            <input type="submit" class="btn btn-primary"
                                value="Submit"/>
                            </div>
            </form>
        </div> --}}
    @endsection