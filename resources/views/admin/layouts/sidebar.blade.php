<div class="page-wrap">
    <div class="app-sidebar colored">
        <div class="sidebar-header">
            <a class="header-brand" href="{{ url('/dashboard') }}">
                <div class="logo-img">

                </div>
                <span class="text">Zediah</span>
            </a>

        </div>

        <div class="sidebar-content">
            <div class="nav-container">
                <nav id="main-menu-navigation" class="navigation-main">

                    <div class="nav-item active">
                        <a href="{{ url('dashboard') }}"><i class="ik ik-bar-chart-2"></i><span>Dashboard</span></a>
                    </div>


                    <div class="nav-item has-sub">
                        <a href="{{route('documents.index')}}"><i class="ik ik-list"></i><span>Documents</span> <span
                                class="badge badge-danger"></span></a>
                        <div class="submenu-content">
                            <a href="{{route('documents.create')}}" class="menu-item">Create</a>
                            <a href="# "class="menu-item">Check</a>

                        </div>
                    </div>



                    <div class="nav-item has-sub">
                        <a href="{{route('order_documents.index')}}"><i class="ik ik-heart"></i><span>Order_Document</span> <span
                                class="badge badge-danger"></span></a>
                        <div class="submenu-content">
                            <a href="{{route('order_documents.create')}}" class="menu-item">Create</a>
                            <a href="#" class="menu-item">View</a>
                                
                        </div>
                    </div>

                   
                        <div class="nav-item has-sub">
                            <a href="{{route('ministries.index')}}"><i class="ik ik-layers"></i><span>Ministry</span> <span
                                    class="badge badge-danger"></span></a>
                            <div class="submenu-content">
                                <a href="{{route('ministries.create')}}" class="menu-item">Create</a>
                                <a href="#" class="menu-item">View</a>

                            </div>
                        </div>

                        

                        <div class="nav-item has-sub">
                            <a href="{{route('ministry_documents.index')}}"><i class="ik ik-monitor"></i><span>MinistryDocs</span>
                                <span class="badge badge-danger"></span></a>
                            <div class="submenu-content">
                                <a href= "{{route('ministry_documents.create')}}"class="menu-item">Create</a>
                                
                            </div>
                        </div>
                        <div class="nav-item has-sub">
                            <a href="{{route('users.index')}}"><i class="ik ik-monitor"></i><span>Users</span>
                                <span class="badge badge-danger"></span></a>
                            <div class="submenu-content">
                                <a href="{{route('users.create')}}" class="menu-item">create</a>
                                
                            </div>
                        </div>
                        

                    <div class="nav-item active">
                        <a href=""><i
                                class="ik ik-power dropdown-icon"></i><span>Logout</span></a>
                        
                    </div>
                </nav>
            </div>
        </div>
    </div>
