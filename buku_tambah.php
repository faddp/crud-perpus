<h1 class="mt-4">Buku</h1>
<div class="card">
    <div class="card-body">
    <div class="row">
 <div class="col-md-12">
   <form method="post" enctype="multipart/form-data">

    <?php
    if(isset($_POST['submit'])){

        $id_kategori = $_POST['id_kategori'];
        $file = $_FILES['sampul']['name'];
        $tmp_name = $_FILES['sampul']['tmp_name'];
        move_uploaded_file($tmp_name, 'gambar/'.$file);
        $judul = $_POST['judul_buku'];
        $penulis = $_POST['penulis'];
        $penerbit = $_POST['penerbit'];
        $tahun = $_POST['tahun_terbit'];
        $deskripsi = $_POST['deskripsi'];
        $stok = $_POST['stok'];

        $query = mysqli_query($koneksi, "INSERT INTO book (id_kategori,sampul,judul_buku, penulis, penerbit, tahun_terbit, deskripsi, stok) values ('$id_kategori','$file', '$judul', '$penulis', '$penerbit', '$tahun', '$deskripsi','$stok')");
        if($query){
            echo '<script>alert("Tambah Data Berhasil"); location.href="?page=buku"</script>';
        }else{
            echo '<script>alert("Tambah Data Gagal");</script>';
        }
    }
    ?>


    <div class="row mb-3">
    <div class="col-md-2">Kategori </div>
    <div class="col-md-8">
        <select name="id_kategori" class="form-control">
            <?php
            $kat = mysqli_query($koneksi,"SELECT * FROM kategori");
            while($nama_kategori = mysqli_fetch_array($kat)){
                ?>
                <option value="<?php echo $nama_kategori['id_kategori']; ?>"> <?php echo $nama_kategori['nama_kategori']; ?> </option>
                <?php
            }
            ?>
        </select>
    </div>
    </div>
    <div class="row mb-3">
    <div class="col-md-2">Sampul </div>
    <div class="col-md-8"><input type="file" class="form-control" name="sampul"></div>
    </div>
    <div class="row mb-3">
    <div class="col-md-2">Judul </div>
    <div class="col-md-8"><input type="text" class="form-control" name="judul_buku"></div>
    </div>
    <div class="row mb-3">
    <div class="col-md-2">Penulis </div>
    <div class="col-md-8"><input type="text" class="form-control" name="penulis"></div>
    </div>
    <div class="row mb-3">
    <div class="col-md-2">Penerbit </div>
    <div class="col-md-8"><input type="text" class="form-control" name="penerbit"></div>
    </div>
    <div class="row mb-3">
    <div class="col-md-2">Tahun Terbit </div>
    <div class="col-md-8"><input type="number" class="form-control" name="tahun_terbit"></div>
    </div>
    <div class="row mb-3">
    <div class="col-md-2">Deskripsi </div>
    <div class="col-md-8"><input name="deskripsi" rows="2" class="form-control"></div>
    </div>
    <div class="row mb-3">
    <div class="col-md-2">Stok Buku </div>
    <div class="col-md-8"><input type="number" class="form-control" name="stok"></div>
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
