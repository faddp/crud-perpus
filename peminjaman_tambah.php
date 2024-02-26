<h1 class="mt-4">Peminjaman Buku</h1>
<div class="card">
    <div class="card-body">
    <div class="row">
 <div class="col-md-12">
   <form method="post">

    <?php
    if(isset($_POST['submit'])){

        $date = date('y-m-d');
        $id_buku = $_POST['id_buku'];
        $id_user = @$_SESSION['user']['id_user'];
        $tanggal_peminjaman = $date;
        $tanggal_pengembalian = date('y-m-d', strtotime ($date. '+7days'));

        $tanggal_pengembalian_seharusnya = date('Y-m-d', strtotime('+7 days'));
        $denda = 0;

        $status_peminjaman = $_POST['status_peminjaman'];

        $query_update_stok = mysqli_query($koneksi, "UPDATE book SET stok = stok - 1 WHERE id_buku = $id_buku");

        if($query_update_stok){
            $query = mysqli_query($koneksi, "INSERT INTO peminjaman_buku (id_buku, id_user, tanggal_peminjaman, tanggal_pengembalian, status_peminjaman) VALUES ('$id_buku', '$id_user', '$tanggal_peminjaman', '$tanggal_pengembalian', '$status_peminjaman')");
    
            if($query){
                echo '<script>alert("Tambah Peminjaman Berhasil"); location.href="?page=peminjaman"</script>';
            }else{
                echo '<script>alert("Tambah Peminjaman Gagal");</script>';
            }
        }
    }
    ?>


    <div class="row mb-3">
    <div class="col-md-2">Judul Buku </div>
    <div class="col-md-8">

        <select name="id_buku" class="form-control">
            <?php
            $buk = mysqli_query($koneksi,"SELECT * FROM book");
            while($buku = mysqli_fetch_array($buk)){
                ?>
                <option value="<?php echo $buku['id_buku']; ?>"> <?php echo $buku['judul_buku']; ?> </option>
                <?php
            }
            ?>
        </select>
        </div>
    </div>

    <div class="row mb-3">
    <div class="col-md-2">Tanggal Peminjaman</div>
    <div class="col-md-8">
    <span><?php echo date('Y-m-d'); ?></span>
    </div>
    </div>

    <div class="row mb-3">
    <div class="col-md-2">Tanggal Pengembalian</div>
    <div class="col-md-8">
    <span><?php echo date('Y-m-d', strtotime('+7 days')); ?></span>
    </div>
    </div>

    <div class="row mb-3">
    <div class="col-md-2">Status Peminjaman</div>
    <div class="col-md-8">
        <select name="status_peminjaman" class="form-control">
        <option value="dipinjam">Dipinjam</option>
        </select>
    
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
