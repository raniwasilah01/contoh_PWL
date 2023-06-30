<?php
require 'functions.php';

// apakah tombol submit sudah ditekan atau belum
if( isset($_POST["submit"]) ) {
	
	// apakah data berhasil di tambahkan atau tidak
	if( tambah($_POST) > 0 ) {
		echo "
			<script>
				alert('Selamat berhasil ditambahkan!');
				document.location.href = 'product.php';
			</script>
		";
	} else {
		echo "
			<script>
				alert('Selamat gagal ditambahkan!');
				document.location.href = 'product.php';
			</script>
		";
	}


}
?>