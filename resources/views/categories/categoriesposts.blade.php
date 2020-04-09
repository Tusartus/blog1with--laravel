
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
  

                  <cite class="float-right mt-4">Posted on: {{ date('M j, Y H:i', strtotime($post ->updated_at) )}}     </cite>
                    <br>  <br>
                  <hr>


                  @endforeach
               @else
               <p>  No Post available</p>
               @endif






               </div>
    </div>
</div>
@endsection
