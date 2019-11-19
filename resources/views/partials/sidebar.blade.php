<!-- Left side column. contains the sidebar -->
<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

        <!-- Sidebar user panel (optional) -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="{{ asset("/bower_components/admin-lte/dist/img/user2-160x160.jpg") }}" class="img-circle" alt="User Image" />
            </div>
            <div class="pull-left info">
                <p>{{ ucfirst(Auth::user()->first_name) }} {{ ucfirst(Auth::user()->last_name) }}</p>
                <!-- Status -->
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>

        <!-- search form (Optional) -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search..."/>
<span class="input-group-btn">
  <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>
</span>
            </div>
        </form>
        <!-- /.search form -->

        <!-- Sidebar Menu -->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">MAIN NAVIGATION</li>
            <!-- Optionally, you can add icons to the links -->
            
            <li{{(Request::segment(1) == 'dashboard') ? ' class=active' : ''}}><a href="{{url('/admin-dashboard')}}"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
            {{-- <li{{(Request::segment(1) == 'map-view') ? ' class=active' : ''}}><a href="{{url('/map-view')}}"><i class="fa fa-map"></i> <span>Map Monitoring</span></a></li> --}}
            {{-- <li{{(Request::segment(1) == 'booking-route') ? ' class=active' : ''}}><a href="{{url('/booking-route')}}"><i class="fa fa-address-book"></i> <span>Booking Route</span></a></li> --}}
            {{-- <li{{(Request::segment(1) == 'product') ? ' class=active' : ''}}><a href="{{url('/product')}}"><i class="fa fa-cubes"></i> <span>Product</span></a></li> --}}
            {{-- <li{{(Request::segment(1) == 'outlet') ? ' class=active' : ''}}><a href="{{url('/outlet')}}"><i class="fa fa-building-o"></i> <span>Outlets</span></a></li> --}}
            {{-- <li{{(Request::segment(1) == 'sales') ? ' class=active' : ''}}><a href="{{url('/sales')}}"><i class="fa fa-line-chart"></i> <span>Sales</span></a></li> --}}
            {{-- <li{{(Request::segment(1) == 'invoices') ? ' class=active' : ''}}><a href="{{url('/invoices')}}"><i class="fa fa-fax"></i> <span>Invoices</span></a></li> --}}
            <li{{(Request::segment(1) == 'carwash') ? ' class=active' : ''}}><a href="{{url('/carwash')}}"><i class="fa fa-car"></i> <span>Carwash</span></a></li>
            <li{{(Request::segment(1) == 'mechanic') ? ' class=active' : ''}}><a href="{{url('/mechanic')}}"><i class="fa fa-users"></i> <span>Mechanic</span></a></li>
            <li{{(Request::segment(1) == 'towing') ? ' class=active' : ''}}><a href="{{url('/towing')}}"><i class="fa fa-ticket"></i> <span>Towing</span></a></li>
            {{-- <li{{(Request::segment(1) == 'vehicles') ? ' class=active' : ''}}><a href="{{url('/vehicles')}}"><i class="fa fa-truck"></i> <span>Vehicles</span></a></li> --}}
        </ul><!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>