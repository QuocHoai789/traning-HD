@extends('admin.main.master')
@section('name_page')
Add Category
@endsection
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="mx-auto col-8">
        <div class="card">
            <div class="card-body">
                
                    <form method="POST" action="{{route('category.addpost')}}">
                        @csrf
                        <div class="form-group">
                          <label for="formGroupExampleInput">Name Category</label>
                          <input type="text" class="@error('name_cat') is-invalid  @enderror form-control" id="namecategory" name="name_cat" placeholder="Name category">
                        </div>
                        @error('name_cat')
                          <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        <div class="form-group">
                            <label for="formGroupExampleInput">Parent Category</label>
                            <select class="form-control" name="parent">
                                <option value="none">Choose parent category</option>
                                @foreach ($categories as $item)
                                <option id="cat_{{$item->id}}" value="{{$item->id}}">{{$item->name}}</option>    
                                @endforeach
                                
                              </select>
                        </div>
                        <button type="submit" class="btn btn-primary mb-2">Create</button>
                      </form>
            </div>
            <div>
            </div>
    </div>
</div>

@endsection