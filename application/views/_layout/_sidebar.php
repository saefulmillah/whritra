  <nav class="sidebar shadow sidebar-offcanvas" id="sidebar">
    <ul class="nav">
      <li class="nav-item">
        <a class="nav-link" href="index.html">
          <i class="menu-icon mdi mdi-television"></i>
          <span class="menu-title">Dashboard</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
          <i class="menu-icon mdi mdi-table"></i>
          <span class="menu-title">Master</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="ui-basic">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item">
              <a class="nav-link" href="<?=site_url('master/hub')?>">Hub</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?=site_url('master/owner')?>">Owner</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?=site_url('master/partner')?>">Partner</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?=site_url('master/warehouse')?>">Warehouse</a>
            </li>
          </ul>
        </div>
      </li>
    </ul>
  </nav>