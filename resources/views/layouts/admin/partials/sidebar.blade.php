<!-- Main Sidebar -->
<div id="sidebar">
    <!-- Wrapper for scrolling functionality -->
    <div id="sidebar-scroll">
        <!-- Sidebar Content -->
        <div class="sidebar-content">
            <!-- Brand -->
            <a href="{{url('/')}}" class="sidebar-brand text-center">
                <span class="sidebar-nav-mini-hide"><small><strong>{{ config('app.name', 'App') }}</strong></small></span>
            </a>
            <!-- END Brand -->

            <!-- User Info -->
            <div class="sidebar-section sidebar-user clearfix sidebar-nav-mini-hide">
                <div class="sidebar-user-avatar">
                    <a href="#modal-user-settings" data-toggle="modal">
                        <img src="{{ asset('admin/img/placeholders/avatars/avatar2.jpg') }}" alt="avatar">
                    </a>
                </div>
                <div class="sidebar-user-name">{{ Auth::user()->name }}</div>
                <div class="sidebar-user-links">
                    <a href="#modal-user-settings" data-toggle="modal"><i class="gi gi-user"></i></a>
                    <!-- <a href="page_ready_inbox.html" data-toggle="tooltip" data-placement="bottom" title="Messages"><i class="gi gi-envelope"></i></a> -->
                    <!-- Opens the user settings modal that can be found at the bottom of each page (page_footer.html in PHP version) -->
                    <!-- <a href="javascript:void(0)" class="enable-tooltip" data-placement="bottom" title="Settings" onclick="$('#modal-user-settings').modal('show');"><i class="gi gi-cogwheel"></i></a> -->

                    <a data-toggle="tooltip" data-placement="bottom" title="Logout" class="dropdown-item app_logout" href="javascript:void(0)">
                       {{-- onclick="event.preventDefault();
                                     document.getElementById('logout-form').submit();">--}}
                        <i class="gi gi-exit"></i> 
                    </a>

                    {{-- <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form> --}}
                </div>
            </div>
            <!-- END User Info -->

            <!-- Sidebar Navigation -->
            <ul class="sidebar-nav">
                {{-- @include('layouts.admin.partials.navigation') --}}
                @include('layouts.menu')
            </ul>
            <!-- END Sidebar Navigation -->

            <!-- Sidebar Notifications -->
            <!-- <div class="sidebar-header sidebar-nav-mini-hide">
                <span class="sidebar-header-options clearfix">
                    <a href="javascript:void(0)" data-toggle="tooltip" title="Refresh"><i class="gi gi-refresh"></i></a>
                </span>
                <span class="sidebar-header-title">Activity</span>
            </div>
            <div class="sidebar-section sidebar-nav-mini-hide">
                <div class="alert alert-success alert-alt">
                    <small>5 min ago</small><br>
                    <i class="fa fa-thumbs-up fa-fw"></i> You had a new sale ($10)
                </div>
                <div class="alert alert-info alert-alt">
                    <small>10 min ago</small><br>
                    <i class="fa fa-arrow-up fa-fw"></i> Upgraded to Pro plan
                </div>
                <div class="alert alert-warning alert-alt">
                    <small>3 hours ago</small><br>
                    <i class="fa fa-exclamation fa-fw"></i> Running low on space<br><strong>18GB in use</strong> 2GB left
                </div>
                <div class="alert alert-danger alert-alt">
                    <small>Yesterday</small><br>
                    <i class="fa fa-bug fa-fw"></i> <a href="javascript:void(0)"><strong>New bug submitted</strong></a>
                </div>
            </div> -->
            <!-- END Sidebar Notifications -->
        </div>
        <!-- END Sidebar Content -->
    </div>
    <!-- END Wrapper for scrolling functionality -->
</div>
<!-- END Main Sidebar -->