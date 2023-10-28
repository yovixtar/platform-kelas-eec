<?php
session_start();
include 'base/koneksi.php';
if (!$_SESSION['siswa']) {
	?>
	<script type="text/javascript">
		document.location = 'index.php';
		alert('Please Login First !')
	</script>
	<?php
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Student Page | EE Class</title>
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

.js .inputfile {
    width: 0.1px;
    height: 0.1px;
    opacity: 0;
    overflow: hidden;
    position: absolute;
    z-index: -1;
}

.inputfile + label {
    max-width: 80%;
    font-size: 1.25rem;
    /* 20px */
    font-weight: 700;
    text-overflow: ellipsis;
    white-space: nowrap;
    cursor: pointer;
    display: inline-block;
    overflow: hidden;
    padding: 0.625rem 1.25rem;
    /* 10px 20px */
}

.no-js .inputfile + label {
    display: none;
}

.inputfile:focus + label,
.inputfile.has-focus + label {
    outline: 1px dotted #000;
    outline: -webkit-focus-ring-color auto 5px;
}

.inputfile + label * {
    /* pointer-events: none; */
    /* in case of FastClick lib use */
}

.inputfile + label svg {
    width: 1em;
    height: 1em;
    vertical-align: middle;
    fill: currentColor;
    margin-top: -0.25em;
    /* 4px */
    margin-right: 0.25em;
    /* 4px */
}
/* style 4 */

.inputfile-4 + label {
    color: #d3394c;
}

.inputfile-4:focus + label,
.inputfile-4.has-focus + label,
.inputfile-4 + label:hover {
    color: #722040;
}

.inputfile-4 + label figure {
    width: 100px;
    height: 100px;
    border-radius: 50%;
    background-color: #d3394c;
    display: block;
    padding: 20px;
    margin: 0 auto 10px;
}

.inputfile-4:focus + label figure,
.inputfile-4.has-focus + label figure,
.inputfile-4 + label:hover figure {
    background-color: #722040;
}

.inputfile-4 + label svg {
    width: 100%;
    height: 100%;
    fill: #f1e5e6;
}

	</style>
</head>
<body>

<center>
<h1>EXOT1S English Class</h1>
<hr style="margin: 0px; width: 90vw;border: 3px solid #000;margin-bottom: 2px;">
<hr style="margin: 0px; width: 90vw;border: 1.2px solid #000">
<?php
$data_siswa = mysqli_fetch_array(mysqli_query($l, "SELECT * FROM siswa WHERE id_siswa =".$_SESSION['siswa']));
?>
<a href="?" style="color: red;text-decoration: none" ><h1><?php echo $data_siswa['nama_siswa'] ?></h1></a>
<br />

<?php
$sw_page = isset($_GET['page']) ? $_GET['page'] : null;
switch ($sw_page) {
	case 'listassignment':
		include 'app/siswa/list_assignment.php';
		break;
	case 'viewassignment':
		include 'app/siswa/view_assignment.php';
		break;
	case 'answerassignment':
		include 'app/siswa/answer_assignment.php';
		break;
	
	default:
		include 'app/siswa/default.php';
		break;
}
?>
<br />
<a href="login.php?log=logout">
	<button class="w3-blue w3-btn" style="width: 80vw;font-size:20px;margin-bottom: 20px;">Lougout</button>
</a>
</center>
<script type="text/javascript">
	/*
	By Osvaldas Valutis, www.osvaldas.info
	Available for use under the MIT License
*/

'use strict';

;( function ( document, window, index )
{
	var inputs = document.querySelectorAll( '.inputfile' );
	Array.prototype.forEach.call( inputs, function( input )
	{
		var label	 = input.nextElementSibling,
			labelVal = label.innerHTML;

		input.addEventListener( 'change', function( e )
		{
			var fileName = '';
			if( this.files && this.files.length > 1 )
				fileName = ( this.getAttribute( 'data-multiple-caption' ) || '' ).replace( '{count}', this.files.length );
			else
				fileName = e.target.value.split( '\\' ).pop();

			if( fileName )
				label.querySelector( 'span' ).innerHTML = fileName;
			else
				label.innerHTML = labelVal;
		});

		// Firefox bug fix
		input.addEventListener( 'focus', function(){ input.classList.add( 'has-focus' ); });
		input.addEventListener( 'blur', function(){ input.classList.remove( 'has-focus' ); });
	});
}( document, window, 0 ));
</script>
</body>
</html>