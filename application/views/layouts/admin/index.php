<!DOCTYPE html>
<html lang="en">
<?php
// $site_settings = $this->session->userdata('site_settings');
?>
<?php $this->load->view('layouts/admin/partials/head'); ?>

<body class="hold-transition skin-blue sidebar-mini">
    <!-- Navbar -->
    <?php $this->load->view('layouts/admin/partials/nav'); ?>
    <!-- /.navbar -->
    <?php  $this->load->view('layouts/admin/partials/aside'); ?>
    <!-- Main Sidebar Container -->
    <?php //$this->load->view('layouts/admin/partials/aside'); ?>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- <section class="content-header">
            <h1>
                <?php echo $title ?>
                <small></small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="<?php echo base_url(); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                <li class="active"><?php echo $title ?></li>
            </ol>
        </section> -->

        <section class="content">

            <?php $this->load->view($page); ?>

        </section>

    </div>
    <?php // $this->load->view('layouts/admin/partials/customise'); ?>
    <?php $this->load->view('layouts/admin/partials/footer'); ?>

    <div class=" control-sidebar-bg"></div>
    </div>
    <?php echo $this->load->view('layouts/admin/partials/script'); ?>
    <!--<?php //echo $this->load->view('layouts/admin/partials/rosan_script'); ?>-->
</body>

</html>