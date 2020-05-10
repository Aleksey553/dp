<li class="nav-item has-treeview {{$menuOpen}}">
    <a href="#" class="nav-link  {{$menuActive}}">
        <i class="nav-icon fas fa fa fa-plus-circle"></i>
        <p>
            {{$mainTitle}}
            <i class="right fas fa-angle-left"></i>
        </p>
    </a>
    <ul class="nav nav-treeview">
        @component('admin.components.nav-item.nav-item')
            @slot('activeIndex'){{$activeIndex}}  @endslot
            @slot('activeCreate') {{$activeCreate}} @endslot
            @slot('routeIndex') {{$routeIndex}}  @endslot
            @slot('routeCreate') {{$routeCreate}} @endslot
            @slot('nameIndex') {{$nameIndex}}  @endslot
            @slot('nameCreate') {{$nameCreate}}  @endslot
        @endcomponent
    </ul>
</li>
