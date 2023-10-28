<?php
if (isset($_POST['answer'])) {
	echo "Please Wait..... Send Answer !";
	$add_answer1 = mysqli_query($l, "INSERT INTO jawaban_tugas SET siswa_jt=".$_POST['id_siswa'].", tugas_jt=".$_POST['id_tugas']." ");
	if (empty($_POST['text'])) {
		# code...
	}else{
		$add_answer2 = mysqli_query($l, "UPDATE jawaban_tugas SET text_jt='".$_POST['text']."' WHERE siswa_jt=".$_POST['id_siswa']." AND tugas_jt=".$_POST['id_tugas']." ");
	}
	if (empty($_FILES['video']['name'])) {
		
	}else{
		$sumber_v = $_FILES['video']['tmp_name'];
		$target_v = 'jawaban_tugas/'.$_FILES['video']['name'];
		
		if (move_uploaded_file($sumber_v, $target_v)) {
			$nama_v = $_FILES['video']['name'];
			$stat_add3 = mysqli_query($l, "UPDATE jawaban_tugas SET video_jt ='".$nama_v."' WHERE siswa_jt=".$_POST['id_siswa']." AND tugas_jt=".$_POST['id_tugas']."");
		}
	}
	?>
	<script type="text/javascript">
		document.location = '?page=viewassignment&idx=<?php echo $_POST['id_tugas'] ?>';
		alert('Success Full !');
	</script>
	<?php
}
?>