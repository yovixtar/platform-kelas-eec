<?php
session_start();
include 'base/koneksi.php';
$sw_l = isset($_GET['log']) ? $_GET['log'] : null;
switch ($sw_l) {
	case 'guru':
		include 'app/fungsi/login_guru.php';
		break;
	case 'siswa':
		include 'app/fungsi/login_siswa.php';
		break;
	case 'salah':
		include 'app/fungsi/salah_login.php';
		break;
	case 'logout':
		include 'app/fungsi/logout.php';
		break;
	
	default:
		?>
		<script type="text/javascript">
			document.location = 'index.php';
		</script>
		<?php
		break;
}
?>