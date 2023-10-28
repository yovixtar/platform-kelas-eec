<?php
if (isset($_POST['save'])) {
	$stat_add1 = mysqli_query($l, "INSERT INTO tugas SET judul_tugas ='".$_POST['judul']."'");
	if (isset($_POST['content'])) {
		$stat_add2 = mysqli_query($l, "UPDATE tugas SET text_tugas ='".$_POST['content']."' WHERE judul_tugas ='".$_POST['judul']."' ");
	}
	if (isset($_FILES['video']['name'])) {
		$sumber_v = $_FILES['video']['tmp_name'];
		$target_v = 'tugas/video/'.$_FILES['video']['name'];
		
		if (move_uploaded_file($sumber_v, $target_v)) {
			$nama_v = $_FILES['video']['name'];
			$stat_add3 = mysqli_query($l, "UPDATE tugas SET video_tugas ='".$nama_v."' WHERE judul_tugas ='".$_POST['judul']."'");
		}else{

		}
	}
	if (isset($_FILES['audio']['name'])) {
		$sumber_a = $_FILES['audio']['tmp_name'];
		$target_a = 'tugas/audio/'.$_FILES['audio']['name'];
		
		if (move_uploaded_file($sumber_a, $target_a)) {
			$nama_a = $_FILES['audio']['name'];
			$stat_add4 = mysqli_query($l, "UPDATE tugas SET audio_tugas ='".$nama_a."' WHERE judul_tugas ='".$_POST['judul']."'");
		}else{

		}
	}
	?>
	<script type="text/javascript">
		document.location = 'guru_kss-eec.php';
		alert('Successfull !');
	</script>
	<?php
}
?>
<h1>add Assignment</h1>
<form action="" method="POST" style="width: 80vw" enctype="multipart/form-data">
	<input type="text" name="judul" class="w3-input w3-border-blue" placeholder="add Title">
	<label style="float: left">Title</label><br /> <br />
	<textarea name="content" class="w3-input w3-border w3-border-blue" rows="5"></textarea>
	<label style="float: left;">Contents</label><br /> <br />
	
	<input type="file" accept="video/*" name="video" id="file-1" class="inputfile inputfile-4" data-multiple-caption="{count} files selected" multiple style="display: none" />
	<label style="" for="file-1"><figure><svg xmlns="http://www.w3.org/2000/svg" width="20" height="17" viewBox="0 0 20 17"><path d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z"/></svg></figure> <span>Pilih Video&hellip;</span></label>
	
	<input type="file" accept="audio/*" name="audio" id="file-2" class="inputfile inputfile-4" data-multiple-caption="{count} files selected" multiple style="display: none" />
	<label style="" for="file-2"><figure><svg xmlns="http://www.w3.org/2000/svg" width="20" height="17" viewBox="0 0 20 17"><path d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z"/></svg></figure> <span>Pilih Audio&hellip;</span></label>
	<br />
	
	<input type="submit" class="btn-go" value="Go!" name="save" style="margin-top: 30px">
	<br />
	<br />
	<br />
	<br />
</form>