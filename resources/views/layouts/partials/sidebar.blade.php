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
        <form action="#" method="get" class="sidebar-form">
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

            <li class="treeview active"> 
                <a href="#">
                    <i class='fa fa-pie-chart'></i> 
                    <span>{{ trans('label.chart') }}</span>
                    <span class="pull-right-container">
                        <i class='fa fa-angle-left pull-right'></i>   
                    </span>
                </a>
                <ul class="treeview-menu menu-open" style="display:block;">
                    <li><a>Chart 1</a></li>
                    <li><a>Chart 2</a></li>

                </ul>
            </li>

            <li class="treeview">
                <a href="#">
                    <i class='fa fa-th'></i> 
                    <span>{{ trans('label.room') }}</span> 
                </a>
                <ul class="treeview-menu">
                    
                        <li><a href="{{ route('appliances.index') }}">AA</a></li>
                    
                    
                    <!-- <li><a href="#">{{ trans('adminlte_lang::message.linklevel2') }}</a></li> -->
                </ul>
            </li>
            <li><a href="#">
                <i class="glyphicon glyphicon-time"></i> 
                <span>{{ trans('label.schedule') }}</span>
                </a>
            </li>

            <li><a href="#">
                <i class="glyphicon glyphicon-list-alt"></i> 
                <span>{{ trans('label.report') }}</span>
                </a>
            </li>
            
        </ul><!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>
