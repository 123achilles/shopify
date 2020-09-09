<!-- Side Navbar -->
<nav class="side-navbar">
    <div class="side-navbar-wrapper">
        <!-- Sidebar Header    -->
        <div class="sidenav-header d-flex align-items-center justify-content-center">
            <!-- User Info-->
            <div class="sidenav-header-inner text-center"><a href="{{route('admin.home')}}"><img src="{{asset('images/shopify-logo.png')}}" alt="deluxe" class="img-fluid rounded-circle"></a>
                {{--<h2 class="h5">Nathan Andrews</h2><span>Web Developer</span>--}}
                <h2 class="h5">Shopify</h2><span>Integrator</span>
            </div>
            <!-- Small Brand information, appears on minimized sidebar-->
            <div class="sidenav-header-logo"><a href="{{route('admin.home')}}" class="brand-small text-center"> <strong>Sh</strong><strong class="text-primary">In</strong></a></div>
        </div>
        <!-- Sidebar Navigation Menus-->
        <div class="main-menu">
            <h5 class="sidenav-heading">{{__("global.main")}}</h5>
            <ul id="side-main-menu" class="side-menu list-unstyled">
                <li><a href="{{route('admin.api-keys')}}"> <i class="fa fa-wrench"></i>settings</a></li>

                <li><a href="{{route('home')}}"><i class="fa fa-align-left"></i>Integrator</a></li>
                <li><a href="{{route('admin.install3',['limit'=>250])}}"><i class="fa fa-align-left"></i>doty all products</a></li>
{{--                <li><a href="{{route('admin.user.index')}}"><i class="fa fa-users"></i>{{__('global.left.users')}}</a></li>--}}
{{--                --}}{{--<li><a href="{{route('admin.city.index')}}"><i class="fa fa-building"></i>{{__('global.left.cities')}}</a></li>--}}
{{--                <li><a href="{{route('admin.lara-articles.index')}}"><i class="fa fa-building"></i>{{__('global.left.articles')}}</a></li>--}}
{{--                <li><a href="{{route('admin.customSlug.index')}}"><i class="fa fa-building"></i>{{__('global.left.customSlug')}}</a></li>--}}
{{--                <li><a href="{{route('admin.metaTemplate.index')}}"><i class="fa fa-building"></i>{{__('global.left.metaTemplate')}}</a></li>--}}
{{--                <li><a href="{{route('admin.activation_codes.index')}}"><i class="fa fa-building"></i>{{__('global.left.activation_codes')}}</a></li>--}}
{{--                <li><a href="{{route('admin.languages.index')}}"><i class="fa fa-language"></i>{{__('global.left.languages')}}</a></li>--}}
{{--                <li><a href="{{route('admin.payment-plans.index')}}"><i class="fa fa-plane"></i>{{__('global.left.payment_plans')}}</a></li>--}}
                {{--<li><a href="#exampledropdownDropdown" aria-expanded="false" data-toggle="collapse"> <i class="icon-interface-windows"></i>More Information Actions</a>--}}
                    {{--<ul id="exampledropdownDropdown" class="collapse list-unstyled ">--}}
                        {{--<li><a href="forms.html"> <i class="icon-form"></i>Forms                             </a></li>--}}
                        {{--<li><a href="charts.html"> <i class="fa fa-bar-chart"></i>Charts                             </a></li>--}}
                        {{--<li><a href="tables.html"> <i class="icon-grid"></i>Tables                             </a></li>--}}
                    {{--</ul>--}}
                {{--</li>--}}
{{--                <li><a href="{{url('log-viewer')}}" target="_blank">--}}
{{--                        {{__('global.left.log_viewer')}}</a></li>--}}
                {{--<li> <a href="#"> <i class="icon-mail"></i>Demo--}}
                        {{--<div class="badge badge-warning">6 New</div></a></li>--}}
            </ul>
        </div>
        {{--<div class="admin-menu">--}}
            {{--<h5 class="sidenav-heading">Second menu</h5>--}}
            {{--<ul id="side-admin-menu" class="side-menu list-unstyled">--}}
                {{--<li> <a href="#"> <i class="icon-screen"> </i>Demo</a></li>--}}
                {{--<li> <a href="#"> <i class="icon-flask"> </i>Demo--}}
                        {{--<div class="badge badge-info">Special</div></a></li>--}}
                {{--<li> <a href=""> <i class="icon-flask"> </i>Demo</a></li>--}}
                {{--<li> <a href=""> <i class="icon-picture"> </i>Demo</a></li>--}}
            {{--</ul>--}}
        {{--</div>--}}
    </div>
</nav>
