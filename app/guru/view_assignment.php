<?php
$stat_view = mysqli_query($l, "SELECT * FROM tugas WHERE id_tugas=".$_GET['idx']." ");
$data_view = mysqli_fetch_array($stat_view);
?>
<h1><?php echo $data_view['judul_tugas'] ?></h1>
<p><?php echo $data_view['text_tugas'] ?></p>
<br />
<?php
if (empty($data_view['video_tugas'])) {
	# code...
}else{
	?>
	<video width="290" height="200" controls>
    <source src="tugas/video/<?php echo $data_view['video_tugas'] ?>" type="video/mp4">
  	</video>
	<?php
}
?>
<?php
if (empty($data_view['audio_tugas'])) {
	# code...
}else{
	?>
	<video width="290" height="200" controls>
    <source src="tugas/audio/<?php echo $data_view['audio_tugas'] ?>" type="audio/mp3">
    <p>Audio</p>
  	</video>
	<?php
}
?>
<br />
<button class="w3-btn w3-blue" style="width: 80vw;font-size:20px;margin-bottom: 20px;" onclick="document.getElementById('modal-daftar-nilai').style.display='block' ">Lihat Daftar Nilai</button>
<div id="modal-daftar-nilai" class="w3-modal">
  <div class="w3-modal-content w3-animate-top w3-card-4">
    <header class="w3-container w3-blue"> 
      <span onclick="document.getElementById('modal-daftar-nilai').style.display='none'" 
      class="w3-button w3-display-topright">&times;</span>
      <h2>Daftar Nilai</h2>
    </header>
    <div class="w3-container w3-responsive">
    <br />
      <table class="w3-table-all">
      
      	<tr>
      		<th class="w3-blue">No</th>
      		<th class="w3-blue">Nama</th>
      		<th class="w3-blue">Nilai</th>
      	</tr>
      	<?php
      	$stat_daftar_nilai = mysqli_query($l, "SELECT * FROM jawaban_tugas jt JOIN siswa s ON jt.siswa_jt=s.id_siswa WHERE tugas_jt=".$_GET['idx']." ORDER BY siswa_jt ASC ");
      	while ($data_daftar_nilai=mysqli_fetch_array($stat_daftar_nilai)) {
      		?>
      		<tr>
      			<td><?php echo $data_daftar_nilai['siswa_jt'] ?></td>
      			<td><?php echo $data_daftar_nilai['nama_siswa'] ?></td>
      			<td><?php echo $data_daftar_nilai['point_jt'] ?></td>
      		</tr>
      		<?php
      	}
      	?>
      	
      </table>
      <br />
    </div>
  </div>
</div>
  
<h3 style="float: left">Answered :</h3>
<?php
$stat_jawaban = mysqli_query($l, "SELECT * FROM jawaban_tugas jt JOIN siswa s ON jt.siswa_jt=s.id_siswa WHERE tugas_jt=".$_GET['idx']." ORDER BY siswa_jt ASC ");
while ($data_jawaban=mysqli_fetch_array($stat_jawaban)) {
?>  
<button class="accordion"><?php echo $data_jawaban['nama_siswa']; ?></button>
<div class="panel">
  <p><?php echo $data_jawaban['text_jt']; ?></p>
  <?php
  if (empty($data_jawaban['video_jt'])) {
    # code...
  }else{
    ?>
    <video width="290" height="200" controls>
      <source src="jawaban_tugas/<?php echo $data_jawaban['video_jt'] ?>" type="video/mp4">
    </video>
    <?php
  }
  ?>
  	<?php
  	if (empty($data_jawaban['point_jt'])) {
  		?>
  		<button onclick="document.getElementById('modal-nilai<?php echo $data_jawaban['id_jt'] ?>').style.display='block' " class="w3-btn w3-blue" style="width: 80vw;font-size:20px;margin-bottom: 20px;">Point</button>
  		
  		<div id="modal-nilai<?php echo $data_jawaban['id_jt'] ?>" class="w3-modal" style="">
		  <div class="w3-modal-content w3-animate-top w3-card-4">
		    <header class="w3-container w3-blue"> 
		      <span onclick="document.getElementById('modal-nilai<?php echo $data_jawaban['id_jt'] ?>').style.display='none'" 
		      class="w3-button w3-display-topright">&times;</span>
		      <h2>Add Point</h2>
		    </header>
		    <div class="w3-container w3-responsive">
		    <p>Point :</p>
		    <form action="?page=addpoint" method="POST">
		    	<input type="number" name="id_jawaban" value="<?php echo $data_jawaban['id_jt'] ?>" style="display: none">
		    	<input type="number" name="id_tugas" value="<?php echo $data_jawaban['tugas_jt'] ?>" style="display: none">
		    	<textarea style="font-size: 50px" class="w3-input w3-border w3-border-blue" rows="2" name="pointadd"></textarea>
		    	<input type="submit" name="action_addPoint" value="OK!" class="btn-go">
		    </form>
		      <br />
		    </div>
		  </div>
		</div>
  		<?php
  	}else{
  		?>
  		<button onclick="document.getElementById('modal-edit-nilai<?php echo $data_jawaban['id_jt'] ?>').style.display='block' " class="w3-btn w3-blue" style="width: 80vw;font-size:20px;margin-bottom: 20px;">Edit Point</button>
  		<div id="modal-edit-nilai<?php echo $data_jawaban['id_jt'] ?>" class="w3-modal" style="">
		  <div class="w3-modal-content w3-animate-top w3-card-4">
		    <header class="w3-container w3-blue"> 
		      <span onclick="document.getElementById('modal-edit-nilai<?php echo $data_jawaban['id_jt'] ?>').style.display='none'" 
		      class="w3-button w3-display-topright">&times;</span>
		      <h2>Edit Point</h2>
		    </header>
		    <div class="w3-container w3-responsive">
		    <p>Point :</p>
		    <form action="?page=editpoint" method="POST">
		    	<input type="number" name="id_jawaban" value="<?php echo $data_jawaban['id_jt'] ?>" style="display: none">
		    	<input type="number" name="id_tugas" value="<?php echo $data_jawaban['tugas_jt'] ?>" style="display: none">
		    	<textarea style="font-size: 50px" class="w3-input w3-border w3-border-blue" rows="2" name="pointedit"><?php echo $data_jawaban['point_jt'] ?></textarea>
		    	<input type="submit" name="action_editPoint" value="OK!" class="btn-go">
		    </form>
		      <br />
		    </div>
		  </div>
		</div>
  		<?php
  	}
  	?>
</div>

<?php
};

	?>


<script>
var acc = document.getElementsByClassName("accordion");
var i;

for (i = 0; i < acc.length; i++) {
  acc[i].addEventListener("click", function() {
    this.classList.toggle("active");
    var panel = this.nextElementSibling;
    if (panel.style.maxHeight){
      panel.style.maxHeight = null;
    } else {
      panel.style.maxHeight = panel.scrollHeight + "px";
    } 
  });
}
</script>
<br />
<br />
<br />