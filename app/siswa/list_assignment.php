<h1>List Assignment</h1>
<?php
$stat_list = mysqli_query($l, "SELECT * FROM tugas ORDER BY id_tugas DESC");
while ($data_list=mysqli_fetch_array($stat_list)) {
	?>
	<a style="text-decoration:none" href="?page=viewassignment&idx=<?php echo $data_list['id_tugas'] ?>">
	<div class="box-assignment">
		<h3 style="text-decoration: none"><?php echo $data_list['judul_tugas'] ?></h3>
		<p style="text-decoration: none"><?php echo $data_list['text_tugas'] ?></p>
	</div>
	</a>
	<?php
}
?>