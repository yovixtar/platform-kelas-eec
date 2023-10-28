<?php
	if (isset($_POST['action_addPoint'])) {
		$addPoint = mysqli_query($l, "UPDATE jawaban_tugas SET point_jt=".$_POST['pointadd']." WHERE id_jt=".$_POST['id_jawaban']);
	}
?>
<script type="text/javascript">
	document.location='?page=viewassignment&idx=<?php echo $_POST['id_tugas'] ?>'
</script>