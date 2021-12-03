@extends('admin.main.master')
@section('name_page')
    Edit Post
@endsection
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="mx-auto col-12">
                <div class="card">
                    <div class="card-body">
                        <h1 class="change-message">Thay đổi</h1>
                        <form method="POST" class="form_edit_post" data-id="{{$post->id}}"
                            action="{{ route('post.post.edit', ['id' => $post->id]) }}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="formGroupExampleInput">Parent Category</label>
                                <select id="cat_post" class=" js-example-basic-single form-control" name="parent[]" multiple>
                                    <option value="none">Choose parent category</option>
                                    @foreach ($categories as $item)
                                        <option id="cat_{{ $item->id }}" value="{{ $item->id }}"
                                            @if (in_array($item->id, $category)) selected @endif>{{ $item->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="formGroupExampleInput">Title Post</label>
                                <input type="text" class="@error('title_post') is-invalid @enderror form-control"
                                    id="namecategory" name="title_post" value="{{ $post->title }}"
                                    placeholder="Title post">
                            </div>
                            @error('title_post')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            <div class="form-group">
                                <label for="exampleFormControlFile1">Image</label>
                                <input type="file" name="image" class="form-control-file" accept=".jpg, .jpeg, .png"
                                    id="images" value="{{ $post->images }}">
                            </div>
                            @error('image')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            <div class="form-group">
                                <label for="formGroupExampleInput">Description Post</label>
                                <textarea name="description"
                                    class="ckeditor  @error('description') is-invalid @enderror  form-control "
                                    id="descript" cols="30" rows="10">{{ $post->description }}</textarea>
                            </div>
                            @error('description')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            <div class="form-group">
                                <label for="formGroupExampleInput">Content Post</label>
                                <textarea name="content"
                                    class="ckeditor  @error('content') is-invalid @enderror  form-control "
                                    id="content" cols="30" rows="10">{{ $post->content }}</textarea>
                            </div>
                            @error('content')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            <button type="submit" class="btn btn-primary mb-2">Save</button>
                        </form>
                    </div>
                    <div>
                    </div>
                </div>
            </div>

        @endsection
       