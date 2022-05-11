<?php
    session_start();

    // if(!isset($_SESSION['login']) ){
    //     header("Location: login.php");
    //     exit;
    // }

    if($_SESSION['level']==""){
        header("Location: login.php");
        exit;
    }

    include '../lib/koneksi.php';
    $query = "SELECT * FROM tempat_wisata, orders_2 WHERE tempat_wisata.id = orders_2.id;";
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
    <title>Data User</title>
    </head>
    <body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light shadow-sm p-2 mb-5 bg-body rounded">
  <div class="container-fluid">
    <a class="navbar-brand fw-bolder text-primary" href="index.php">TravelTour</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      <div class="navbar-nav">
        <a class="nav-link active" aria-current="page" href="index.php">Beranda</a>
        <a class="nav-link" href="menu2.php">Pesanan</a>
        <a class="nav-link" href="#">Profil</a>
        <a class="nav-link" href="logout.php">Logout</a>
      </div>
    </div>
  </div>
</nav>
    <div class="container mt-2">
    <h3>Pesanan anda</h3>
        <figure>
            <blockquote class="blockquote">
                <p>Halo, <b><?= $_SESSION['username'];?></b> di bawah ini merupakan status pemesanan anda</p>
            </blockquote>
        </figure>
        <div class="table-responsive">
            <div class="table-responsive">
                <table class="table align-middle table-bordered table-hover text-center">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th colspan="2">Nama Hotel</th>
                            <th>Nama Guider</th>
                            <th>Tanggal Checkin</th>
                            <th>Tanggal Checkout</th>
                            <th>Aksi</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php 
                        while($result = mysqli_fetch_assoc($sql)){
                    ?>
                    <tr>
                        <td><center><?php echo ++$no;?></center></td>
                        <td><img src="../assets/img/<?php echo $result['foto_tempat'];?>" style="width:75px"></td>
                        <td><?php echo $result['hotel'];?></td>
                        <td><?php echo $result['guider'];?></td>
                        <td><?php echo $result['in'];?></td>
                        <td><?php echo $result['out'];?></td>
                        <td>
                            <form action="kelola2.php?ubah=<?= $result['id'] ?>" class="form-inline" method="POST">
                                <input type="hidden" value="<?= $result['foto_tempat'] ?>" name="gambar">
                                <input type="hidden" value="<?= $result['hotel'] ?>" name="hotel">
                                <input type="hidden" value="<?= $result['guider'] ?>" name="guider">
                                <input type="hidden" value="<?= $result['in'] ?>" name="in">
                                <input type="hidden" value="<?= $result['out'] ?>" name="out">
                                <button class="btn btn-primary btn-sm mb-1 " style="width:100px">Update</button>
                            </form>
                            <a href="proses2.php?hapus=<?= $result['id'] ?>" type="button" style="width:100px"  class="btn btn-danger btn-sm" onclick="return confirm('Hapus data?')">Hapus</a>
                        </td>
                    </tr>
                    <?php
                        }
                        ?>
                    </tbody>
                </table>
                </div>
        </div>
    </div>
    </body>
</html>