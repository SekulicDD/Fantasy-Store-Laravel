<!-- LEFT SIDEBAR -->
<div id="sidebar-nav" class="sidebar">
    <div class="sidebar-scroll">
        <nav>
            <ul class="nav">

                <li><a href="{{route("adminHomePage")}}" class="active"><i class="lnr lnr-home"></i> <span>Dashboard</span></a></li>
                <li>
                    <a href="#subTable" data-toggle="collapse" class="collapsed"><i class="lnr lnr-database"></i> <span>Tables</span> <i class="icon-submenu lnr lnr-chevron-left"></i></a>
                    <div id="subTable" class="collapse ">
                        <ul class="nav">
                            <li>
                                <a href="{{route("adminProductsPage")}}" ><i class="lnr lnr-file-empty"></i>Products</a>
                            </li>
                            <li>
                                <a href="{{route("adminMainCategoryPage")}}" ><i class="lnr lnr-file-empty"></i>MainCategories</a>
                            </li>
                            <li>
                                <a href="{{route("adminCategoryPage")}}" ><i class="lnr lnr-file-empty"></i>Categories</a>
                            </li>
                            <li>
                                <a href="{{route("adminUsersPage")}}" ><i class="lnr lnr-file-empty"></i>Users</a>
                            </li>
                            <li>
                                <a href="{{route("adminOrdersPAge")}}"><i class="lnr lnr-file-empty"></i>Orders</a>
                            </li>

                        </ul>
                    </div>
                </li>
                <li><a href="{{route("adminMessagesPage")}}" ><i class="lnr lnr-envelope"></i> <span>Messages</span></a></li>

                <li><a href="{{route("showLog")}}" ><i class="lnr lnr-screen"></i> <span>Log</span></a></li>

                <li><a href="{{route("logout")}}" ><i class="lnr lnr-exit"></i> <span>Sing Out</span></a></li>
            </ul>
        </nav>
    </div>
</div>
<!-- END LEFT SIDEBAR -->
