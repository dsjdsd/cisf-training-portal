        <!-- Left Sidebar -->
        @php
        $currentRouteName = Route::currentRouteName();
        @endphp
        <aside id="leftsidebar" class="sidebar">
            <div class="navbar-brand">
                <button class="btn-menu ls-toggle-btn" type="button"><i class="zmdi zmdi-menu"></i></button>
                <a href="index.html"><img src="{{ asset('all-view-assets/images/logo.svg') }}" width="25" alt="Aero"><span class="m-l-10">Aero</span></a>
            </div>
            <div class="menu">
                <ul class="list">
                    <li>
                        <div class="user-info">
                            <a class="image" href="profile.html"><img src="{{ asset('all-view-assets/images/profile_av.jpg') }}" alt="User"></a>
                            <div class="detail">
                                <h4>Michael</h4>
                                <small>Super Admin</small>                        
                            </div>
                        </div>
                    </li>
                    <li class="{{ $currentRouteName == 'adminDashboard' ? 'active open' : '' }}"><a href="{{route('adminDashboard')}}"><i class="zmdi zmdi-home"></i><span>Dashboard</span></a></li>
                    <li class="{{ ($currentRouteName == 'adminListUsers' || $currentRouteName == 'adminListTrainingProgramme') ? 'active open' : '' }}"><a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-apps"></i><span>Users</span></a>
                        <ul class="ml-menu">
                            <li><a href="{{route('adminAddUsers')}}">Add Users</a></li>
                            <li class="{{ $currentRouteName == 'adminListUsers' ? 'active' : '' }}"><a href="{{route('adminListUsers')}}">List Users</a></li>
                        </ul>
                    </li>
                    <li class="{{ ($currentRouteName == 'adminAddTrainingProgramme' || $currentRouteName == 'adminListTrainingProgramme') ? 'active open' : '' }}"><a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-apps"></i><span>Training Programmes</span></a>
                        <ul class="ml-menu">
                            <li class="{{ $currentRouteName == 'adminAddTrainingProgramme' ? 'active' : '' }}"><a href="{{route('adminAddTrainingProgramme')}}">Add Training Programmes</a></li>
                            <li class="{{ $currentRouteName == 'adminListTrainingProgramme' ? 'active' : '' }}"><a href="{{route('adminListTrainingProgramme')}}">List Training Programmes</a></li>                
                        </ul>
                    </li>
                    <li class="{{ ($currentRouteName == 'adminListCategory' || $currentRouteName == 'adminListRole') ? 'active open' : '' }}"> <a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-assignment"></i><span>Master</span></a>
                        <ul class="ml-menu">
                            <li class="{{ $currentRouteName == 'adminListCategory' ? 'active' : '' }}"><a href="{{route('adminListCategory')}}">Category List</a></li>
                            <li class="{{ $currentRouteName == 'adminListRole' ? 'active' : '' }}"><a href="{{route('adminListRole')}}">Role List</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </aside>