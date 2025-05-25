<li class="menu-section">
  <h4 class="menu-text"> MAIN </h4>
  <i class="menu-icon ki ki-bold-more-hor icon-md"></i>
</li>
<li class="menu-item {{ (request()->is('dashboard/access-points*')) ? 'menu-item-active' : '' }}"><a href="{{ url('/dashboard/access-points') }}" class="menu-link"><i class="menu-icon fas fa-list-ul"></i><span class="menu-text"> Access Points </span></a></li>
