@extends('admin.main.master')
@section('name_page')
Add Post
@endsection
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="mx-auto col-12">
        <div class="card">
            <div class="card-body">
                
                    <form method="POST" action="{{route('post.addpost')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="formGroupExampleInput">Parent Category</label>
                            <select id="cat_post" class=" js-example-basic-single form-control" name="parent[]" multiple>
                                <option value="none">Choose parent category</option>
                                @foreach ($categories as $item)
                                <option id="cat_{{$item->id}}" value="{{$item->id}}">{{$item->name}}</option>    
                                @endforeach
                                
                              </select>
                        </div>
                        
                        <div class="form-group">
                          <label for="formGroupExampleInput">Title Post</label>
                          <input type="text" class="@error('title_post') is-invalid @enderror form-control" id="namecategory" name="title_post" placeholder="Title post" value="{{ old('title_post') }}">
                        </div>
                        @error('title_post')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <div class="form-group">
                          <label for="exampleFormControlFile1">Image</label>
                          <input type="file" name="image" class="form-control-file" accept=".jpg, .jpeg, .png" id="images">
                        </div>
                        @error('image')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <div class="form-group">
                      <label for="formGroupExampleInput">Description Post</label>
                      <textarea name="description" class="ckeditor  @error('description') is-invalid @enderror  form-control " id="validationTextarea"  cols="30" rows="10">{{old('description')}}</textarea>
                    </div>
                    @error('description')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                        <div class="form-group">
                            <label for="formGroupExampleInput">Content Post</label>
                            <textarea name="content" class="ckeditor  @error('content') is-invalid @enderror  form-control " id="validationTextarea"  cols="30" rows="10">{{old('content')}}</textarea>
                          </div>
                          @error('content')
                          <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        <button type="submit" class="btn btn-primary mb-2">Create</button>
                      </form>
            </div>
            <div>
            </div>
    </div>
</div>

@endsection