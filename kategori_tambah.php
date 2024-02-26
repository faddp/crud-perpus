<h1 class="mt-4">Tambah Kategori Buku</h1>
<div class="card">
    <div class="card-body">
    <div class="row">
 <div class="col-md-12">
   <form method="post">

    <?php
    if(isset($_POST['submit'])){
        $nama_kategori = $_POST['nama_kategori'];
        $query = mysqli_query($koneksi, "INSERT INTO kategori (nama_kategori) values ('$nama_kategori')");
        if($query){
            echo '<script>alert("Tambah Data Berhasil"); location.href="?page=kategori"</script>';
        }else{
            echo '<script>alert("Tambah Data Gagal");</script>';
        }
    }
    ?>


    <div class="row mb-3">
    <div class="col-md-2"> Nama Kategori </div>
    <div class="col-md-8"><input type="text" class="form-control" name="nama_kategori"></div>
    </div>
   <div class="row">
    <div class="col-md-4"></div>
    <div class="col-md-8">

    <div class="col-md-8">
    <button type="submit" class="btn btn-primary" name="submit" value="submit">Simpan</button>
    <button type="reset" class="btn btn-secondary">Reset</button>
    <button type="reset" class="btn btn-warning"><a href="?page=kategori">Kembali</a></button>

    </div>
   </div>
   </form> 
 </div>
</div>
    </div>
</div>
