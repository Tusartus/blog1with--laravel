@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
      @if(count($errors) > 0)
           @foreach($errors->all() as $error)
                 <div class="alert alert-danger">{{$error}}</div>
           @endforeach
      @endif
      <!--  success mesage on response -->
      @if(session('response'))
      <div class="alert alert-success">{{session('response')}}</div>
      @endif
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"> Edit Post</div>

                <div class="card-body">

                    <form method="POST" action="{{ url('/editPost', array($posts->id)) }}" enctype="multipart/form-data">
                      {{ csrf_field() }}

                      <div class="form-group row {{ $errors->has('post_title') ? 'has_error' : '' }}">
                          <label for="title" class="col-md-4 col-form-label text-md-right"> Title: </label>
                          <div class="col-md-6">
                              <input id="post_title" type="text" class="form-control"
                               name="post_title" value="{{ $posts ->post_title }}" required>

                              @if($errors->has('post_title'))
                                  <span class="help-block">
                                      <strong>{{ $errors->first('post_title') }}</strong>
                                  </span>
                              @endif
                          </div>
                      </div>
                      <div class="form-group row {{ $errors->has('post_body') ? 'has_error' : '' }}">
                          <label for="post_body" class="col-md-4 col-form-label text-md-right"> Body: </label>
                          <div class="col-md-6">
                              <textarea id="post_body" type="text" class="form-control" rows="5"

                              name="post_body"  > {{ $posts ->post_body }}</textarea>

                              @if($errors->has('post_body'))
                                  <span class="help-block">
                                      <strong>{{ $errors->first('post_body') }}</strong>
                                  </span>
                              @endif
                          </div>
                      </div>
                      <div class="form-group row {{ $errors->has('category_id') ? 'has_error' : '' }}">
                          <label for="category" class="col-md-4 col-form-label text-md-right"> Category: </label>
                          <div class="col-md-6">
                            <select class="form-control" type="category_id" name="category_id" id="sel1">
                                           <option value="{{ $category -> id }}">{{ $category ->category }}</option>

                                            @if(count($categories) > 0)

                                           @foreach($categories->all() as $category)
                                            <option value="{{ $category->id }}">{{$category->category }}</option>

                                           @endforeach

                                           @endif



                            </select>

                              @if($errors->has('category_id'))
                                  <span class="help-block">
                                      <strong>{{ $errors->first('category_id') }}</strong>
                                  </span>
                              @endif
                          </div>
                      </div>
                      <div class="form-group row {{ $errors->has('post_image') ? 'has_error' : '' }}">
                          <label for="post_image" class="col-md-4 col-form-label text-md-right"> Featured Image: </label>
                          <div class="col-md-6">
                              <input id="post_image" type="file" class="form-control" name="post_image" value="{{ old('post_image') }}" required>

                              @if($errors->has('post_image'))
                                  <span class="help-block">
                                      <strong>{{ $errors->first('post_image') }}</strong>
                                  </span>
                              @endif
                          </div>
                      </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    add Post
                                </button>

                            </div>
                        </div>
                    </form>




                </div>
            </div>
        </div>
    </div>
</div>
@endsection
