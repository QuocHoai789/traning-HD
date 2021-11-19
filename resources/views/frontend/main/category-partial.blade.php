<ul class="submenu dropdown-menu">
    @foreach($childs as $child)
        <li>
     <a class="dropdown-item" href="{{{  url('category/'.$child->id) }}}">{{{ $child->name }}} @if(count($child->children)) &raquo @endif</a>
     @if(count($child->children))
     @include('frontend.main.category-partial',['childs' => $child->children])
     @endif
      </li>
    @endforeach
    </ul>