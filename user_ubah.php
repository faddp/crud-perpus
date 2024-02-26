<h1 class="mt-4">Ubah User</h1>
<div class="card">
    <div class="card-body">
    <div class="row">
 <div class="col-md-12">
 <form method="post" enctype="multipart/form-data">

    <?php
    $id = $_GET['id'];
    if(isset($_POST['submit'])){
        $nama = $_POST['nama'];
        $username = $_POST['username'];
        $email = $_POST['email'];
        $alamat = $_POST['alamat'];
        $role_id = $_POST['role_id'];

        $query = mysqli_query($koneksi, "UPDATE user_perpus SET nama='$nama', username='$username', email='$email', alamat='$alamat', role_id='$role_id' WHERE id_user=$id");
      
        if($query){
            echo '<script>alert("Ubah Data Berhasil"); location.href="?page=user"</script>';
        }else{
            echo '<script>alert("Ubah Data Gagal");</script>';
        }
    }
     $query = mysqli_query($koneksi, "SELECT * FROM user_perpus  where id_user=$id");
     $data = mysqli_fetch_array($query);
    ?>

    <div class="row mb-3">
    <div class="col-md-2">Nama </div>
    <div class="col-md-8"><input type="text" value="<?php echo $data['nama']; ?>" class="form-control" name="nama"></div>
    </div>
    <div class="row mb-3">
    <div class="col-md-2">Username </div>
    <div class="col-md-8"><input type="text" value="<?php echo $data['username']; ?>" class="form-control" name="username"></div>
    </div>
    <div class="row mb-3">
    <div class="col-md-2">Email </div>
    <div class="col-md-8"><input type="text" value="<?php echo $data['email']; ?>" class="form-control" name="email"></div>
    </div>
    <div class="row mb-3">
    <div class="col-md-2">Alamat </div>
    <div class="col-md-8"><input type="text" value="<?php echo $data['alamat']; ?>" class="form-control" name="alamat"></div>
    </div>
    <div class="row mb-3">
    <div class="col-md-2">Level</div>
    <div class="col-md-8">
        <select class="form-control" name="role_id">
            <option value="Admin" <?php if($data['role_id'] == 'Admin') echo 'selected'; ?>>Admin</option>
            <option value="Petugas" <?php if($data['role_id'] == 'Petugas') echo 'selected'; ?>>Petugas</option>
            <option value="Peminjam" <?php if($data['role_id'] == 'Peminjam') echo 'selected'; ?>>Peminjam</option>
        </select>
    </div>
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
