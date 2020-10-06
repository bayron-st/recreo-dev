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

        <!-- HOME -->
        <li class="<?php if ($page_name == 'manage_profile') echo 'active'; ?> ">
            <a href="https://elrecreoesdetodos.com/">
                <i class="entypo-home"></i>
                <span>Regresar al portal</span>
            </a>
        </li>

        <!-- DASHBOARD -->
        <li class="<?php if ($page_name == 'dashboard') echo 'active'; ?> ">
            <a href="<?php echo site_url('asesor/dashboard'); ?>">
                <i class="entypo-gauge"></i>
                <span><?php echo 'dashboard'; ?></span>
            </a>
        </li>

        <!-- JUEGO MENTAL -->
        <li class="<?php if ($page_name == 'juego') echo 'active'; ?> ">
            <a href="<?php echo site_url('asesor/juego'); ?>">
                <i class="entypo-gauge"></i>
                <span><?php echo 'Juego Mental'; ?></span>
            </a>
        </li>

        <!-- ACCOUNT -->
        <li class="<?php if ($page_name == 'manage_profile') echo 'active'; ?> ">
            <a href="<?php echo site_url('asesor/manage_profile'); ?>">
                <i class="entypo-lock"></i>
                <span><?php echo 'Cuenta'; ?></span>
            </a>
        </li>

    </ul>

</div>
