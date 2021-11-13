@extends('admin.main.master')
@section('name_page')
Result Post Search
@endsection
@section('content')
<div class="container-fluid">
    <div class="row" style="margin-bottom: 20px;">
        <div class="col-5 ">
            <div class="search">
                <form class="form" method="get" action="{{route('post.search')}}">
                  
                    <div class="input-group rounded">
                        <input type="search" class="form-control rounded" placeholder="Search" aria-label="Search"
                        aria-describedby="search-addon" name="search_post" @if(Request::has('search_post')) value="{{ Request::get('search_post') }}" @endif />
                        <button type="submit" class="input-group-text border-0" id="search-addon">
                          <i class="fas fa-search"></i>
                        </button>
                      </div>
                    
                  </form>
            </div>
        </div>
        <div class="col-6">

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
                        <th scope="col">Title</th>
                        <th scope="col">Content</th>
                        <th scope="col">Author</th>
                        <th scope="col"></th>
                      </tr>
                    </thead>
                    <tbody>
                      
                          @foreach ($result as $post)
                          <tr>
                            <th scope="row">{{$post->id}}</th>
                            <td>{{$post->title}}</td>
                            <td>
                               
                                   {{$post->content}}
                                
                            </td>
                            <td>{{$post->author->name}}</td>
                            <td>
                                @if(Auth::guard('admin')->user()->can('update', $post))
                                <a type="button" href="{{route('post.edit', ['id'=> $post->id])}}" class="btn btn-primary" >Edit</a>
                               @endif
                               @if(Auth::guard('admin')->user()->can('delete', $post))
                                <a type="button" class="btn btn-danger">Delete</a>
                                @endif
                            </td>    
                        </tr>  
                          @endforeach
                        
                     
                      
                    </tbody>
                  </table>
            </div>
            
            <div>
            </div>
    </div>
</div>
@endsection