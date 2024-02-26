<?php
include "./koneksi.php";
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Register Ke Perpustakaan</title>
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    <body class="bg-primary">
    <div id="layoutAuthentication">
    <div id="layoutAuthentication_content">
    <main>
     <div class="container">
     <div class="row justify-content-center">
     <div class="col-lg-5">
     <div class="card shadow-lg border-0 rounded-lg mt-5">
     <div class="card-header"><h3 class="text-center font-weight-light my-4">Register</h3></div>
     <div class="card-body">

        <?php
            if(isset($_POST['register'])) {
                $nama = $_POST['nama'];
                $username = $_POST['username'];
                $password = md5($_POST['password']);
                $email = $_POST['email'];
                $alamat = $_POST['alamat'];
                $role_id = "Peminjam";

                $insert = mysqli_query($koneksi, "INSERT INTO user_perpus (nama, username, password, email, alamat, role_id) VALUES ('$nama', '$username', '$password', '$email', '$alamat', '$role_id')");

                if($insert){
                echo '<script>alert("Selamat, register berhasil. Silahkan Login."); location.href="login.php" </script>';
                }else{
                 echo  '<script>alert("Register gagal, Silahkan ulangi kembali.")</script>';
                 }
                 }
                 ?>
                                        
        <form method="post">
        <div class="form-group mb-3">
            <label>Nama Lengkap</label>
             <input class="form-control" required name="nama" type="text" placeholder="Masukkan Nama Lengkap" />
        </div>
        <div class="form-group mb-3">
             <label>Username</label>
            <input class="form-control"  required name="username" type="text" placeholder="Masukkan Username" />
        </div>
       <div class="form-group mb-3">
           <label for="inputPassword">Password</label>
           <input class="form-control"  required id="inputPassword" name="password" type="password" placeholder="Masukkan Password" />
       </div>
       <div class="form-group mb-3">
         <label>Email</label>
         <input class="form-control"  required name="email" type="text" placeholder="Masukkan Email" />
     </div>
    <div class="form-group mb-3">
         <label>Alamat</label>
        <textarea name="alamat"  required rows="5" class="form-control"></textarea>
    </div>
    <div class="form-group mb-3">
         <label>Role</label>
         <select name="role_id" required class="form-control">
         <option value="Peminjam" selected>Peminjam</option>
        </select>                                        
    </div>
    <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
        <button class="btn btn-primary" type="submit" name="register" value="register" >Register</button>
        <a class="btn btn-danger" href="login.php" >Login</a>
    </div>
    </form>
    </div>
    <div class="card-footer text-center py-3">
    <div class="small">
    &copy; 2024 Perpustakaan Digital
    </div>
     </div>
     </div>
      </div>
      </div>
      </div>
      </main>
      </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
    </body>
</html>
