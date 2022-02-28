<?php
	include "koneksi.php";
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<title>Daftar Harga Tiket</title>
	<!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Bootstrap icons-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="css/styles.css" rel="stylesheet" />
</head>
<body>
	<!-- Navigation-->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container px-4 px-lg-5">
            <a class="navbar-brand" href="#!">Wisata Kota Bogor</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link active" aria-current="page" href="">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="index.php">Daftar Harga Tiket</a></li>
                    <li class="nav-item"><a class="nav-link" href="pesan.php">Pesan Tiket</a></li>
                </ul>
                <!-- <form class="d-flex">
                    <button class="btn btn-outline-dark" type="submit">
                        <i class="bi-cart-fill me-1"></i>
                        Cart
                        <span class="badge bg-dark text-white ms-1 rounded-pill">0</span>
                    </button>
                </form> -->
            </div>
        </div>
    </nav>
<!-- Tampil semua data barang dari database-->
<div class="container col-md-8 mt-4">
        <h1>Daftar Harga Tiket</h1>
        <div class="card">
            <!-- <div class="card-header bg-white text-white "> -->
			<div class="card-body">
                <table class="table table-bordered table-dark"><br>
			<th>No</th>
			<th>Tempat Wisata</th>
			<th>Harga</th>
		</tr>
		<?php 
			$no = 1;
			//Query menampilkan semua data dari tabel barang
			$sql = "select * from wsta";
			$hasil = mysqli_query($kon, $sql);
			while($data = mysqli_fetch_array($hasil)){
		?>
		<tr>
			<!--Tampil data berupa array -->
			<td><?php echo $no++; ?></td>
			<td><?php echo $data['tmpt']; ?></td>
			<td><?php echo $data['hrg']; ?></td>
		</tr>
			<?php 
		}
		?>
	</table>

	 <h4><a href="tmpln.php" style="text-decoration: none;"><-- Kembali</a></h4>	 
</body>
</html>