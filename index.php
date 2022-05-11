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

    include 'lib/koneksi.php';
    $query = "SELECT * FROM users;";
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
                            <th>ID</th>
                            <th>Full Name</th>
                            <th>Jenis Kelamin</th>
                            <th>Email</th>
                            <th>No Telp</th>
                            <th>Password</th>
                            <th>Aksi</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php 
                        while($result = mysqli_fetch_assoc($sql)){
                    ?>
                    <tr>
                        <td><center><?php echo ++$no;?></center></td>
                        <td> <?php echo $result['id'];?></td>
                        <td><?php echo $result['full_name'];?></td>
                        <td><?php echo $result['jenis_kelamin'];?></td>
                        <td><?php echo $result['email'];?></td>
                        <td><?php echo $result['no_telp'];?></td>
                        <td><?php echo $result['password'];?></td>
                        <td>
                            <form action="kelola.php?ubah=<?= $result['id'] ?>" class="form-inline" method="post">
                                <input type="hidden" value="<?= $result['full_name'] ?>" name="fullname">
                                <input type="hidden" value="<?= $result['jenis_kelamin'] ?>" name="jk">
                                <input type="hidden" value="<?= $result['email'] ?>" name="email">
                                <input type="hidden" value="<?= $result['no_telp'] ?>" name="no">
                                <input type="hidden" value="<?= $result['password'] ?>" name="password">
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