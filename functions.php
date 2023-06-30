<?php 
// koneksi ke database
$conn = mysqli_connect("localhost", "root", "", "omo");


function query($query) {
	global $conn;
	$result = mysqli_query($conn, $query);
	$rows = [];
	while( $row = mysqli_fetch_assoc($result) ) {
		$rows[] = $row;
	}
	return $rows;
}


function tambah($data) {
	global $conn;

	
	$n_product = htmlspecialchars($data["n_product"]);
    $n_price = htmlspecialchars($data["n_price"]);
	$n_desc = htmlspecialchars($data["n_desc"]);
    

	// upload n_images
	$n_images = upload();
	if( !$n_images ) {
		return false;
	}

	$query = "INSERT INTO product
				VALUES
			  ('','$n_images', '$n_price','$n_product', '$n_desc')
			";
	mysqli_query($conn, $query);

	return mysqli_affected_rows($conn);
}


function upload() {

	$n_productFile = $_FILES['n_images']['name'];
	$ukuranFile = $_FILES['n_images']['size'];
	$error = $_FILES['n_images']['error'];
	$tmpName = $_FILES['n_images']['tmp_name'];

	// cek apakah tidak ada n_images yang diupload
	if( $error === 4 ) {
		echo "<script>
				alert('pilih n_images terlebih dahulu!');
			  </script>";
		return false;
	}

	// cek apakah yang diupload adalah n_images
	$ekstensin_imagesValid = ['jpg', 'jpeg', 'png', 'JPEG'];
	$ekstensin_images = explode('.', $n_productFile);
	$ekstensin_images = strtolower(end($ekstensin_images));
	if( !in_array($ekstensin_images, $ekstensin_imagesValid) ) {
		echo "<script>
				alert('yang anda upload bukan n_images!');
			  </script>";
		return false;
	}

	// cek jika ukurannya terlalu besar
	if( $ukuranFile > 10000000 ) {
		echo "<script>
				alert('ukuran n_images terlalu besar!');
			  </script>";
		return false;
	}

	// lolos pengecekan, n_images siap diupload
	// generate n_product n_images baru
	$n_productFileBaru = uniqid();
	$n_productFileBaru .= '.';
	$n_productFileBaru .= $ekstensin_images;

	move_uploaded_file($tmpName, 'produk/' . $n_productFileBaru);

	return $n_productFileBaru;
}




function hapus($id) {
	global $conn;
	mysqli_query($conn, "DELETE FROM product WHERE id = $id");
	return mysqli_affected_rows($conn);
}


function ubah($data) {
	global $conn;

	$id = $data["id"];
	
	$n_product = htmlspecialchars($data["n_product"]);
    $n_price = htmlspecialchars($data["n_price"]);
	$n_desc = htmlspecialchars($data["n_desc"]);
	$n_imagesLama = htmlspecialchars($data["n_imagesLama"]);
	
	// cek apakah user pilih n_images baru atau tidak
	if( $_FILES['n_images']['error'] === 4 ) {
		$n_images = $n_imagesLama;
	} else {
		$n_images = upload();
	}
	

	$query = "UPDATE product SET			
				n_product = '$n_product',
                n_images = '$n_images',
                n_price = '$n_price',
				n_desc = '$n_desc'
				
			  WHERE id = $id
			";

	mysqli_query($conn, $query);

	return mysqli_affected_rows($conn);	
}


function cari($keyword) {
	$query = "SELECT * FROM product
				WHERE
			  n_product LIKE '%$keyword%' OR
              n_images LIKE '%$keyword%' OR
			  n_price LIKE '%$keyword%' OR
			  n_desc LIKE '%$keyword%' OR
              
			";
	return query($query);
}












?>