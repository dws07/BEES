<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?php echo $site_settings->short_name; ?></title>

    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugin/css/bootstrap.min.css">

    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugin/css/font-awesome.min.css">

    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugin/css/ionicons.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugin/css/AdminLTE.min.css">

    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugin/css/blue.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/style.css">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">


    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic"> 
</head>

<body class="hold-transition login-page">
    <div class="login-box">
        <div class="login-logo">
            <a href="<?php echo  base_url('login'); ?>"><img width="100px" src="<?php echo base_url();?>/uploads/<?php echo  $site_settings->logo ?>" alt=""></a>

        </div>

        <div class="login-box-body">
            <h2 class="login-box-msg"><b><?php echo $site_settings->short_name; ?></b></h2>
            <!-- <p><?php echo $site_settings->address; ?></p> -->

            <form action="" method="post">
                <div class="form-group has-feedback">
                    <input type="text" name="username" class="form-control" id="unique-input-1" placeholder="Username"
                        value="<?php echo set_value('username'); ?>">
                    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                    <?php echo form_error('username'); ?>
                </div>
                <div class="form-group has-feedback">
                    <input type="password" name="password" class="form-control" placeholder="Password"
                        value="<?php echo set_value('password'); ?>">
                    <span class="fa fa-lock form-control-feedback"></span>
                    <?php echo form_error('password'); ?>
                </div>
                <div class="row">
                    <!-- <div class="col-xs-8">
                        <div class="checkbox icheck">
                            <label>
                                <input type="checkbox"> Remember Me
                            </label>
                        </div>
                    </div> -->

                    <div class="col-sm-12">
                        <button type="submit" class="btn btn-primary logiii btn-block btn-flat">Log In</button>
                    </div>

                </div>
            </form>

            <!-- <a href="#">I forgot my password</a><br>
            <a href="register.html" class="text-center">Register a new membership</a> -->
        </div>

    </div>


    <script src="<?php echo base_url(); ?>assets/plugin/js/jquery.min.js"></script>

    <script src="<?php echo base_url(); ?>assets/plugin/js//bootstrap.min.js"></script>

    <script src="<?php echo base_url(); ?>assets/plugin/js/icheck.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/plugin/js/notify.js"></script>
    <!-- <script src="https://unpkg.com/nepalify@0.5.0/umd/nepalify.production.min.js"></script> -->
    <script>
        // console.log(nepalify.availableLayouts());
        // var inputEl = nepalify.interceptElementById("unique-input-1");
        // // console.log('raj',inputEl);
        // // var textareaEl = nepalify.interceptElementById("unique-textarea-1");

        // // Further options can be provided as a second argument
        // // const options = {
        // // layout: "traditional",
        // // enable: false,
        // // };
        // // nepalify.interceptElementById("unique-input-2", options);

        // // When the options are not provided, the following defaults are used
        // const defaultOptions = {
        // layout: "romanized",
        // enable: true,
        // };
    $(function() {
        $('input').iCheck({
            checkboxClass: 'icheckbox_square-blue',
            radioClass: 'iradio_square-blue',
            increaseArea: '20%' /* optional */
        });

    });
    </script>
    <?php if($this->session->flashdata('error')){ ?>
    <script>
    $.notify("<?php echo $this->session->flashdata('error'); ?>", {
        color: "#fff",
        background: "#D44950",
        close: true
    });
    </script>
    <?php }else{ ?>
    <script>
    $.notify("<?php echo $this->session->flashdata('success'); ?>", {
        color: "#fff",
        background: "#4B7EE0",
        close: true
    });
    </script>
    <?php } ?>
</body>

</html>