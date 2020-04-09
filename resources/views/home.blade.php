@extends('layouts.app')
<style type="text/css">
   .avatar{
     border-radius: 100%;
     max-width: 100px;

   }


</style>
@section('content')
<div class="container">
    <div class="row">

         <div class="col-md-12">
           <div class="jumbotron">
     <h1>Bootstrap Tutorial</h1>
     <p>Bootstrap is the most popular HTML, CSS...</p>
     <center>

       <form method="POST" action="{{ url('/search')}}">
         {{ csrf_field() }}

         <div class="form-group row {{ $errors->has('search') ? 'has_error' : '' }}">

             <div class="col-md-6">

              <input class="form-control" type="text" class="form-control" name="search" >

                 @if($errors->has('search'))
                     <span class="help-block">
                         <strong>{{ $errors->first('search') }}</strong>
                     </span>
                 @endif
            </div>
         </div>

           <div class="form-group row mb-0">
               <div class="col-md-8">
                   <button type="submit" class="btn btn-primary">
                       Go
                   </button>

               </div>
           </div>
       </form>


     </center>

   </div>

         </div>
  <div class="col-md-12 h-25">
          @if(count($errors) > 0)
               @foreach($errors->all() as $error)
                     <div class="alert alert-danger">{{$error}}</div>
               @endforeach
          @endif
          <!--  success mesage on response -->
          @if(session('response'))
          <div class="alert alert-success">{{session('response')}}</div>
          @endif
 </div>



                <div class="col-md-4 px-4">
                  <div class="card">

           @if(!empty($profile))
           <img src="{{ url($profile->profile_pic) }}" class="avatar" alt="" >

           @else
          <img src="{{ url('images/avatar.png') }}" class="avatar" alt="" >
           @endif

           @if(!empty($profile))
           <p class="display-6">{{ $profile->name }}</p>
            <p>{{ $profile->designation }}</p>

           @else
           <p class="display-6">No information available</p>

           @endif

   <br><br>

                </div>
                </div>
                <div class="col-md-8">
                  <!-- dispaly post  -->
                  @if(count($posts) > 0)
                  @foreach($posts->all() as $post)

                  <h4>{{ $post->post_title}}</h4>
                  <img class="img-responsive" src="{{ $post->post_image }}" alt="" width="100%" height="250">
                  <p> {{ substr($post->post_body, 0,150) }}  </p>
                  <br>
                  <ul class="nav justify-content-center">
   @if(Auth::id()==1) <!--  login as admin only -->
<li class="nav-item  bg-info mr-3">
  <a class="nav-link text-white" href="{{ url("/edit/{$post->id}") }}">
    <i class="fa fa-edit" style="font-size:28px;color:red"></i>EDIT</a>
</li>

<li class="nav-item  bg-danger  mr-3">
  <a class="nav-link text-white" href="{{ url("/delete/{$post->id}") }}">
    <i class="fa fa-trash-o " style="font-size:28px"></i>DELETE</a>
</li>
 @endif

<li class="nav-item  bg-info  mr-3">
  <a class="nav-link text-white" href="{{ url("/view/{$post->id}") }}">
    <i class="fa fa-eye " style="font-size:28px"></i>VIEW</a>
</li>





  </ul>
                  <cite class="float-right mt-4">Posted on: {{ date('M j, Y H:i', strtotime($post ->updated_at) )}}     </cite>
                    <br>  <br>
                  <hr>


                  @endforeach
               @else
               <p>  No Post available</p>
               @endif

               <!--pagination  -->
               {{$posts->links()}}
                </div>



    </div>
</div>
@endsection
