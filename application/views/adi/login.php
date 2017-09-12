<html lang="en"><!--<![endif]--><!-- BEGIN HEAD -->
    <head>
        <meta charset="utf-8" />
        <title>Automation System</title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1" name="viewport" />
        <meta content="Automation System " name="description" />
        <meta content="Laurensius Dede Suhardiman" name="author" />
        <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&amp;subset=all" rel="stylesheet" type="text/css">
        <link href="<?php echo base_url();?>assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
        <link href="<?php echo base_url();?>assets/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css">
        <link href="<?php echo base_url();?>assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
        <link href="<?php echo base_url();?>assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css" rel="stylesheet" type="text/css">
        <link href="<?php echo base_url();?>assets/global/plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css">
        <link href="<?php echo base_url();?>assets/global/plugins/select2/css/select2-bootstrap.min.css" rel="stylesheet" type="text/css">
        <link href="<?php echo base_url();?>assets/global/css/components.min.css" rel="stylesheet" id="style_components" type="text/css">
        <link href="<?php echo base_url();?>assets/global/css/plugins.min.css" rel="stylesheet" type="text/css">
        <link href="<?php echo base_url();?>assets/pages/css/login.min.css" rel="stylesheet" type="text/css">
        <link rel="shortcut icon" href="favicon.ico">    
	</head>
	<body class=" login">
        <?php
        if(!isset($message)){
          $message = "Silahkan masukkan username dan password";
        }

        if(!isset($message_severity)){
          $message_severity = "info";
        }
        ?>
<!--        <div class="logo">
            <a href="#">
                <img src="<?php echo base_url();?>assets/img/logo.png" alt=""> 
            </a>
        </div>-->
	<div class="content">
		<form class="login-form" action="<?php echo site_url(); ?>/adi/monitoringketinggian/verifikasi/" method="post">
                <h3 class="form-title font-green">Sign In</h3>
			<div class="alert alert-<?php echo $message_severity ?> alert-dismissable">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <?php echo $message; ?>.
			</div>
			<div class="form-group">
				<label class="control-label visible-ie8 visible-ie9">Username</label>
				<input class="form-control form-control-solid placeholder-no-fix" type="text" autocomplete="off" placeholder="Username" name="username" required id="username">
			</div>
			<div class="form-group">
				<label class="control-label visible-ie8 visible-ie9">Password</label>
				<input class="form-control form-control-solid placeholder-no-fix" type="password" autocomplete="off" placeholder="Password" name="password" required id="password">
			</div>
			<div class="form-actions">
				<input type="button" onClick="cek();" value="Login Cek"></td>
			</div>
			<div class="create-account">
				<p>
					<a href="javascript:;" id="register-btn" class="uppercase">Integrated IoT Projects</a>
				</p>
			</div>
		</form>
	</div>			
		<script type="text/javascript">
		function cek(){
			var input_u = document.getElementById("username").value;
			var input_p = document.getElementById("password").value;
			console.log("username : " + input_u);
			console.log("password : " + input_p);
			var str_tabel = '';
			var post = {
				"username" : input_u,
				"password" : input_p,
			};	
			$.ajax({
				url : "<?php echo site_url(); ?>/monitoringketinggian/verifikasi",
				type : "POST",
				dataType : "json",
				data: post,
				success : function(response){
					console.log(response);
					window.location = "<?php echo site_url(); ?>/monitoringketinggian/";
				},
				error : function(response){
					console.log("Error gan");
				},
			});
		}
		</script>
        <script src="<?php echo base_url();?>assets/global/plugins/jquery.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url();?>assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url();?>assets/global/plugins/js.cookie.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url();?>assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url();?>assets/global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url();?>assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url();?>assets/global/plugins/jquery-validation/js/jquery.validate.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url();?>assets/global/plugins/jquery-validation/js/additional-methods.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url();?>assets/global/plugins/select2/js/select2.full.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url();?>assets/global/scripts/app.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url();?>assets/pages/scripts/login.min.js" type="text/javascript"></script>
	</body>
</html>
