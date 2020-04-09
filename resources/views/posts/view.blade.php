@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">


      <div class="col-md-12">
        <div class="jumbotron">
  <h1>Bootstrap Tutorial</h1>
  <p>Bootstrap is the most popular HTML, CSS...</p>
</div>

      </div>
<hr>


                 <div class="col-md-2">
                 <div class="card">

                 <div class="card-body">
                   <ul class="nav flex-column">
                     @if(count($categories) > 0)
                        @foreach($categories ->all() as $category)
                         <li class="nav-item py-1">
                          <a class="nav-link" href="{{ url("category/{$category->id }")}}"> {{$category->category }}</a>
                        </li>
                        @endforeach


                     @else
               <p> No category found    </p>
                     @endif

               </ul>

                 </div>
                 </div>
                 </div>
                <div class="col-md-9">


                  <!-- dispaly post  -->
                  @if(count($posts) > 0)
                  @foreach($posts->all() as $post)

                  <h4>{{ $post->post_title}}</h4>
                  <img class="img-responsive mb-4" src="{{ $post->post_image }}" alt="" width="100%" height="250">
                  <p> {{ $post->post_body }}  </p>
                  <br>
                  <ul class="nav justify-content-center">
    <li class="nav-item mr-3">
      <a class="nav-link text-dark" href="{{ url("/like/{$post->id}") }}">
        <i class="fa fa-thumbs-up" style="font-size:24px"></i>Like ({{$likeCtr}})</a>
    </li>
    <li class="nav-item    mr-3">
      <a class="nav-link  text-dark" href="{{ url("/dislike/{$post->id}") }}">
   <i class="fa fa-thumbs-down" style="font-size:36px"></i>Dislike ({{$dislikeCtr}})</a>
    </li>
    <li class="nav-item mr-3">
      <a class="nav-link text-dark" href="{{ url("/comment/{$post->id}") }}">
        <i class="fa fa-comments-o" style="font-size:24px"></i>Comment</a>
    </li>

  </ul>

                  <cite class="float-right mt-4">Posted on: {{ date('M j, Y H:i', strtotime($post ->updated_at) )}}     </cite>
                    <br>  <br>
                  <hr>


                  @endforeach
               @else
               <p>  No Post available</p>
               @endif
        <div class="row">
    <div class="col-md-12 ">
               <form method="POST" action="{{ url("/comment/{$post->id}")}}">
                 {{ csrf_field() }}
                 <div class="form-group {{ $errors->has('comment') ? 'has_error' : '' }}">

                     <div class="col-md-6 form-group">
                         <textarea id="comment" type="text" class="form-control"
                         rows="5" name="comment"  required></textarea>
                     </div>
                 </div>
                 @if($errors->has('comment'))
                     <span class="help-block">
                         <strong>{{ $errors->first('comment') }}</strong>
                     </span>
                 @endif
                  <div class="form-group row mb-0 mt-3">
                       <div class="col-md-8 offset-md-4">
                           <button type="submit" class="btn btn-primary w-25">
                               Post Comment
                           </button>
                       </div>
                  </div>
               </form>
  </div>  </div>
<div class="text mt-5">
 <center> Comments  <center>
<hr>
<!-- dispaly comments  -->
@if(count($comments) > 0)
     @foreach($comments->all() as $comment)
  <p>{{$comment->comment}} </p>
  <p> Posted by :{{$comment->name}} </p>
  <hr>
     @endforeach
@else

<p>  No comment available</p>
@endif



</div>



               </div>
    </div>
</div>
@endsection
