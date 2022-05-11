<?php
    // session_start();

    // if(!isset($_SESSION['login'])){
    //     header("Location: login.php");
    //     exit;
    // }
    
    include 'koneksi.php';
    if(isset($_POST['aksi'])){
        $id = $_POST['id'];
        $fullname = $_POST['fullname'];
        $jeniskelamin = $_POST['jk'];
        $email = $_POST['email'];
        $no_telp = $_POST['telp'];
        $password = $_POST['password'];
        if($_POST['aksi'] == "add"){
            

            $query = "INSERT INTO users VALUES(null, '$fullname', '$jeniskelamin', '$email', '$no_telp', '$password')";
            $sql = mysqli_query($conn, $query);

            if($sql){
                header("location: index.php");
                //echo "data berhasil ditambahkan";
            }else{
                echo $query;
            }
            // echo $id." ".$fullname. " ". $jeniskelamin." ". $email." ". $no_telp. " ". $password;
            // echo "Tambah Data <a href='index.php'>[Home]</a>";
        } else if($_POST['aksi'] == "edit"){
            $query = "UPDATE users SET full_name = '$fullname', jenis_kelamin = '$jeniskelamin', email = '$email', no_telp = $no_telp, password = '$password' WHERE id = $id";
            $sql = mysqli_query($conn, $query);

            if($sql){
                header("location: index.php");
                //echo "data berhasil ditambahkan";
            }else{
                echo $query;
                printf("Error message: %s\n", mysqli_error($conn));
            }
        }
    }
    if(isset($_GET['hapus'])){
        $id = $_GET['hapus'];
        
        $query = mysqli_query($conn,"DELETE FROM users WHERE id = '$id';");
        //$sql = mysqli_query ($conn, $query);
        if($query){
                header("location: index.php");
                echo "Affected rows: " . mysqli_affected_rows($conn);
           //echo "data berhasil ditambahkan";
        }else{
            echo $query;
        }
        //echo "Hapus data <a href='index.php'>[Home]</a>";
        //"DELETE FROM users WHERE id = '$id';" ;
        
        //mysqli_close($conn);
    }
?>