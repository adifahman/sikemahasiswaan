<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>404 Page Not Found</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="shortcut icon" type="ico" href="<?php echo base_url('assets'); ?>/img/favicon.ico">
    <link rel="stylesheet" href="<?php echo base_url('assets'); ?>/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="<?php echo base_url('assets'); ?>/dist/css/AdminLTE.min.css">
    <link rel="stylesheet" href="<?php echo base_url('assets'); ?>/plugins/iCheck/square/blue.css">
    <style>
        
        div.frameT {
                width: 100%;
                padding: 0;
                display: table;
                height: 100%;
                position: absolute;
                top: 0;
                left: 0;
                margin: 0;
        }

        div.frameTC {
                padding: 0;
                vertical-align: middle;
                display: table-cell;
                margin: 0;
        }

        div.content {
                width: 600px;
                margin: 0 auto;
                text-align: left;
                padding: 10px;
        }
    </style>
</head>
<body class="hold-transition login-page">
<!--    <div style="display:flex;justify-content:center;align-items:center;">
        <div class="error-page">
        <h2 class="headline text-yellow"> 404</h2>

        <div class="error-content">
          <h3><i class="fa fa-warning text-yellow"></i> Oops! Page not found.</h3>

          <p>
            We could not find the page you were looking for.
            Meanwhile, you may <a href="../">return to dashboard</a> or try using the search form.
          </p>
        </div>
         /.error-content 
      </div>
    </div>-->
    
    <div class="frameT">
        <div class="frameTC">
            <div class="content">
                <div class="error-page">
                    <h2 class="headline text-yellow"> 404</h2>

                    <div class="error-content">
                        <h3><i class="fa fa-warning text-yellow"></i> Oops! Page not found.</h3>

                        <p>
                            We could not find the page you were looking for.
                            Meanwhile, you may <a href="<?php echo base_url('assets'); ?>/">return to dashboard</a>.
                        </p>
                        <div class="input-group">
                            <input type="text" name="search" class="form-control" placeholder="404 Error" disabled="">

                            <div class="input-group-btn">
                                <button type="submit" name="submit" class="btn btn-warning btn-flat"><i class="fa fa-warning"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="<?php echo base_url('assets'); ?>/plugins/jQuery/jquery-2.2.3.min.js"></script>
    <script src="<?php echo base_url('assets'); ?>/bootstrap/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url('assets'); ?>/plugins/iCheck/icheck.min.js"></script>
    <script src="<?php echo base_url('assets'); ?>/dist/js/app.min.js"></script>
<!--    <script>
        $(function() {
    $(window).resize(function() {
        $('div:last').height($(window).height() - $('div:last').offset().top);
    });
    $(window).resize();
});
    </script>-->
</body>
</html>
