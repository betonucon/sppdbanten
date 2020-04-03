<ul class="sidebar-menu" data-widget="tree">
        <li>
          <a href="{{url('/')}}">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
          </a>
        </li>
        <li class="header">MENU</li>
        
        @foreach(menu() as $menu)
          @if($menu->route_id==6)
            <li class="treeview menu-open" style="height: auto;">
              <a href="#">
                <i class="fa fa-{{acces($menu->route_id)->icon}}"></i>
                <span>{{acces($menu->route_id)->name}}</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu" style="display: block;">
                @foreach(sub_menu() as $sub)
                <li><a href="{{url(acces($sub->route_id)->link)}}"><i class="fa fa-check"></i> {{acces($sub->route_id)->name}}</a></li>
                @endforeach
              </ul>
            </li>
          @else
            <li>
              <a href="{{url(acces($menu->route_id)->link)}}">
                <i class="fa fa-{{acces($menu->route_id)->icon}}"></i> <span>{{acces($menu->route_id)->name}}</span>
              </a>
            </li>
          @endif
        @endforeach
        
      </ul>