        @extends('frontend.main.master')        
        @section('content')
        <!-- Section-->
            {{-- <div class="container px-4 px-lg-5 mt-5">
                <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
                   @foreach ($posts as $post) --}}
                   {{-- <div class="col mb-5">
                    <div class="card h-100">
                        <!-- Product image-->
                        <img class="card-img-top" src="{{asset('storage/posts/'. $post->images)}}" alt="..." />
                        <!-- Product details-->
                        <div class="card-body p-4">
                            <div class="text-center">
                                <!-- Product name-->
                                <h5 class="fw-bolder">{{$post->title}}</h5>
                                <!-- Product price-->
                                
                            </div>
                        </div>
                        <!-- Product actions-->
                        <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                            <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="{{route('post.view', ['id'=>$post->id])}}">View more</a></div>
                        </div>
                    </div>
                </div> --}}
                {{-- test --}}
                
                {{-- end test --}}
                   {{-- @endforeach
                    
                    
                </div>
            </div> --}}
            <div class="container">
                <div class="row">
                    @foreach ($posts as $post) 
                <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                    <div class="card card-small">
                        <div class="thumbnail">           
                                <img alt="Opt alp thumbnail" src="{{asset('storage/posts/'. $post->images)}}">
                                <a href="{{route('post.view', ['id'=>$post->id])}}">
                                    <div class="thumb-cover"></div>
                                </a>            
                                <div class="details">
                                <div class="user">
                                     <div class="user-photo">
                                          <img alt="Thumb" src="https://bootdey.com/img/Content/avatar/avatar1.png">
                                     </div>
                                     <div class="name">User </div>
                                </div> 
                                <div class="numbers">
                                        {{-- <b class="downloads"><i class="fa fa-arrow-circle-o-down"></i> 1124</b> --}}
                                    <b class="comments-icon"><i class="fa fa-eye"></i>{{$post->view}}</b>
                                </div>
                                <div class="clearfix"></div>
                            </div>            
                        </div>
                        <div class="card-info">
                            <div class="moving">
                                <a href="{{route('post.view', ['id'=>$post->id])}}">
                                    <h3>{{$post->title}}</h3>
                                    <p>Be happy with this awesome product, bootstrap rules, hit the ground with the power.</p>
                                </a>                
                                <b class="actions">
                                    <a href="{{route('post.view', ['id'=>$post->id])}}">Details</a>
                                    <b class="separator">|</b>
                                    <a class="blue-text" href="#/live/awesome-landing-page" target="_blank">Live Preview</a>
                                </b>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
                </div>
                </div>
        
        @endsection
        <!-- Footer-->
        
