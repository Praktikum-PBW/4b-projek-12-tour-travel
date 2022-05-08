<?php
    // session_start();

    // if(!isset($_SESSION['login'])){
    //     header("Location: login.php");
    //     exit;
    // }
?>

<!DOCTYPE html>
<html lang="en">
    <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!--Font awesome-->
    <link rel="stylesheet" href="fontawesome/css/font-awesome.min.css">
    <title>Form User</title>
    </head>
    <body>
    <div class="container mt-2">
    <h3 style="text-align:center">Form User</h3>
    </nav>
        <div class="container">
            <form method="POST" action="proses.php">
            <div class="mb-3 row">
                <label for="id" class="col-sm-2 col-form-label">ID</label>
                <div class="col-sm-10">
                    <input type="number" name="id" class="form-control" id="ID" placeholder="ex: 541324517" <?= isset($_GET['ubah']) ? "readonly value='".$_GET['ubah']."'" : "" ?>>
                </div>
            </div>
            <div class="mb-3 row">
                <label for="fullname" class="col-sm-2 col-form-label">Full Name</label>
                <div class="col-sm-10">
                    <input type="text" name="fullname" class="form-control" id="fullname" placeholder="ex: Armin Alindu" <?= isset($_GET['ubah']) ? "value='".$_POST['fullname']."'" : "" ?>>
                </div>
            </div>
            <div class="mb-3 row">
                <label for="jenisKelamin" class="col-sm-2 col-form-label">Jenis Kelamin</label>
                <div class="col-sm-10">
                    <select id="jenisKelamin" name= "jk" class="form-select" aria-label="Default select example">
                        <option selected>Jenis Kelamin</option>
                        <option value="Laki-laki" <?= (isset($_GET['ubah']) && $_POST['jk'] == "Laki-laki") ? "selected" : "" ?>>Laki-laki</option>
                        <option value="Perempuan" <?= (isset($_GET['ubah']) && $_POST['jk'] == "Perempuan") ? "selected" : "" ?>>Perempuan</option>
                    </select>
            </div>
            <div class="mb-3 row">
                <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                <div class="col-sm-10">
                    <input type="email" name="email" class="form-control" id="inputEmail" placeholder="ex:fafa@gmail.com" <?= isset($_GET['ubah']) ? "value='".$_POST['email']."'" : "" ?>>
                </div>
            </div>
            <div class="mb-3 row">
                <label for="inputtelp" class="col-sm-2 col-form-label">No. Telp</label>
                <div class="col-sm-10">
                    <input type="number" name="telp" class="form-control" id="inputtelp" placeholder="ex:08xxxx" <?= isset($_GET['ubah']) ? "value='".$_POST['no']."'" : "" ?>>
                </div>
            </div>
            <div class="mb-3 row">
                <label for="inputPassword" class="col-sm-2 col-form-label">Password</label>
                <div class="col-sm-10">
                    <input type="password" name="password" class="form-control" id="inputPassword" <?= isset($_GET['ubah']) ? "value='".$_POST['password']."'" : "" ?>>
                </div>
            </div>
        </div>
            <div class="mb-3 row mt-4" >
            <div class="col">
                <?php
                    if(isset($_GET['ubah'])){
                        ?>
                        <button type="submit" name="aksi" value="edit" class="btn btn-primary"><i class="fa fa-floppy-o" aria-hidden="true"></i>
                Simpan Perubahan</button>
                <?php
                    }else{
                ?>
                    <button type="submit" name="aksi" value="add" class="btn btn-primary"><i class="fa fa-floppy-o" aria-hidden="true"></i>
                Tambahkan</button>
                <?php
                    }
                ?>
                
                <a href="index.php" type="button" class="btn btn-danger"><i class="fa fa-reply" aria-hidden="true"></i>Batal</a>
                    
                </div>
        </form>
    </div>
    </body>
</html>