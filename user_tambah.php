<h1 class="mt-4">Tambah User</h1>
<div class="card">
    <div class="card-body">
    <div class="row">
 <div class="col-md-12">
 <form method="post" enctype="multipart/form-data">

    <?php
    if(isset($_POST['submit'])){
        $nama = $_POST['nama'];
        $username = $_POST['username'];
        $email = $_POST['email'];
        $alamat = $_POST['alamat'];
        $role_id = $_POST['role_id'];

        $query = mysqli_query($koneksi, "INSERT INTO user_perpus (nama, username, email, alamat, role_id) VALUES ('$nama', '$username', '$email', '$alamat', '$role_id')");
      
        if($query){
            echo '<script>alert("Tambah Data Berhasil"); location.href="?page=user"</script>';
        }else{
            echo '<script>alert("Tambah Data Gagal");</script>';
        }
    }
    ?>

<div class="row mb-3">
<div class="col-md-2">Nama </div>
<div class="col-md-8"><input type="text" class="form-control" name="nama"></div>
</div>
<div class="row mb-3">
<div class="col-md-2">Username </div>
<div class="col-md-8"><input type="text" class="form-control" name="username"></div>
</div>
<div class="row mb-3">
<div class="col-md-2">Email </div>
<div class="col-md-8"><input type="text" class="form-control" name="email"></div>
</div>
<div class="row mb-3">
<div class="col-md-2">Alamat </div>
<div class="col-md-8"><input type="text" class="form-control" name="alamat"></div>
</div>
<div class="row mb-3">
<div class="col-md-2">Level</div>
<div class="col-md-8">
    <select class="form-control" name="role_id">
        <option value="Admin">Admin</option>
        <option value="Petugas">Petugas</option>
        <option value="Peminjam">Peminjam</option>
    </select>
</div>
  
   <div class="row">
    <div class="col-md-4"></div>

    <div class="col-md-8">
    <button type="submit" class="btn btn-primary" name="submit" value="submit">Simpan</button>
    <button type="reset" class="btn btn-secondary">Reset</button>
    <button type="reset" class="btn btn-warning"><a href="?page=user">Kembali</a></button>
    

    </div>
   </div>
   </form> 
 </div>
</div>
    </div>
</div>
