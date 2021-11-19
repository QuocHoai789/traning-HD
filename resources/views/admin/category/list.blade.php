@extends('admin.main.master')
@section('name_page')
List Category
@endsection
@section('content')
<div class="container-fluid">
    <div class="row" style="margin-bottom: 20px;">
        <div class="col-6 ">
            <div class="search">
                <form class="form" method="get" action="{{route('category.search')}}">
                    <div class="input-group rounded">
                        <input type="search" class="form-control rounded" placeholder="Search" aria-label="Search"
                        aria-describedby="search-addon" name="search_cat" @if(Request::has('search_cat')) value="{{ Request::get('search_cat') }}" @endif />
                        <button type="submit" class="input-group-text border-0" id="search-addon">
                          <i class="fas fa-search"></i>
                        </button>
                      </div>
                  </form>
            </div>
        </div>
        <div class="col-6">
          <a href="{{route('category.add')}}" class="btn btn-primary float-right">Add new category</a>
        </div>
    </div>
    <div class="row">
        
        <div class="mx-auto col-12">
        <div class="card">
            <div class="card-body">
                
                <table class="table table-striped">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Parent</th>
                        <th scope="col"></th>
                      </tr>
                    </thead>
                    <tbody>
                      
                          @foreach ($list_category as $cat)
                          <tr>
                            <th scope="row">{{$cat->id}}</th>
                            <td>{{$cat->name}}</td>
                            <td>
                               
                                    {{implode(' > ', $cat->ancestors->pluck('name')->toArray())}}
                                
                            </td>
                            <td><a type="button" href="{{route('category.edit', ['id'=>$cat->id])}}" class="btn btn-primary" >Edit</a>
                                <a type="button" href="{{route('category.delete',['id'=>$cat->id])}}" class="btn btn-danger">Delete</a>
                            </td>    
                        </tr>  
                          @endforeach
                        
                     
                      
                    </tbody>
                  </table>
            </div>
            {{$list_category->links('pagination::bootstrap-4')}}
            <div>
            </div>
    </div>
</div>
@endsection