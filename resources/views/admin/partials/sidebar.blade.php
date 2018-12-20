<div class="fixed-sidebar-left">
    <ul class="nav navbar-nav side-nav nicescroll-bar">
        <li class="navigation-header">
            <span>Main</span> 
            <i class="zmdi zmdi-more"></i>
        </li>
        
        <li>
            <a class="{{Request::is('admin/dashboard') ? 'active-page': ''}}" href="{{route('dashboard')}}"><i class="fa fa-dashboard mr-20"></i>Dashboard</a>  
        </li>
        <li>
            <a class="{{Request::is('admin/car') ? 'active-page': ''}}" href="{{route('car.index')}}"><i class="fa fa-car mr-20"></i>Cars</a>  
        </li>
        @if(Auth::user()->is_admin())
        <li>
            <a class="{{Request::is('admin/location') ? 'active-page': ''}}" href="{{route('location.index')}}"><i class="fa fa-map mr-20"></i>Locations</a>  
        </li>
        <li>
            <a class="{{Request::is('admin/employee') ? 'active-page': ''}}" href="{{route('employee.index')}}"><i class="fa fa-users mr-20"></i>Employees</a>  
        </li>
        <li>
            <a class="{{Request::is('admin/route') ? 'active-page': ''}}" href="{{route('route.index')}}"><i class="fa fa-road mr-20"></i>Routes</a>  
        </li>
        <li>
            <a class="{{Request::is('admin/counter') ? 'active-page': ''}}" href="{{route('counter.index')}}"><i class="fa fa-industry mr-20"></i>Counters</a>  
        </li>
        @endif
        <li>
            <a class="{{Request::is('admin/coach') ? 'active-page': ''}}" href="{{route('coach.index')}}"><i class="fa fa-bus mr-20"></i>Coaches</a>  
        </li>
        @if(Auth::user()->in_counter())
        <li>
            <a class="{{Request::is('admin/seat_booking') ? 'active-page': ''}}" href="{{route('seat_booking')}}"><i class="fa fa-recycle mr-20"></i>Seat Booking</a>  
        </li>
        @endif
        @if(Auth::user()->is_admin())
        <li><hr class="light-grey-hr mb-10"/></li>
        <li class="navigation-header">
            <span>Accounts</span> 
            <i class="zmdi zmdi-more"></i>
        </li>
        <li><a class="{{Request::is('admin/payment') ? 'active-page': ''}}" href="{{route('payment')}}"><i class="fa fa-money mr-20"></i> Payment</a></li>
        <li><a class="{{Request::is('admin/cost_category') ? 'active-page': ''}}" href="{{route('cost_category.index')}}"><i class="fa fa-list-alt mr-20"></i> Cost Category</a></li>
        <li><a class="{{Request::is('admin/cost') ? 'active-page': ''}}" href="{{route('cost.index')}}"><i class="fa fa-usd mr-20"></i> Costs</a></li>
        
        <li><hr class="light-grey-hr mb-10"/></li>
        <li class="navigation-header">
            <span>Report</span> 
            <i class="zmdi zmdi-more"></i>
        </li>
        <li>
            <a class="{{Request::is('admin/sales-report') ? 'active-page': ''}}" href="{{route('sales_report')}}"><i class="fa fa-bar-chart mr-20"></i> Sales Report</a>
        </li>
        <li>
            <a class="{{Request::is('admin/counter-sales-report') ? 'active-page': ''}}" href="{{route('counter_sales_report')}}"><i class="fa fa-bar-chart mr-20"></i> Counter Sales Report</a>
        </li>
        <li>
            <a class="{{Request::is('admin/cost-report') ? 'active-page': ''}}" href="{{route('cost_report')}}"><i class="fa fa-bar-chart mr-20"></i> Cost Report</a>
        </li>
        <li><hr class="light-grey-hr mb-10"/></li>
        <li class="navigation-header">
            <span>Administration</span> 
            <i class="zmdi zmdi-more"></i>
        </li>
        <li>
            <a class="{{Request::is('admin/user') ? 'active-page': ''}}" href="{{route('user.index')}}"><i class="fa fa-user mr-20"></i> Users</a>
        </li>
        @endif
    </ul>
</div>