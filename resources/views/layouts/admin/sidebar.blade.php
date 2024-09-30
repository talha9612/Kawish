<aside id="left-panel" class="left-panel">
    <nav class="navbar navbar-expand-sm navbar-default">
        <div id="main-menu" class="main-menu collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li class="active">
                    <a href="{{url('admin')}}"><i class="menu-icon fa fa-laptop"></i>Dashboard </a>
                </li>
                <li >
                    <a href="{{url('admin/surveyed')}}"><i class="menu-icon fa fa-eye"></i>Surveyed </a>
                </li>
                <li >
                    <a href="{{url('admin/project')}}"><i class="menu-icon fa fa-list"></i>Projects </a>
                </li>
                <li >
                    <a href="{{route('donors.index')}}"><i class="menu-icon fa fa-user"></i>Donors / Users </a>
                </li>
                {{-- <li class="menu-title">UI elements</li> --}}
                {{-- <li class="menu-item-has-children dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-cogs"></i>Components</a>
                    <ul class="sub-menu children dropdown-menu">                            <li><i class="fa fa-puzzle-piece"></i><a href="ui-buttons.html">Buttons</a></li>
                        <li><i class="fa fa-id-badge"></i><a href="ui-badges.html">Badges</a></li>
                        <li><i class="fa fa-bars"></i><a href="ui-tabs.html">Tabs</a></li>
                    </ul>
                </li> --}}
            </ul>
        </div><!-- /.navbar-collapse -->
    </nav>
</aside>