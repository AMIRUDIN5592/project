<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width initial-scale=1.0">
    <title>Admincast bootstrap 4 &amp; angular 5 admin template, Шаблон админки | Login</title>
    <!-- GLOBAL MAINLY STYLES-->
    <link href="<?php echo base_url('assets');?>/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="<?php echo base_url('assets');?>/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet" />
    <link href="<?php echo base_url('assets');?>/vendors/themify-icons/css/themify-icons.css" rel="stylesheet" />
	
    <!-- THEME STYLES-->
    <link href="<?php echo base_url('assets');?>/css/main.css" rel="stylesheet" />
    <!-- PAGE LEVEL STYLES-->
    <link href="<?php echo base_url('assets');?>/css/pages/auth-light.css" rel="stylesheet" />
</head>
<?php
if ($this->session->flashdata('alert') == 'gagal_login') {
        echo "<script>alert('Login Gagal Cek Kembali User dan Password Anda');</script>";
      }
        else if ($this->session->flashdata('alert') == 'sukses_login') {
        echo "<script>alert('Login Sukses');</script>".exit;
      }
      else if($this->session->flashdata('alert') == 'gagal_login_first'){
        echo "<script>alert('Mohon untuk login terlebih dahulu');</script>";
      }
	  ?>
<body class="bg-blue-300">
    <div class="content" style="margin-top:5%;">
        <!--div class="brand">
            <a class="link" href="index.html">AdminCAST</a>
        </div-->
		
        <form id="login-form" action="<?php echo site_url('slipgaji/cpage/action_login');?>" role="form" method="post">
            <h2 class="login-title">Log in HCMD Slip Gaji</h2>
            <div class="form-group">
                <div class="input-group-icon right">
                    <div class="input-icon"><i class="fa fa-user"></i></div>
                    <input class="form-control" type="username" name="username" placeholder="Username" autocomplete="off">
                </div>
            </div>
            <div class="form-group">
                <div class="input-group-icon right">
                    <div class="input-icon"><i class="fa fa-lock font-16"></i></div>
                    <input class="form-control" type="password" name="password" placeholder="Password">
                </div>
            </div>
            
            <div class="form-group">
			
                <button class="btn btn-info btn-block" type="Submit" Value="Submit">Login</button>
            </div>
            <div class="social-auth-hr">
                <span>Link APK File</span>
            </div>
            <div class="text-center social-auth m-b-20">
                <a href="#">Download apk slip gaji</a> 
            </div>
            
        </form>
    </div>
    <!-- BEGIN PAGA BACKDROPS-->
    <div class="sidenav-backdrop backdrop"></div>
    <div class="preloader-backdrop">
        <div class="page-preloader">Loading</div>
    </div>
    <!-- END PAGA BACKDROPS-->
    <!-- CORE PLUGINS -->
    <script src="<?php echo base_url('assets');?>/vendors/jquery/dist/jquery.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url('assets');?>/vendors/popper.js/dist/umd/popper.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url('assets');?>/vendors/bootstrap/dist/js/bootstrap.min.js" type="text/javascript"></script>
    <!-- PAGE LEVEL PLUGINS -->
    <script src="<?php echo base_url('assets');?>/vendors/jquery-validation/dist/jquery.validate.min.js" type="text/javascript"></script>
    <!-- CORE SCRIPTS-->
	<!-- PAGE LEVEL PLUGINS -->
    <script src="<?php echo base_url('assets');?>/vendors/jquery-validation/dist/jquery.validate.min.js" type="text/javascript"></script>
	
    <script src="<?php echo base_url('assets');?>/js/app.js" type="text/javascript"></script>
    <!-- PAGE LEVEL SCRIPTS-->
    <script type="text/javascript">
        $(function() {
            $('#login-form').validate({
                errorClass: "help-block",
                rules: {
                    email: {
                        required: true,
                        email: true
                    },
                    password: {
                        required: true
                    }
                },
                highlight: function(e) {
                    $(e).closest(".form-group").addClass("has-error")
                },
                unhighlight: function(e) {
                    $(e).closest(".form-group").removeClass("has-error")
                },
            });
        });
    </script>
</body>

</html>