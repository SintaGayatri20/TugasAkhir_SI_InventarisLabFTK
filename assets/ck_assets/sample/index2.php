<?php
$servername = "localhost";
$database = "tes_form";
$username = "root";
$password = "";

// untuk tulisan bercetak tebal silakan sesuaikan dengan detail database Anda
// membuat koneksi
$conn = mysqli_connect($servername, $username, $password, $database);
// mengecek koneksi
if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
echo "Koneksi berhasil";
//mysqli_close($conn);
?>


<script src="../ckeditor.js"></script>
	<script src="js/sample.js"></script>
	<link rel="stylesheet" href="css/samples.css">
	<link rel="stylesheet" href="toolbarconfigurator/lib/codemirror/neo.css">

<br><br><br>

	<form action="" method="post">
 			<textarea id="editor" name="editor">
			<h1>Hello Cok!</h1>
		<p>I'm an instance of <a href="https://ckeditor.com">CKEditor</a>.</p>
	</textarea>

<input type="submit" name="submit" value="Simpan"/>
</form>

<?php 


//echo $_POST['editor'];

if (isset($_POST['submit'])) {

	echo $_POST['editor'];
	mysqli_query($conn,"INSERT INTO tb_form values('','$_POST[editor]')");

}else{


}


?>
</div>

<script>
	initSample();
</script>
