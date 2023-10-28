<?php
if (isset($_POST['login_siswa'])) {
	$idx = $_POST['id_siswa'];
	$pin = $_POST['pin_siswa'];
	
	$stat_login = mysqli_query($l, "SELECT * FROM login_siswa WHERE id_login_siswa=".$idx." AND pin_login_siswa=".$pin." ");
	$data_login = mysqli_fetch_array($stat_login);
	if (empty($data_login['id_login_siswa'])) {
		?>
		<script type="text/javascript">
			document.location = 'login.php?log=salah'
		</script>
		<?php
	}else{
		$_SESSION['siswa'] = $idx;
		?>
		<script type="text/javascript">
			document.location = 'siswa.php'
		</script>
		<?php
	}
}
?>