<?php
    // session_start();

    // if(!isset($_SESSION['login'])){
    //     header("Location: login.php");
    //     exit;
    // }

    include '../lib/koneksi.php';
    $query = "SELECT * FROM tempat_wisata, orders WHERE tempat_wisata.id = orders.id;";
    $sql = mysqli_query($conn, $query);
    $no = 0;
?>

<!DOCTYPE html>
<html lang="en">
    <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!--Font awesome-->
    <link rel="stylesheet" href="fontawesome/css/font-awesome.min.css">
    <title>Tempat Wisata</title>
    </head>
    <body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light shadow-sm p-2 mb-5 bg-body rounded">
  <div class="container-fluid">
    <a class="navbar-brand fw-bolder text-primary" href="home.php">TravelTour</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      <div class="navbar-nav">
        <a class="nav-link active" aria-current="page" href="home.php">Beranda</a>
        <a class="nav-link" href="menu.php">Pesanan</a>
        <a class="nav-link" href="#">Profil</a>
        <a class="nav-link" href="logout.php">Logout</a>
      </div>
    </div>
  </div>
</nav>
    <div class="container mt-2">
        <div class="container pb-5">
            <h4 >Pilih tempat wisata</h4>
            <?php 
                    while($result = mysqli_fetch_assoc($sql)){
                ?>
            <div class="card-group row-cols-3">
                <div class="card">
                    <img src="../assets/img/<?= $result['foto_tempat'];?>" class="card-img-top" style="width:18rem">
                    <div class="card-body">
                    <h5 class="card-title"><?= $result['nama_tempat'];?></h5>
                    <p class="card-text"><small class="text-muted">Lokasi : <?= $result['alamat_lokasi'];?></small></p>
                    <p class="card-text"><small class="text-muted">Hotel : <?= $result['hotel'];?></small></p>
                    <p class="card-text"><?= $result['keterangan'];?></p>
                 
                    <form action="kelola.php?ubah=<?= $result['id'] ?>" class="form-inline" method="POST">
                        <input type="hidden" value="<?= $result['foto_tempat'] ?>" name="gambar">
                        <input type="hidden" value="<?= $result['hotel'] ?>" name="hotel">
                        <input type="hidden" value="<?= $result['guider'] ?>" name="guider">
                        <input type="hidden" value="<?= $result['in'] ?>" name="in">
                        <input type="hidden" value="<?= $result['out'] ?>" name="out">
                        <button class="btn btn-success btn-sm mb-1 " style="width:100px">Pesan Sekarang</button>
                    </form>
                </div>
                <?php
                    }
                ?>
            </div>
        </div>
    </div>
    </body>
</html>