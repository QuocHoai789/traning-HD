@extends('admin.main.master')
@section('name_page')
List Inactive User
@endsection
@section('content')
<div class="container-fluid">
    <div class="row" style="margin-bottom: 20px;">
        @if(\Session::has('nofitication'))
        <div class="col-12">
            <div class="alert alert-success" role="alert">
                {!! \Session::get('nofitication') !!}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
              </div>
        </div>
        @endif
        
        <div class="col-5 ">
            <div class="search">
                <form class="form" method="get" action="{{route('post.search')}}">
                  
                    <div class="input-group rounded">
                        <input type="search" class="form-control rounded" placeholder="Search" aria-label="Search"
                        aria-describedby="search-addon" name="search_post" />
                        <button type="submit" class="input-group-text border-0" id="search-addon">
                          <i class="fas fa-search"></i>
                        </button>
                      </div>
                    
                  </form>
            </div>
        </div>
        <div class="col-6 ">
          
          <a  href="{{route('user.send_mail_queue')}}" class="btn btn-primary float-right">Send mail </a>
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
                        
                        {{-- <th scope="col">Content</th> --}}
                        <th scope="col">Email</th>
                        <th scope="col">Status</th>
                        {{-- <th>Voucher Enabled</th>
                        <th>Voucher Quantily</th>
                        <th scope="col">Author</th>
                        <th scope="col"></th> --}}
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($inactiveUsers as $user)
                          <tr>
                              <th scope="row"></th>
                              <td>{{$user->email}}</td>
                              <td>
                                  {{$user->status}}
                              </td>
                          </tr>
                      @endforeach
                          {{-- @foreach ($list_post as $post)
                          <tr>
                            <th scope="row">{{$post->id}}</th>
                            <td>{{$post->title}}</td>
                           
                            <td>
                              @foreach ($post->category as $cat)
                              {{ $cat->name }}
                                
                            @endforeach
                            </td>
                            <td>
                              <div class="custom-control custom-switch">
                                <input type="checkbox" name="vou_post_{{$post->id}}" data-id="{{$post->id}}" class="voucher_post" @if($post->voucher_enabled == 1)checked @endif data-toggle="toggle">
                              </div>
                            </td>
                            <td class="mx-auto">
                              <input type="number" class="voucher_quantily" name="quantily_vou{{$post->id}}" data-id="{{$post->id}}" value="{{$post->voucher_quantity}}">
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
                          @endforeach --}}
                        
                     
                      
                    </tbody>
                  </table>
            </div>
            
            <div>
            </div>
    </div>
</div>
@endsection