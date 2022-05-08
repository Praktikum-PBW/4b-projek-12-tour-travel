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
            <form method="POST" action="proses2.php">
            <div class="mb-3 row">
                <label for="id" class="col-sm-2 col-form-label">ID</label>
                <div class="col-sm-10">
                    <input type="number" name="id" class="form-control" id="ID" placeholder="ex: 541324517" <?= isset($_GET['ubah']) ? "readonly value='".$_GET['ubah']."'" : "" ?>>
                </div>
            </div>
            <div class="mb-3 row">
                <label for="hotel" class="col-sm-2 col-form-label">Hotel</label>
                <div class="col-sm-10">
                    <input type="text" name="hotel" class="form-control"placeholder="ex: Armin Alindu" <?= isset($_GET['ubah']) ? "readonly value='".$_POST['hotel']."'" : "" ?>>
                </div>
            </div>
            <div class="mb-3 row">
                <label for="guider" class="col-sm-2 col-form-label">Guider</label>
                <div class="col-sm-10">
                    <input type="text" name="guider" class="form-control"placeholder="ex: Armin Alindu" <?= isset($_GET['ubah']) ? "readonly value='".$_POST['guider']."'" : "" ?>>
                </div>
            </div>
            <div class="mb-3 row">
                <label for="in" class="col-sm-2 col-form-label">Tanggal Check in</label>
                <div class="col-sm-10">
                    <input type="date" name="in" class="form-control"placeholder="ex: Armin Alindu" <?= isset($_GET['ubah']) ? "value='".$_POST['in']."'" : "" ?>>
                </div>
            </div>
        </div>
            <div class="mb-3 row mt-4" >
            <div class="col">
                <?php
                    if(isset($_GET['ubah'])){
                ?>
                    <button type="submit" name="aksi" value="edit" class="btn btn-primary"><i class="fa fa-floppy-o" aria-hidden="true"></i>Lanjutkan</button>
                <?php
                    }else{
                ?>
                    <button type="submit" name="aksi" value="edit2" class="btn btn-primary"><i class="fa fa-floppy-o" aria-hidden="true"></i>Tambahkan</button>
                <?php
                    }
                ?>
                <a href="index.php" type="button" class="btn btn-danger"><i class="fa fa-reply" aria-hidden="true"></i>Batal</a>
                </div>
        </form>
    </div>
    </body>
</html>