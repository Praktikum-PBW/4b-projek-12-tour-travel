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
    $query = "SELECT * FROM orders;";
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
    <div class="container mt-2">
    <h1>Kelola User</h1>
        <figure>
            <blockquote class="blockquote">
                <p>Selamat datang <?= $_SESSION['username'];?></p>
            </blockquote>
            <figcaption class="blockquote-footer">
                CRUD <cite title="Source Title">- Create Read Update Delete</cite>
            </figcaption>
        </figure>
        <a href="kelola.php" type="button" class="btn btn-primary mb-3"><i class="fa fa-plus"></i>Tambah Data</a>
        <a href="logout.php" type="button" class="btn btn-danger mb-3"><i class="fa fa-plus"></i>Log Out</a>
        <div class="table-responsive">
            <div class="table-responsive">
                <table class="table align-middle table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Nama Agen</th>
                            <th>Nama Hotel</th>
                            <th>Check in</th>
                            <th>Check out</th>
                            <th>Gambar</th>
                            <th>Tanggal Proses</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php 
                        while($result = mysqli_fetch_assoc($sql)){
                    ?>
                    <tr>
                        <td><center><?php echo ++$no;?></center></td>
                        <td> <?php echo $result['guider'];?></td>
                        <td><?php echo $result['hotel'];?></td>
                        <td><?php echo $result['in'];?></td>
                        <td><?php echo $result['out'];?></td>
                        <td><?php echo $result['gambar'];?></td>
                        <td><?php echo $result['created_at'];?></td>
                        <td>
                            <form action="kelola.php?ubah=<?= $result['id'] ?>" class="form-inline" method="post">
                                <input type="text" value="<?= $result['guider'] ?>" name="guider">
                                <input type="text" value="<?= $result['hotel'] ?>" name="hotel">
                                <input type="date" value="<?= $result['in'] ?>" name="in">
                                <input type="date" value="<?= $result['out'] ?>" name="out">
                                <input type="text" value="<?= $result['gambar'] ?>" name="gambar">
                                <input type="text" value="<?= $result['created_at'] ?>" name="created_at">
                                <button class="btn btn-success btn-sm mb-1 " style="width:100px">Update</button>
                            </form>
                            <a href="proses.php?hapus=<?= $result['id'] ?>" type="button" style="width:100px"  class="btn btn-danger btn-sm" onclick="return confirm('Hapus data?')">Hapus</a>
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