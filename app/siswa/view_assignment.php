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
<br />
<?php
$data_jawaban = mysqli_fetch_array(mysqli_query($l, "SELECT * FROM jawaban_tugas WHERE tugas_jt=".$_GET['idx']." AND siswa_jt=".$_SESSION['siswa']." "));
if (empty($data_jawaban['id_jt'])) {
  ?>
  <p>Jawab :</p>
  <form action="?page=answerassignment" method="POST" enctype="multipart/form-data">
  <input type="number" name="id_siswa" value="<?php echo $_SESSION['siswa'] ?>" style="display: none">
  <input type="number" name="id_tugas" value="<?php echo $_GET['idx'] ?>" style="display: none">
  <textarea class="w3-input w3-border w3-border-blue" name="text" rows="7"></textarea>
  <br />
    <input type="file" accept="video/*" name="video" id="file-1" class="inputfile inputfile-4" data-multiple-caption="{count} files selected" multiple style="display: none" />
  <label style="" for="file-1"><figure><svg xmlns="http://www.w3.org/2000/svg" width="20" height="17" viewBox="0 0 20 17"><path d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z"/></svg></figure> <span>Pilih Video&hellip;</span></label>
  <br />
  <br />
  <br />
  <br />

  <input type="submit" name="answer" value="Send!" class="btn-go" onclick="document.getElementById('pw').style.display='block' ">
  </form>
  <h3 id="pw" style="display:none">Please Wait..... Send Answer !</h3>
<?php
}else{
  $data_siswa = mysqli_fetch_array(mysqli_query($l, "SELECT * FROM siswa WHERE id_siswa=".$_SESSION['siswa']));
?>  
<button class="accordion"><?php echo $data_siswa['nama_siswa']; ?></button>
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
  <button class="w3-btn w3-blue" style="width: 80vw;font-size:20px;margin-bottom: 20px;" onclick="document.getElementById('modal-nilai').style.display='block' ">Point</button>
</div>

<div id="modal-nilai" class="w3-modal">
  <div class="w3-modal-content w3-animate-top w3-card-4">
    <header class="w3-container w3-blue"> 
      <span onclick="document.getElementById('modal-nilai').style.display='none'" 
      class="w3-button w3-display-topright">&times;</span>
      <h2>Nilai</h2>
    </header>
    <div class="w3-container w3-responsive">
    <h1><?php echo $data_jawaban['point_jt'] ?></h1>
      <br />
    </div>
  </div>
</div>

<?php } ?>
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