<!DOCTYPE html>
<html>
<head>
	<title>English EXOT1S Class</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="Shortcut Icon" href="/favicon.ico" type="image/x-icon" />
	<meta name="description" content="" />
	<meta name="keywords" content="" />
	<link rel="stylesheet" type="text/css" href="assets/w3.css">
	<link rel="stylesheet" type="text/css" href="assets/my.css">
	<script type="text/javascript">
		
	</script>
	<style type="text/css">
		
	</style>
</head>
<body>
<center>
	<h1>EXOT1S English Class</h1>
	<hr style="margin: 0px; width: 90vw;border: 3px solid #000;margin-bottom: 2px;">
	<hr style="margin: 0px; width: 90vw;border: 1.2px solid #000">
	<h1>Login !</h1>
	<br />
	<button class="w3-btn w3-blue" style="width: 80vw;font-size:20px;margin-bottom: 20px;" onclick="document.getElementById('login_guru').style.display='block';document.getElementById('login_siswa').style.display='none'; ">Teacher</button> <br />
	<div style="display: none" id="login_guru">
	<form action="login.php?log=guru" method="POST">
		<input class="w3-input w3-border-blue" style="width: 90vw" type="password" name="pin_guru" placeholder="PIN"><br />
		<input class="btn-go" type="submit" name="login_guru" value="Go !">
	</form>
	</div>
	<br />
	<button class="w3-btn w3-blue" style="width: 80vw;font-size:20px;margin-bottom: 20px;" onclick="document.getElementById('login_siswa').style.display='block';document.getElementById('login_guru').style.display='none'; ">Student</button> <br />
	<div style="display: none" id="login_siswa">
	<form action="login.php?log=siswa" method="POST">
		<input class="w3-input w3-border-blue" style="width: 90vw" type="number" name="id_siswa" placeholder="Absen"><br />
		<input class="w3-input w3-border-blue" style="width: 90vw" type="password" name="pin_siswa" placeholder="PIN"><br />
		<input class="btn-go" type="submit" name="login_siswa" value="Go !">
	</form>
	</div>
</center>
</body>
</html>