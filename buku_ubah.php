<h1 class="mt-4">Buku</h1>
<div class="card">
    <div class="card-body">
    <div class="row">
 <div class="col-md-12">
 <form method="post" enctype="multipart/form-data">

    <?php
    $id = $_GET['id'];
    if(isset($_POST['submit'])){
        $id_kategori = $_POST['id_kategori'];
        $file = $_FILES['sampul']['name']; 
        $judul = $_POST['judul_buku'];
        $penulis = $_POST['penulis'];
        $penerbit = $_POST['penerbit'];
        $tahun = $_POST['tahun_terbit'];
        $deskripsi = $_POST['deskripsi'];
        $stok = $_POST['stok'];

        $query = mysqli_query($koneksi, "UPDATE book SET id_kategori='$id_kategori', sampul='$file', judul_buku='$judul', penulis='$penulis', penerbit='$penerbit', tahun_terbit='$tahun', deskripsi='$deskripsi', stok='$stok' WHERE id_buku=$id");
        if($query){
            echo '<script>alert("Ubah Data Berhasil"); location.href="?page=buku"</script>';
        }else{
            echo '<script>alert("Ubah Data Gagal");</script>';
        }
    }
     $query = mysqli_query($koneksi, "SELECT * FROM book  where id_buku=$id");
     $data = mysqli_fetch_array($query);
    ?>


    <div class="row mb-3">
    <div class="col-md-2">Kategori </div>
        <select name="id_kategori" class="form-control">
            <?php
            $kat = mysqli_query($koneksi,"SELECT * FROM kategori");
            while($nama_kategori = mysqli_fetch_array($kat)){
                ?>
                <option <?php if($nama_kategori['id_kategori'] == $data['id_kategori']) echo 'selected'; ?> value="<?php echo $nama_kategori['id_kategori']; ?>"> <?php echo $nama_kategori['nama_kategori']; ?> </option>
                <?php
            }
            ?>
        </select>
    </div>
    <div class="row mb-3">
    <div class="col-md-2">Sampul </div>
    <div class="col-md-8"><input type="file" class="form-control" name="sampul"></div>
    </div>
    <div class="row mb-3">
    <div class="col-md-2">Judul </div>
    <div class="col-md-8"><input type="text" value="<?php echo $data['judul_buku']; ?>" class="form-control" name="judul_buku"></div>
    </div>
    <div class="row mb-3">
    <div class="col-md-2">Penulis </div>
    <div class="col-md-8"><input type="text" value="<?php echo $data['penulis']; ?>" class="form-control" name="penulis"></div>
    </div>
    <div class="row mb-3">
    <div class="col-md-2">Penerbit </div>
    <div class="col-md-8"><input type="text" value="<?php echo $data['penerbit']; ?>" class="form-control" name="penerbit"></div>
    </div>
    <div class="row mb-3">
    <div class="col-md-2">Tahun Terbit </div>
    <div class="col-md-8"><input type="number" value="<?php echo $data['tahun_terbit']; ?>" class="form-control" name="tahun_terbit"></div>
    </div>
    <div class="row mb-3">
    <div class="col-md-2">Deskripsi </div>
    <div class="col-md-8">
        <input name="deskripsi"rows="2" class="form-control"><?php echo $data['deskripsi']; ?></input>
    </div>
    <div class="row mb-3">
    <div class="col-md-2">Stok Buku </div>
    <div class="col-md-8"><input type="number" value="<?php echo $data['stok']; ?>" class="form-control" name="stok"></div>
    </div>
    </div>
   <div class="row">
    <div class="col-md-4"></div>

    <div class="col-md-8">
    <button type="submit" class="btn btn-primary" name="submit" value="submit">Simpan</button>
    <button type="reset" class="btn btn-secondary">Reset</button>
    <button type="reset" class="btn btn-warning"><a href="?page=buku">Kembali</a></button>
    

    </div>
   </div>
   </form> 
 </div>
</div>
    </div>
</div>
