<!-- Navbar -->
<div class="wrapper">
    <header class="main-header">
        <nav class="navbar">
            <div class="MainLogo">
            <img src="<?php echo base_url();?>/uploads/<?php echo  $site_settings->logo ?>"class="img-circle"
            alt="<?php echo $site_settings->site_name ?>">
            <span><?php echo $site_settings->site_name ?></span>
            <span><?php echo $site_settings->address ?></span>
            </div>
            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">
                    <li class="dropdown user user-menu">
                        <a href="#" class="dropdown-toggle  profileesss" data-toggle="dropdown">
                            <img src="<?php echo base_url();?>/uploads/profile/<?php echo  $staff_featured_image ?>" class="user-image"
                                alt="<?php echo $staff_name; ?>">
                            <span class="hidden-xs"><?php echo $staff_name; ?></span>
                        </a>
                        <ul class="dropdown-menu">

                            <li class="user-header">
                                <img src="<?php echo base_url();?>/uploads/profile/<?php echo  $staff_featured_image ?>" class="img-circle"
                                    alt="<?php echo $staff_name; ?>">
                                <p>
                                    <?php echo $staff_name ?>
                                    <small>
                                        <?php echo (new DateTime($appointed_date))->format('M. Y'); ?>  देखि सदस्य</small>
                                </p>
                            </li>

                            <li class="user-footer">
                                <div class="pull-left">
                                    <a href="<?php echo base_url('site_settings/admin/'); ?>"
                                        class="btn btn-default btn-flat">site setting</a>
                                </div>

                                <div class=" pull-right" style="margin: 0px 0px 0px 0px;">
                                    <a href="<?php echo base_url('login/logout') ?>"
                                        class="btn btn-default btn-flat">Sign out</a>
                                </div>
                                <!--<div class="pull-right">-->
                                <!--    <a href="<?php echo base_url('site_settings/admin'); ?>"-->
                                <!--        class="btn btn-default btn-flat">Settings</a>-->
                                <!--</div>-->
                            </li>
                        </ul>
                    </li>

                    <!-- <li>
                        <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
                    </li> -->
                </ul>
            </div>
        </nav>
    </header>


    <!-- /.navbar -->