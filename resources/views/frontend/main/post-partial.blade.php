@foreach ($cat as $pos) 

@foreach ($pos as $post)
<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
    <div class="card card-small">
        <div class="thumbnail">           
                <img alt="Opt alp thumbnail" src="{{asset('storage/posts/'. $post['images'])}}">
                {{-- <a href="{{route('post.view', ['id'=>$post['id']])}}">
                    <div class="thumb-cover"></div>
                </a>             --}}
                <div class="details">
                <div class="user">
                     <div class="user-photo">
                          <img alt="Thumb" src="https://bootdey.com/img/Content/avatar/avatar1.png">
                     </div>
                     <div class="name">User </div>
                </div> 
                <div class="numbers">
                        {{-- <b class="downloads"><i class="fa fa-arrow-circle-o-down"></i> 1124</b> --}}
                    <b class="comments-icon"><i class="fa fa-eye"></i>{{$post['view']}}</b>
                </div>
                <div class="clearfix"></div>
            </div>            
        </div>
        <div class="card-info">
            <div class="moving">
                {{-- <a href="{{route('post.view', ['id'=>$post['id']])}}">
                    <h3>{{$post['title']}}</h3>
                    <p>Be happy with this awesome product, bootstrap rules, hit the ground with the power.</p>
                </a>                 --}}
                {{-- <b class="actions">
                    <a href="{{route('post.view', ['id'=>$post['id']])}}">Details</a>
                    <b class="separator">|</b>
                    <a class="blue-text" href="#/live/awesome-landing-page" target="_blank">Live Preview</a>
                </b> --}}
            </div>
        </div>
    </div>
</div>
@endforeach
@if(count($pos->children))
@include('frontend.main.post-partial',['cat' => $pos->children] )
@endif
        @endforeach
       