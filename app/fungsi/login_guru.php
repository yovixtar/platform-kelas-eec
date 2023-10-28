<?php
if (isset($_POST['login_guru'])) {
	$pin = md5($_POST['pin_guru']);
	$stat_login = mysqli_query($l, "SELECT * FROM login_guru WHERE pin_guru='".$pin."'");
	$data_login = mysqli_fetch_array($stat_login);
	if (empty($data_login['pin_guru'])) {
		?>
		<script type="text/javascript">
			document.location = 'login.php?log=salah'
		</script>
		<?php
	}else{
		$_SESSION['guru'] = $data_login['nama_guru'];
		?>
		<script type="text/javascript">
			document.location = 'guru_kss-eec.php'
		</script>
		<?php
	}
}
?>