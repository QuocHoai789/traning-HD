@extends('admin.main.master')
@section('name_page')
Edit Category
@endsection
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="mx-auto col-8">
        <div class="card">
            <div class="card-body">
                
                    <form method="POST" action="{{route('category.postedit', ['id'=> $category->id])}}">
                        @csrf
                        <div class="form-group">
                          <label for="formGroupExampleInput">Name Category</label>
                          <input type="text" class="form-control" id="namecategory" name="name_cat" value="{{$category->name}}">
                        </div>
                        <div class="form-group">
                            <label for="formGroupExampleInput">Parent Category</label>
                            <select class="form-control" name="parent">
                                <option value="none">Choose parent category</option>
                                @foreach ($categories as $item)
                                @if($item->id != $category->id)
                                <option id="cat_{{$item->id}}" value="{{$item->id}}" @if($category->parent_id == $item->id) selected @endif>{{$item->name}}</option>    
                                @endif
                                @endforeach
                                
                              </select>
                        </div>
                        <button type="submit" class="btn btn-primary mb-2">Save</button>
                      </form>
            </div>
            <div>
            </div>
    </div>
</div>

@endsection