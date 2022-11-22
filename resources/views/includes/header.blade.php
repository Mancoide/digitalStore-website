<header class="header">
    <nav class="navbar navbar-expand-lg px-4 py-2 bg-white shadow">
        <a class="sidebar-toggler text-gray-500 me-4 me-lg-5 lead" href="#">
            <i class="fas fa-align-left"></i>
        </a>
        <ul class="ms-auto d-flex align-items-center list-unstyled mb-0">
            <li class="nav-item dropdown ms-auto">
                <a class="nav-link pe-0 text-muted" id="userInfo" href="#" data-bs-toggle="dropdown" aria-expanded="false">
                    <x-orchid-icon path="user" class="icon-big svg-icon svg-icon me-3 avatar p-1" />
                    <span class="sidebar-link-title">{{ auth()->user()->fullname }} </span>
                </a>
                <div class="dropdown-menu dropdown-menu-end dropdown-menu-animated" aria-labelledby="userInfo">
                    <div class="dropdown-header text-gray-700">
                        <h6 class="text-uppercase font-weight-bold">{{ auth()->user()->fullname }}</h6>
                    </div>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#">Settings</a>
                    <a class="dropdown-item" href="#">Activity log</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="{{ url('logout') }}">Logout</a>
                </div>
            </li>
        </ul>
    </nav>
</header>