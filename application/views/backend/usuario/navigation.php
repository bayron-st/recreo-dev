<div class="sidebar-menu">
    <header class="logo-env" >
        <!-- logo -->
        <div class="logo" style="">
            <a href="<?php echo site_url('login'); ?>">
                <img src="<?php echo base_url('uploads/logo.png');?>"  style="max-height:60px;"/>
            </a>
        </div>

        <!-- logo collapse icon -->
        <div class="sidebar-collapse" style="">
            <a href="#" class="sidebar-collapse-icon with-animation">

                <i class="entypo-menu"></i>
            </a>
        </div>

        <!-- open/close menu icon (do not remove if you want to enable menu on mobile devices) -->
        <div class="sidebar-mobile-menu visible-xs">
            <a href="#" class="with-animation">
                <i class="entypo-menu"></i>
            </a>
        </div>
    </header>

    <div style=""></div>
    <ul id="main-menu" class="">


        <!-- DASHBOARD -->
        <li class="<?php if ($page_name == 'dashboard') echo 'active'; ?> ">
            <a href="<?php echo site_url('admin/dashboard'); ?>">
                <i class="entypo-gauge"></i>
                <span><?php echo 'Inicio'; ?></span>
            </a>
        </li>

        <!-- Usuario
              <li class="<?php
              if ($page_name == 'asesor_add' ||
                      $page_name == 'asesor')
                  echo 'opened active has-sub';
              ?> ">
                  <a href="#">
                      <i class="fa fa-group"></i>
                      <span><?php echo 'Usuarios'; ?></span>
                  </a>
                  <ul>
                      <!-- ingresar asesores
                      <li class="<?php if ($page_name == 'asesor_add') echo 'active'; ?> ">
                          <a href="<?php echo site_url('admin/asesor_add'); ?>">
                              <span><i class="entypo-dot"></i> <?php echo'Registro de Usuarios'; ?></span>
                          </a>
                      </li>

                      <!-- lista de asesores
                      <li class="<?php if ($page_name == 'asesor') echo 'active'; ?> ">
                    <a href="<?php echo site_url('admin/asesor'); ?>">
                      <span><i class="entypo-dot"></i> <?php echo 'Listado de Usuarios'; ?></span>
                    </a>
                </li>



                  </ul>
              </li>



        <!-- SETTINGS -->
        <li class="<?php
        if ($page_name == 'system_settings' ||
              $page_name == 'manage_language' ||
                $page_name == 'sms_settings'||
                  $page_name == 'payment_settings')
                    echo 'opened active';
        ?> ">
            <a href="#">
                <i class="entypo-lifebuoy"></i>
                <span><?php echo 'Ajustes'; ?></span>
            </a>
            <ul>
                <li class="<?php if ($page_name == 'system_settings') echo 'active'; ?> ">
                    <a href="<?php echo site_url('admin/system_settings'); ?>">
                        <span><i class="entypo-dot"></i> <?php echo 'Ajuste general'; ?></span>
                    </a>
                </li>

            </ul>
        </li>



        <!-- ACCOUNT -->
        <li class="<?php if ($page_name == 'manage_profile') echo 'active'; ?> ">
            <a href="<?php echo site_url('admin/manage_profile'); ?>">
                <i class="entypo-lock"></i>
                <span><?php echo 'Cuenta'; ?></span>
            </a>
        </li>

    </ul>

</div>
