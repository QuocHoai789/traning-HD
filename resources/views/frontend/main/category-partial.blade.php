<ul>
    @foreach($childs as $child)
        <li>
     <a href="{{{  url('search/?category='.$child->name.'-'.$child->id.'&q=') }}}">{{{ $child->name }}}</a>
     @if(count($child->children))
     @include('frontend.main.category-partial',['childs' => $child->children])
     @endif
      </li>
    @endforeach
    </ul>