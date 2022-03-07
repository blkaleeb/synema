<aside class="left-sidebar bg-sidebar">
    <div id="sidebar" class="sidebar sidebar-with-footer">
        <!-- Aplication Brand -->
        <div class="app-brand">
            <a href="/index.html" title="Synema Worship">
                <svg class="brand-icon" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid"
                    width="30" height="33" viewBox="0 0 30 33">
                    <g fill="none" fill-rule="evenodd">
                        <path class="logo-fill-blue" fill="#7DBCFF" d="M0 4v25l8 4V0zM22 4v25l8 4V0z" />
                        <path class="logo-fill-white" fill="#FFF" d="M11 4v25l8 4V0z" />
                    </g>
                </svg>

                <span class="brand-name text-truncate">!nema Apps</span>
            </a>
        </div>

        <!-- begin sidebar scrollbar -->
        <div class="" data-simplebar style="height: 100%;">
            <!-- sidebar menu -->
            <ul class="nav sidebar-inner" id="sidebar-menu">
                
                <li class="{{ $activePage == 'Songs' ? 'active' : '' }}">
                    <a class="sidenav-item-link" href="{{ url('admin/songs') }}">
                        <i class="mdi mdi-library-music"></i>
                        <span class="nav-text">Songs</span>
                    </a>
                </li>

                <li class="{{ $activePage == 'Artists' ? 'active' : '' }}">
                    <a class="sidenav-item-link" href="{{ url('admin/artists') }}">
                        <i class="mdi mdi-library-music"></i>
                        <span class="nav-text">Artists</span>
                    </a>
                </li>

                <li class="{{ $activePage == 'Banner' ? 'active' : '' }}">
                    <a class="sidenav-item-link" href="{{ url('admin/banners') }}">
                        <i class="mdi mdi-camera-burst"></i>
                        <span class="nav-text">Banner</span>
                    </a>
                </li>
                
                <li class="has-sub {{ $activePage == 'Article' ? 'active' : '' }} expand">
                    <a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse"
                        data-target="#articles" aria-expanded="false" aria-controls="articles">
                        <i class="mdi mdi-blogger"></i>
                        <span class="nav-text">Article</span> <b class="caret"></b>
                    </a>

                    <ul class="collapse" id="articles" data-parent="#sidebar-menu">
                        <div class="sub-menu">
                            <li class="active">
                                <a class="sidenav-item-link" href="{{ url('admin/articles') }}">
                                    <span class="nav-text">Articles</span>
                                </a>
                            </li>
                            
                            <li class="active">
                                <a class="sidenav-item-link" href="{{ url('admin/article_category') }}">
                                    <span class="nav-text">Category</span>
                                </a>
                            </li>

                            <li class="">
                                <a class="sidenav-item-link" href="{{ url('admin/tags') }}">
                                    <span class="nav-text">Tags</span>
                                </a>
                            </li>
                        </div>
                    </ul>
                </li>

                <li class="{{ $activePage == 'Compro' ? 'active' : '' }}">
                    <a class="sidenav-item-link" href="{{ url('admin/compro') }}">
                        <i class="mdi mdi-contact-mail"></i>
                        <span class="nav-text">Company Profile</span>
                    </a>
                </li>

                <li class="{{ $activePage == 'Links' ? 'active' : '' }}">
                    <a class="sidenav-item-link" href="{{ url('admin/links') }}">
                        <i class="mdi mdi-link"></i>
                        <span class="nav-text">Links</span>
                    </a>
                </li>

                <li class="{{ $activePage == 'Tree' ? 'active' : '' }}">
                    <a class="sidenav-item-link" href="{{ url('admin/tree') }}">
                        <i class="mdi mdi-link"></i>
                        <span class="nav-text">Tree</span>
                    </a>
                </li>

                <li class="{{ $activePage == 'Email' ? 'active' : '' }}">
                    <a class="sidenav-item-link" href="{{ url('admin/email') }}">
                        <i class="mdi mdi-email-alert"></i>
                        <span class="nav-text">Subscribed Email</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</aside>