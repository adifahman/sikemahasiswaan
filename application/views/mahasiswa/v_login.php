<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>SI Kemahasiswaan | Log in</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="shortcut icon" type="ico" href="<?php echo base_url('assets'); ?>/img/favicon.ico">
    <link rel="stylesheet" href="<?php echo base_url('assets'); ?>/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="<?php echo base_url('assets'); ?>/dist/css/AdminLTE.min.css">
    <link rel="stylesheet" href="<?php echo base_url('assets'); ?>/plugins/iCheck/square/blue.css">
</head>
<body class="hold-transition login-page">
    <div class="login-box">
        <div class="login-logo">
            Sistem Informasi Beasiswa - Mahasiswa
        </div>

        <div class="login-box-body">
            <?php if($result != '') {
                echo "<div class='alert alert-warning alert-dismissible'>
                    <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>
                    $result
                    </div>";
            } ?>
            <form action="<?php echo base_url('mahasiswa/login/act'); ?>" method="post">
                <div class="form-group has-feedback">
                    <input type="username" name="username" class="form-control" placeholder="Username" required="true" autocomplete="off" autofocus="true">
                    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                </div>
                <div class="form-group has-feedback">
                    <input type="password" name="password" class="form-control" placeholder="Password" required="true">
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                </div>
                <div class="row">
                    <div class="col-xs-8">
                    </div>
                    <!-- /.col -->
                    <div class="col-xs-4">
                        <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
                    </div>
                    <!-- /.col -->
                </div>
            </form>
        </div>
        <!-- /.login-box-body -->
    </div>
    <!-- /.login-box -->

    <script src="<?php echo base_url('assets'); ?>/plugins/jQuery/jquery-2.2.3.min.js"></script>
    <script src="<?php echo base_url('assets'); ?>/bootstrap/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url('assets'); ?>/plugins/iCheck/icheck.min.js"></script>
    <script>
        $(function () {
            $('input').iCheck({
                checkboxClass: 'icheckbox_square-blue',
                radioClass: 'iradio_square-blue',
                increaseArea: '20%' // optional
            });
        });
    </script>
</body>
</html>
