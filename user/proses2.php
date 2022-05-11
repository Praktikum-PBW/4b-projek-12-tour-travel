<?php
    // session_start();

    // if(!isset($_SESSION['login'])){
    //     header("Location: login.php");
    //     exit;
    // }
    
    include '../lib/koneksi.php';
    if(isset($_POST['aksi'])){
        $id = $_POST['id'];
        $hotel = $_POST['hotel'];
        $guider = $_POST['guider'];
        $checkin = $_POST['in'];
        if($_POST['aksi'] == "edit2"){
        
            $query = "UPDATE orders_2 SET `hotel` = '$hotel', `guider` = '$guider', `in` = '$checkin', `out` = '', `created_at` = '' WHERE id = $id";
            $sql = mysqli_query($conn, $query);

            if($sql){
                header("location: index.php");

            }else{
                echo $query;
            }

        } else if($_POST['aksi'] == "edit"){
                    
            $query = "INSERT INTO orders_2 VALUES(null, '$hotel', '$guider', '$checkin', '$checkout', '$created_at')";
            $sql = mysqli_query($conn, $query);

            if($sql){
                header("location: menu2.php");
            }else{
                echo $query;
                printf("Error message: %s\n", mysqli_error($conn));
            }
        }
    }
    if(isset($_GET['hapus'])){
        $id = $_GET['hapus'];
        
        $query = mysqli_query($conn,"DELETE FROM tempat_wisata WHERE id = '$id';");
        //$sql = mysqli_query ($conn, $query);
        if($query){
                header("location: index.php");
                echo "Affected rows: " . mysqli_affected_rows($conn);
        }else{
            echo $query;
            printf("Error message: %s\n", mysqli_error($conn));
        }
        //echo "Hapus data <a href='index.php'>[Home]</a>";
        //"DELETE FROM users WHERE id = '$id';" ;
        
        //mysqli_close($conn);
    }
?>