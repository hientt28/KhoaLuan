<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

        <!-- Sidebar user panel (optional) -->
        @if (! Auth::guest())
            <div class="user-panel">
                <div class="pull-left image">
                    <img src="{{ Auth::user()->avatar }}" class="img-circle" alt="User Image" />
                </div>
                <div class="pull-left info">
                    <p>{{ Auth::user()->name }}</p>
                    <!-- Status -->
                    <a href="#"><i class="fa fa-circle text-success"></i> {{ trans('adminlte_lang::message.online') }}</a>
                </div>
            </div>
        @endif

        <!-- search form (Optional) -->
        <form action="{{ url('/search') }}" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="{{ trans('adminlte_lang::message.search') }}..."/>
              <span class="input-group-btn">
                <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>
              </span>
            </div>
        </form>
        <!-- /.search form -->

        <!-- Sidebar Menu -->
        <ul class="sidebar-menu">
            <li> 
                <a href="{{ url('dashboard') }}">
                    <i class='fa fa-dashboard'></i> 
                    <span>{{ trans('label.dashboard') }}</span>
                    
                </a>
            </li>

            <li class="treeview"> 
                <a href="{{ route('columncharts') }}">
                    <i class='fa fa-pie-chart'></i> 
                    <span>{{ trans('label.chart') }}</span>
                    <span class="pull-right-container">
                        <i class='fa fa-angle pull-right'></i>   
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{ route('columncharts') }}">ColumnChart</a></li>
                    <li><a href="{{ route('piecharts') }}">PieChart</a></li>
                </ul>
            </li>

            <li class="treeview">
                <a href="#">
                    <i class='fa fa-th'></i> 
                    <span>{{ trans('label.room') }}</span> 
                </a>
                <ul class="treeview-menu">
                    <li>
                        @if (Auth::check() && Auth::user()->isAdmin())
                        <a href="{{ route('admin.rooms.index') }}">List Room</a>
                        @else
                            <a href="{{ route('rooms.index') }}">List Room</a>
                        @endif
                    </li>       
                </ul>
            </li>
            <li> 
                <a href="{{ route('appliances.index') }}">
                    <i class='fa fa-dashboard'></i> 
                    <span>{{ trans('label.appliance') }}</span>
                    
                </a>
            </li>
            
        </ul><!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>
