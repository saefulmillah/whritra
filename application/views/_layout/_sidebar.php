  <nav class="sidebar shadow sidebar-offcanvas" id="sidebar">
    <ul class="nav">
      <li class="nav-item">
        <a class="nav-link" href="index.html">
          <i class="menu-icon mdi mdi-television"></i>
          <span class="menu-title">Dashboard</span>
        </a>
      </li>
      <?php
        foreach($multilevel as $data)
        {
          if (count($data['child']) > 0) {
              echo '<li class="nav-item">
                      <a class="nav-link" href="#submenu'.$data['menu_id'].'" aria-expanded="false" data-toggle="collapse"><i class="menu-icon mdi mdi-table"></i>'.trim($data['menu_title']).'<i class="menu-arrow"></i></a>';

              echo '<div class="collapse" id="submenu'.$data['menu_id'].'"><ul class="nav flex-column sub-menu">'.print_recursive_list($data['child']).'</ul></div></li>';
          } else {
              echo '<li class="nav-item">
                      <a class="nav-link" href="'.site_url($data['menu_url']).'"><i class="menu-icon mdi mdi-table"></i>'.trim($data['menu_title']).'<i class="menu-arrow"></i></a></li>';                            
          }
        }
      ?>
    </ul>
  </nav>