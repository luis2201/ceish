<nav id="sidebar">
  <div class="sidebar_blog_1">
    <div class="sidebar-header">
      <div class="logo_section">
        <a href="index.php"><img class="logo_icon img-responsive" src="<?php echo DIR.IMGS; ?>logo/logo_icon.png" alt="#" /></a>
      </div>
    </div>
    <div class="sidebar_user_info">
      <div class="icon_setting"></div>
      <div class="user_profle_side">
        <div class="user_img"><img class="img-responsive" src="<?php echo DIR.IMGS; ?>layout_img/user-default.png" alt="#" /></div>
        <div class="user_info">
          <h6><?php echo $_SESSION['nombres_com']; ?></h6>
          <p><span class="online_animation"></span> Online</p>
        </div>
      </div>
    </div>
  </div>
  <div class="sidebar_blog_2">
    <h4>CEISH - Aplicativo</h4>
    <ul class="list-unstyled components">
      <li class="active">
        <a href="index.php"><i class="fa fa-dashboard yellow_color"></i> <span>Dashboard</span></a>
      </li>
      <li>
        <a href="#proyectos" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-briefcase blue1_color"></i> <span>Proyectos</span></a>
        <ul class="collapse list-unstyled" id="proyectos">
          <li><a href="proyectos.php">> <span></span>Revisar Proyecto</a></li>
        </ul>
      </li>
    </ul>
  </div>
</nav>