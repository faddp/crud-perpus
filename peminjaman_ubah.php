<h1 class="mt-4">Peminjaman Buku</h1>
<div class="card">
    <div class="card-body">
    <div class="row">
 <div class="col-md-12">
   <form method="post">

    <?php
    $id = $_GET['id'];
    if(isset($_POST['submit'])){
    if(isset($_POST['id_buku'])){
        $id_buku = $_POST['id_buku'];
    }
    if(isset($_SESSION['user']['id_user'])){
        $id_user =@$_SESSION['user']['id_user'];
    }
    if(isset($_POST['tanggal_peminjaman'])){
        $tanggal_peminjaman = @$_POST['tanggal_peminjaman'];
    }
    if(isset($_POST['tanggal_pengembalian'])){
        $tanggal_pengembalian = @$_POST['tanggal_pengembalian'];
    }
    if(isset($_POST['status_peminjaman'])){
        $status_peminjaman = @$_POST['status_peminjaman'];
    }
    if(isset($_POST['tanggal_pengembalian_seharusnya'])){
        $tanggal_pengembalian_seharusnya = @$_POST['tanggal_pengembalian_seharusnya'];
    }
    if(isset($_POST['denda'])){
        $denda = @$_POST['denda'];
    }

    // $id = $_GET['id'];
    // if(isset($_POST['submit'])){

    //     $id_buku = $_POST['id_buku'];
    //     $id_user = @$_SESSION['user']['id_user'];
    //     $tanggal_peminjaman = $_POST['tanggal_peminjaman'];
    //     $tanggal_pengembalian = $_POST['tanggal_pengembalian'];
    //     $status_peminjaman = $_POST['status_peminjaman'];

    //     $tanggal_pengembalian_seharusnya = $_POST['tanggal_pengembalian_seharusnya'];
    //     $denda = $_POST['denda'];

        if ($status_peminjaman == "dikembalikan") {

            $tanggal_pengembalian = $_POST['tanggal_pengembalian'];
            $selisih_hari = strtotime($tanggal_pengembalian) - strtotime($tanggal_pengembalian_seharusnya);
            $selisih_hari = floor($selisih_hari / (60 * 60 * 24));

            // Menghitung denda
            if($selisih_hari > 0){
            $denda = $selisih_hari * 1000; // Menggunakan asumsi denda Rp 1.000 per hari
            } else {
            $denda = 0; // Tidak ada denda jika pengembalian tepat waktu
            }

             // Mengupdate stok buku
            $query_update_stok = mysqli_query($koneksi, "UPDATE book SET stok = stok + 1 WHERE id_buku = $id_buku");
            if (!$query_update_stok) {
                echo '<script>alert("Gagal mengupdate stok buku");</script>';
            }
        }

        $query = mysqli_query($koneksi, "UPDATE peminjaman_buku set id_buku='$id_buku', tanggal_peminjaman='$tanggal_peminjaman', tanggal_pengembalian='$tanggal_pengembalian', status_peminjaman='$status_peminjaman', denda='$denda' WHERE id_peminjaman=$id");
        
        if($query){
            echo '<script>alert("Tambah Peminjaman Berhasil"); location.href="?page=peminjaman_ubah"</script>';
        }else{
            echo '<script>alert("Ubah Peminjaman Gagal");</script>';
        }
    }
        $query = mysqli_query($koneksi, "UPDATE peminjaman_buku SET id_buku='$id_buku', tanggal_peminjaman='$tanggal_peminjaman', tanggal_pengembalian='$tanggal_pengembalian', status_peminjaman='$status_peminjaman', denda='$denda' WHERE id='$id'");
        $data = mysqli_fetch_array($query); 
    ?>


    <div class="row mb-3">
    <div class="col-md-2">Judul Buku </div>
    <div class="col-md-8">

        <select name="id_buku" class="form-control">
            <?php
            $buk = mysqli_query($koneksi,"SELECT * FROM book");
            while($buku = mysqli_fetch_array($buk)){
                ?>
                <option <?php if($buku['id_buku'] == $data['id_buku']) echo 'selected'; ?> value="<?php echo $buku['id_buku']; ?>"> <?php echo $buku['judul_buku']; ?> </option>
                <?php
            }
            ?>
        </select>
        </div>
    </div>

    <div class="row mb-3">
    <div class="col-md-2">Tanggal Peminjaman</div>
    <div class="col-md-8">
       <span><?php echo $data['tanggal_peminjaman']; ?></span>
       <input type="hidden" name="tanggal_peminjaman" value="<?php echo $data['tanggal_peminjaman']; ?>">
    </div>
    </div>

    <div class="row mb-3">
    <div class="col-md-2">Tanggal Pengembalian</div>
    <div class="col-md-8">
        <input type="date" class="form-control"  value="<?php echo $data['tanggal_pengembalian']; ?>" name="tanggal_pengembalian">
    </div>
    </div>

    <div class="row mb-3">
    <div class="col-md-2">Status Peminjaman</div>
    <div class="col-md-8">
        <select name="status_peminjaman" id="form-control">
     <option value="dikembalikan" <?php if($data['status_peminjaman'] == 'dikembalikan') echo 'selected'; ?>>Dikembalikan</option>
        </select>
    
    </div>
    </div>

    <div class="row mb-3">
    <div class="col-md-2">Denda</div>
    <div class="col-md-8">
    <span><?php echo $data['denda']; ?></span>
    </div>
    </div>
    <div class="row">
    </div>
    </div>
   <div class="row">
    <div class="col-md-4"></div>

    <div class="col-md-8">
    <button type="submit" class="btn btn-primary" name="submit" value="submit">Simpan</button>
    <button type="reset" class="btn btn-secondary">Reset</button>
    <button type="reset" class="btn btn-warning"><a href="?page=peminjaman">Kembali</a></button>

    </div>
   </div>
   </form> 
 </div>
</div>
    </div>
</div>
