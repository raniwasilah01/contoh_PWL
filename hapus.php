<?php 
require 'functions.php';

$id = $_GET["id"];

if( hapus($id) > 0 ) {
	echo "
		<script>
			alert('Selamat berhasil dihapus!');
			document.location.href = 'product.php';
		</script>
	";
} else {
	echo "
		<script>
			alert('Selamat gagal ditambahkan!');
			document.location.href = 'index.php';
		</script>
	";
}

?>