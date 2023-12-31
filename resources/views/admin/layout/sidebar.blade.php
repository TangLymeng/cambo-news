<div class="main-sidebar">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="{{ route('admin_home') }}">Admin Panel</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="{{ route('admin_home') }}"></a>
        </div>

        <ul class="sidebar-menu">

            <li class="{{ Request::is('admin/home') ? 'active' : '' }}"><a class="nav-link"
                                                                           href="{{ route('admin_home') }}"><i
                        class="fas fa-home fa-spin"></i> <span>Dashboard</span></a></li>

            <li class="{{ Request::is('admin/setting') ? 'active' : '' }}"><a class="nav-link"
                                                                           href="{{ route('admin_setting') }}"><i
                        class="fas fa-fire"></i> <span>Breaking News/News Ticker</span></a></li>

            <li class="nav-item dropdown {{ Request::is('admin/top-advertisement')||Request::is('admin/home-advertisement')||Request::is('admin/sidebar-advertisement') ? 'active' : ''  }}">
                <a href="#" class="nav-link has-dropdown"><i
                        class="fas fa-ad fa-pulse"></i><span>Advertisements</span></a>
                <ul class="dropdown-menu">
                    <li class="{{ Request::is('admin/top-advertisement') ? 'active' : '' }}"><a class="nav-link"
                                                                                                href="{{ route('admin_top_ad_show') }}"><i
                                class="fas fa-ad"></i> Top Advertisement</a></li>
                    <li class="{{ Request::is('admin/home-advertisement') ? 'active' : '' }}"><a class="nav-link"
                                                                                                 href="{{ route('admin_home_ad_show') }}"><i
                                class="fas fa-ad"></i> Home Advertisement</a></li>
                    <li class="{{ Request::is('admin/sidebar-advertisement') ? 'active' : '' }}"><a class="nav-link"
                                                                                                    href="{{ route('admin_sidebar_ad_show') }}"><i
                                class="fas fa-ad"></i> Sidebar Advertisement</a></li>
                </ul>
            </li>

            <li class="nav-item dropdown {{ Request::is('admin/category/show')||Request::is('admin/sub-category/show')||Request::is('admin/post/show') ? 'active' : '' }}">
                <a href="#" class="nav-link has-dropdown"><i class="far fa-newspaper"></i><span>News</span></a>
                <ul class="dropdown-menu">
                    <li class="{{ Request::is('admin/category/show') ? 'active' : '' }}"><a class="nav-link"
                                                                                            href="{{ route('admin_category_show') }}"><i
                                class="fas fa-angle-right"></i> Categories</a></li>
                    <li class="{{ Request::is('admin/sub-category/show') ? 'active' : '' }}"><a class="nav-link"
                                                                                                href="{{ route('admin_sub_category_show') }}"><i
                                class="fas fa-angle-right"></i> SubCategories</a></li>
                    <li class="{{ Request::is('admin/post/show') ? 'active' : ''  }}"><a class="nav-link"
                                                                                         href="{{ route('admin_post_show') }}"><i class="fas fa-angle-right"></i> Posts</a></li>
                </ul>
            </li>

            <li class="{{ Request::is('admin/pending/comment') ? 'active' : '' }}"><a class="nav-link"
                                                                              href="{{ route('admin_pending_comment') }}"><i
                        class="fas fa-comment fa-spin"></i> <span>Pending Comment</span></a></li>
            <li class="{{ Request::is('admin/approved/comment') ? 'active' : '' }}"><a class="nav-link"
                                                                                      href="{{ route('admin_comment_approved') }}"><i
                        class="fas fa-comment"></i> <span>Approved Comment</span></a></li>

{{--            <li class="nav-item dropdown active">--}}
{{--                <a href="#" class="nav-link has-dropdown"><i class="fas fa-hand-point-right"></i><span>Dropdown Items</span></a>--}}
{{--                <ul class="dropdown-menu">--}}
{{--                    <li class="active"><a class="nav-link" href=""><i class="fas fa-angle-right"></i> Item 1</a></li>--}}
{{--                    <li class=""><a class="nav-link" href=""><i class="fas fa-angle-right"></i> Item 2</a></li>--}}
{{--                </ul>--}}
{{--            </li>--}}

{{--            <li class=""><a class="nav-link" href="setting.html"><i class="fas fa-hand-point-right"></i> <span>Setting</span></a></li>--}}

{{--            <li class=""><a class="nav-link" href="form.html"><i class="fas fa-hand-point-right"></i> <span>Form</span></a></li>--}}

{{--            <li class=""><a class="nav-link" href="table.html"><i class="fas fa-hand-point-right"></i> <span>Table</span></a></li>--}}

{{--            <li class=""><a class="nav-link" href="invoice.html"><i class="fas fa-hand-point-right"></i> <span>Invoice</span></a></li>--}}

        </ul>
    </aside>
</div>
