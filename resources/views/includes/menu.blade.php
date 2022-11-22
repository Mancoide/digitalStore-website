<div class="sidebar py-3" id="sidebar">
    <!-- <h6 class="sidebar-heading">Main</h6> -->
    <ul class="list-unstyled">
        <li class="sidebar-list-item">
            <a class="sidebar-link text-muted {{ activeRoutes(['home.index']) }}" href="{{ url('/') }}">
                <x-orchid-icon path="fa.home" class="icon-big svg-icon svg-icon me-3" />
                <span class="sidebar-link-title">{{ __('resources.titles.dashboard') }}</span>
            </a>
        </li>
        <li class="sidebar-list-item">
            <a class="sidebar-link text-muted {{ activeRoutes(['users.index', 'users.create', 'users.edit', 'roles.index', 'roles.create', 'roles.edit', 'accounts.index', 'accounts.create', 'accounts.edit']) }}" href="#" data-bs-target="#configDropdown" role="button" aria-expanded="false" data-bs-toggle="collapse"> 
                <x-orchid-icon path="fa.cogs" class="icon-big svg-icon svg-icon me-3" />
                <span class="sidebar-link-title">{{ __('resources.titles.settings') }} </span>
            </a>
            <ul id="configDropdown" class="sidebar-menu list-unstyled collapse {{ showOptions(['users.index', 'users.create', 'users.edit', 'roles.index', 'roles.create', 'roles.edit', 'accounts.index', 'accounts.create', 'accounts.edit']) }}">

              <li class="sidebar-list-item"><a class="sidebar-link text-muted {{ activeRoutes(['users.index', 'users.create', 'users.edit']) }}" href="{{ url('users') }}">{{ __('resources.titles.users') }} </a></li>

              <li class="sidebar-list-item"><a class="sidebar-link text-muted {{ activeRoutes(['roles.index', 'roles.create', 'roles.edit']) }}" href="{{ url('roles') }}">{{ __('resources.titles.roles') }}</a></li>

              <li class="sidebar-list-item"><a class="sidebar-link text-muted {{ activeRoutes(['accounts.index', 'accounts.create', 'accounts.edit']) }}" href="cms-post-new.html">{{ __('resources.titles.accounts') }}</a></li>
            </ul>
          </li>
    </ul>
</div>