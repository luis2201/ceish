<div class="topbar">
  <nav class="navbar navbar-expand-lg navbar-light">
    <div class="full">
      <button type="button" id="sidebarCollapse" class="sidebar_toggle"><i class="fa fa-bars"></i></button>
      <div class="logo_section">
        <a href="index.php"><img class="img-responsive" src="<?php echo DIR.IMGS; ?>logo/itsup.png" alt="#" /></a>
      </div>
      <div class="right_topbar">
        <div class="icon_info">
          <ul>
            <li>
            <a href="mensajes.php">
                <i class="fa fa-envelope-o"></i>
                <span class="badge">
                  <?php
                    //echo count($mensaje->select_mensaje_nuevos_negocio());
                  ?>
                </span>
              </a>
            </li>
            <li>
              <a href="proyectos.php">
                <i class="fa fa-bell-o"></i>
                <span class="badge">
                  <?php
                    echo count($solicitud->select_solicitud_pendiente_negocio());
                  ?>
                </span>
              </a>
            </li>
          </ul>
          <ul class="user_profile_dd">
            <li>
              <a class="dropdown-toggle" data-toggle="dropdown"><img class="img-responsive rounded-circle" src="<?php echo DIR.IMGS; ?>layout_img/user-default.png" alt="#" /><span class="name_user"><?php echo $_SESSION['usuario_com']; ?></span></a>
              <div class="dropdown-menu">
                <a class="dropdown-item" href="perfil.php">Mi Perfil</a>
                <a class="dropdown-item" href="logout.php"><span>Salir</span> <i class="fa fa-sign-out"></i></a>
              </div>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </nav>
</div>