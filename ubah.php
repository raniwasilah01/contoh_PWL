<?php
require 'functions.php';

// ambil data di URL
$id = $_GET["id"];

// query data omo berdasarkan id
$mhs = query("SELECT * FROM product WHERE id = $id")[0];


// cek apakah tombol submit sudah ditekan atau belum
if( isset($_POST["submit"]) ) {
	
	// cek apakah data berhasil diubah atau tidak
	if( ubah($_POST) > 0 ) {
		echo "
			<script>
				alert('data berhasil diubah!');
				document.location.href = 'index.php';
			</script>
		";
	} else {
		echo "
			<script>
				alert('data gagal diubah!');
				document.location.href = 'index.php';
			</script>
		";
	}


}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Ubah data omo</title>
</head>
<body>
	<h1>Ubah data omo</h1>

	<form action="" method="post" enctype="multipart/form-data">
		<input type="hidden" name="id" value="<?= $mhs["id"]; ?>">
		<input type="hidden" name="n_imagesLama" value="<?= $mhs["n_images"]; ?>">
		<ul>
			<li>
				<label for="n_price">n_price : </label>
				<input type="text" name="n_price" id="n_price" required value="<?= $mhs["n_price"]; ?>">
			</li>
			<li>
				<label for="n_product">n_product : </label>
				<input type="text" name="n_product" id="n_product" value="<?= $mhs["n_product"]; ?>">
			</li>
			<li>
				<label for="n_desc">n_desc :</label>
				<input type="text" name="n_desc" id="n_desc" value="<?= $mhs["n_desc"]; ?>">
			</li>
			<li>
				<label for="n_images">n_images :</label> <br>
				<img src="produk/<?= $mhs['n_images']; ?>" width="40"> <br>
				<input type="file" name="n_images" id="n_images">
			</li>
			<li>
				<button type="submit" name="submit">Ubah Data!</button>
			</li>
		</ul>

	</form>




</body>
</html>