<li {!! $sub ? 'class="treeview '.$active.'"' : ''!!}>
    @if( $sub )
        <a href="{{ BeUrl($url) }}">
            <i class="fa fa-{{ $icon }}"></i> <span>{{ $name }}</span> <i class="fa fa-angle-left pull-right"></i>
        </a>
        {!! $sub !!}
    @else
        <li class="{{ $active }}"><a href="{{ BeUrl($url) }}"><i class="fa fa-{{ $icon }}"></i> <span>{{ $name }}</span> </a></li>
    @endif
</li>