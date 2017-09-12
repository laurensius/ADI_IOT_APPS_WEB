<!doctype html>
<html>
<head>
<script src="<?php echo base_url();?>assets/global/plugins/jquery.min.js" type="text/javascript"></script>
       
</head>
<body>
<form>
<table>
<tr>
<td>Username</td>
<td>:</td>
<td><input type="text" name="username" required id="username"></td>
</tr>
<tr>
<td>Password</td>
<td>:</td>
<td><input type="password" name="password" required id="password"></td>
</tr>
<tr>
<td colspan="3"><input type="button" onClick="cek();" value="Login Cek"></td>
</tr>
<table>
</form>                
<script type="text/javascript">
function cek(){
	var input_u = document.getElementById("username").value;
	var input_p = document.getElementById("password").value;
	var str_tabel = '';
	alert(input_u + " & " + input_p);
	var post = {
		"username" : input_u,
		"password" : input_p,
	};	
	$.ajax({
		url : "<?php echo site_url(); ?>/adi/monitoringketinggian/verifikasi",
		type : "POST",
		dataType : "json",
		data: post,
		success : function(response){
			console.log(response);
		},
		error : function(response){
			console.log("Error gan");
		},
	});
}
</script>
</body>
</html>
