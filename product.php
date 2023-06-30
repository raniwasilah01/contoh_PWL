
<?php 
require 'functions.php';
$product = query("SELECT * FROM product");

// tombol cari ditekan
if( isset($_POST["cari"]) ) {
	$product = cari($_POST["keyword"]);
}

?>

<?php

// cek apakah tombol submit sudah ditekan atau belum
if( isset($_POST["submit"]) ) {
	
	// cek apakah data berhasil di tambahkan atau tidak
	if( tambah($_POST) > 0 ) {
		echo "
			<script>
				alert('data berhasil ditambahkan!');
				document.location.href = 'product.php';
			</script>
		";
	} else {
		echo "
			<script>
				alert('data gagal ditambahkan!');
				document.location.href = 'product.php';
			</script>
		";
	}


}
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
<link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"
  />
  <link rel="stylesheet" type="text/css" href="css/animation.css">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed&display=swap" rel="stylesheet">
<style>
  .is-hidden { display: none; }
</style>

    <title>SPARKLING FRAGRANCE</title>
  </head>
  <body>
    


<!-- NAVBAR -->

<nav class="navbar navbar-expand-lg navbar-light" style="background-color:#fdd9bc;">
<div class="container">  
  <a class="navbar-brand" href="#">
<img src="logo1.png" class="img-fluid w-50"  alt="">	
</a>
  <button class="navbar-toggler text-uppercase" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation ">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto text-uppercase font-weight-bold" style="font-family: 'Roboto Condensed', sans-serif;">
      <li class="nav-item active animate__animated animate__fadeIn">
        <a class="nav-link button" href="index.php">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item animate__animated animate__fadeIn">
        <a class="nav-link" href="about.php">About me</a>
      </li>
      <li class="nav-item animate__animated animate__fadeIn">
        <a class="nav-link" href="product.php">Product</a>
      </li>
    <li class="nav-item animate__animated animate__fadeIn ">
        <a class="nav-link"  href="https://api.whatsapp.com/send?phone=6285890193337&text=Saya%20melihat%20promo%2075%%di%20row%Wasilah.">Login</a>
      </li>
    </ul>
  </div>
</div>
</nav>




<div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
    <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="img/slide-1.jpg" class="d-block w-100" alt="...">
      <div class="carousel-caption d-none d-md-block">
        <h5>First slide label</h5>
        <p>Some representative placeholder content for the first slide.</p>
      </div>
    </div>
    <div class="carousel-item">
      <img src="img/slide-2.jpg" class="d-block w-100" alt="...">
      <div class="carousel-caption d-none d-md-block">
        <h5>Second slide label</h5>
        <p>Some representative placeholder content for the second slide.</p>
      </div>
    </div>
    <div class="carousel-item">
      <img src="img/slide-3.jpg" class="d-block w-100" alt="...">
      <div class="carousel-caption d-none d-md-block">
        <h5>Third slide label</h5>
        <p>Some representative placeholder content for the third slide.</p>
      </div>
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-target="#carouselExampleCaptions" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-target="#carouselExampleCaptions" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </button>
</div>

<!-- FORM PENCARIAN -->
<div class="container mt-4">
  
</div>



<!-- AKHIR FORM PENCARIAN -->


<!-- PRODUCT -->
<div class="container mt-4">
  <div class="card">
    <h5 class="card-header text-center text-monospace"> <button type="button" data-toggle="modal" data-target="#productModal" class="text-decoration-none btn btn-sm btn-info">
    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-circle" viewBox="0 0 16 16">
  <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
  <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
</svg> Tambah Product</button> Silahkan input di form pencarian</h5>
    <div class="card-body">
      <div class="input-group mb-3">
        <div class="input-group-prepend">
          <span class="input-group-text" id="basic-addon1">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
              <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
            </svg>
          </span>
        </div>
        <label for="searchbox"></label>
        <input type="search" class="form-control" id="searchbox" placeholder="Silahkan cari barang..." oninput="liveSearch()" aria-label="Username" aria-describedby="basic-addon1">
      </div>
    </div>
  </div>

  

  <div class="row row-cols-1 row-cols-md-3 mt-4">
  <?php foreach ($product as $row) : ?>
    <div class="col mb-4 card_product text-center">
      
      <div class="card">
        <img src="produk/<?= $row["n_product"];?>" class="card-img-bottom w-75 rounded mx-auto d-block" alt="...">
        <div class="card-body">
          <h5 class="card-title"><?= $row['n_desc'];?></h5>
          <p class="card-text"><?= $row['n_images']; ?></p>
        <a href="https://api.whatsapp.com/send?phone=6285890193337&text=Saya%20melihat%20promo%2075%%di%20row%Wasilah." class="btn btn-sm btn-info">
          <svg class="mb-2" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart4" viewBox="0 0 16 16">
            <path d="M0 2.5A.5.5 0 0 1 .5 2H2a.5.5 0 0 1 .485.379L2.89 4H14.5a.5.5 0 0 1 .485.621l-1.5 6A.5.5 0 0 1 13 11H4a.5.5 0 0 1-.485-.379L1.61 3H.5a.5.5 0 0 1-.5-.5zM3.14 5l.5 2H5V5H3.14zM6 5v2h2V5H6zm3 0v2h2V5H9zm3 0v2h1.36l.5-2H12zm1.11 3H12v2h.61l.5-2zM11 8H9v2h2V8zM8 8H6v2h2V8zM5 8H3.89l.5 2H5V8zm0 5a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0zm9-1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0z"/>
          </svg> <span class="font-weight-bold">IDR <?= $row['n_price'] ?></span></a>
          <a href="hapus.php?id=<?= $row["id"]; ?>" class="btn btn-sm btn-danger"> <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
  <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6Z"/>
  <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1ZM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118ZM2.5 3h11V2h-11v1Z"/>
</svg></a>
        </div>
      </div>
    </div>
    <?php endforeach; ?>
    
  </div>
</div>


<!-- AKHIR PRODUCT -->














<!-- Footer -->
<footer class="page-footer font-small blue pt-4">

  <!-- Footer Links -->
  <div class="container-fluid text-center text-md-left">

    <!-- Grid row -->
    <div class="row">

      <!-- Grid column -->
      <div class="col-md-6 mt-md-0 mt-3">

        <!-- Content -->

      </div>
      <!-- Grid column -->

      <hr class="clearfix w-100 d-md-none pb-3">

      <!-- Grid column -->
      <div class="col-md-3 mb-md-0 mb-3">

       

      </div>
      <!-- Grid column -->

      <!-- Grid column -->
      <div class="col-md-3 mb-md-0 mb-3">

        

      </div>
      <!-- Grid column -->

    </div>
    <!-- Grid row -->

  </div>
  <!-- Footer Links -->

  <!-- Copyright -->
  <div class="footer-copyright text-center py-3">© 2023 Copyright:
    <a href="/"> Design By row Wasilah</a>
  </div>
  <!-- Copyright -->

</footer>
<!-- Footer -->



<!--Poduct Modal -->
<!-- Modal -->

<div class="modal fade" id="productModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Product</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <!-- FORM -->

        <form method="post" action="" enctype="multipart/form-data">
          
        <div class="form-group row">
        <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">Product</label>
        <div class="col-sm-10">
          <input type="text" class="form-control form-control-sm" id="n_product" name="n_product" placeholder="">
        </div>
      </div>
      <!--  -->
      <div class="form-group row">
        <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">Images</label>
        <div class="col-sm-10">
          <input type="file" class="form-control form-control-sm mt-4 custom-file" id="n_images" name="n_images" placeholder="">
        </div>
      </div>
      <div class="form-group row">
        <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">Price</label>
        <div class="col-sm-10">
          <input type="number" class="form-control form-control-sm" id="n_price" name="n_price" placeholder="">
        </div>
      </div>
      <!--  -->
      <!--  -->
      <div class="form-group row">
        <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">Description</label>
        <div class="col-sm-10">
          <textarea id="n_desc" name="n_desc" id="" cols="49" rows="5"></textarea>
        </div>
      </div>
      <!--  -->
      
        

        <!-- AKHIR FORM -->
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        <button type="submit" name="submit" class="btn btn-info">Save</button>
      </div>
      </form>
    </div>
  </div>
</div>




    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
    <script type="text/javascript" src="js/jquery.slim.min.js"></script>
    
    <script type="text/javascript" src="js/bootstrap.bundle.min.js"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
    -->
    <script>
      var cards = document.querySelectorAll('.card-body')
    
            function liveSearch() {
        // Locate the card elements
        let cards = document.querySelectorAll('.card_product')
        // Locate the search input
        let search_query = document.getElementById("searchbox").value;
        // Loop through the cards
        for (var i = 0; i < cards.length; i++) {
          // If the text is within the card...
          if(cards[i].innerText.toLowerCase()
            // ...and the text matches the search query...
            .includes(search_query.toLowerCase())) {
              // ...remove the `.is-hidden` class.
              cards[i].classList.remove("is-hidden");
          } else {
            // Otherwise, add the class.
            cards[i].classList.add("is-hidden");
          }
        }
      }
      </script>
  </body>
</html>