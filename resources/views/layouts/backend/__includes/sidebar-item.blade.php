<li class="menu-section">
  <h4 class="menu-text"> MAIN </h4>
  <i class="menu-icon ki ki-bold-more-hor icon-md"></i>
</li>
<li class="menu-item {{ (request()->is('dashboard/access-points*')) ? 'menu-item-active' : '' }}"><a href="{{ url('/dashboard/access-points') }}" class="menu-link"><i class="menu-icon fas fa-list-ul"></i><span class="menu-text"> Access Points </span></a></li>
<li class="menu-item {{ (request()->is('dashboard/intercomes*')) ? 'menu-item-active' : '' }}"><a href="{{ url('/dashboard/intercomes') }}" class="menu-link"><i class="menu-icon fas fa-list-ul"></i><span class="menu-text"> Intercomes </span></a></li>
<li class="menu-item {{ (request()->is('dashboard/maintenances*')) ? 'menu-item-active' : '' }}"><a href="{{ url('/dashboard/maintenances') }}" class="menu-link"><i class="menu-icon fas fa-list-ul"></i><span class="menu-text"> Maintenances </span></a></li>
<li class="menu-item {{ (request()->is('dashboard/users*')) ? 'menu-item-active' : '' }}"><a href="{{ url('/dashboard/users') }}" class="menu-link"><i class="menu-icon fas fa-list-ul"></i><span class="menu-text"> Users </span></a></li>
