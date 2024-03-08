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
    $status_peminjaman = $_POST['status_peminjaman'];

    // Cek stok buku
    $query_stok = mysqli_query($koneksi, "SELECT stok FROM book WHERE id_buku = $id_buku");
    $stok = mysqli_fetch_assoc($query_stok)['stok'];

    if($stok > 0){
        $query_update_stok = mysqli_query($koneksi, "UPDATE book SET stok = stok - 1 WHERE id_buku = $id_buku");

        if($query_update_stok){
            $query = mysqli_query($koneksi, "INSERT INTO peminjaman_buku (id_buku, id_user, tanggal_peminjaman, tanggal_pengembalian, status_peminjaman) VALUES ('$id_buku', '$id_user', '$tanggal_peminjaman', '$tanggal_pengembalian', '$status_peminjaman')");

            if($query){
                echo '<script>alert("Tambah Peminjaman Berhasil"); location.href="?page=peminjaman"</script>';
            }else{
                echo '<script>alert("Tambah Peminjaman Gagal");</script>';
            }
        }
     } else {
        echo '<script>alert("Stok buku habis, tidak dapat melakukan peminjaman");</script>';
     }
     }
    ?>


<!-- <div class="row mb-3">
    <div class="col-md-2">Username</div>
    <div class="col-md-8">
        <select name="id_user" class="form-control">
        <?php
        // Jika level user adalah petugas atau admin
        if ($_SESSION['user']['role_id'] == 'Petugas' || $_SESSION['user']['role_id'] == 'Admin') {
            // Ambil role_id peminjam dari form
            $users = mysqli_query($koneksi,"SELECT * FROM user_perpus WHERE role_id = 'peminjam'");
            while($user = mysqli_fetch_array($users)){
                ?>
                <option value="<?php echo $user['id_user']; ?>"> <?php echo $user['username']; ?> </option>
                <?php
            }
        } else {
            // Level user adalah peminjam, tidak perlu menampilkan kolom username
            $username = $_SESSION['user']['username'];
            echo '<input type="text" class="form-control" value="' . $username . '" readonly>';
        }
        ?>
        </select>
    </div>
</div> -->

    <div class="row mb-3">
    <div class="col-md-2">Judul Buku </div>
    <div class="col-md-8">
    <select name="id_buku" class="form-control" onchange="updateImageAndDescription()">
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
    <div class="col-md-2">Sampul </div>
    <div class="col-md-8">
      <img src="" id="sampul_buku" style="max-width: 150px; max-height:150px;" alt="Sampul Buku"> 
    </div>
    </div>
    
    <div class="row mb-3">
    <div class="col-md-2">Deskripsi </div>
    <div class="col-md-8">
      <textarea class="form-control" name="deskripsi_buku" id="deskripsi_buku" rows="2" readonly></textarea>
    </div>
    </div>


    <div class="row mb-3">
    <div class="col-md-2">Tanggal Peminjaman</div>
    <div class="col-md-8">
    <span><?php echo date('Y-m-d'); ?></span>
    <!-- <input type="date" name="tanggal_peminjaman" class="form-control" value="<?php echo date('Y-m-d'); ?>"> -->
    </div>
    </div>

    <div class="row mb-3">
    <div class="col-md-2">Tanggal Pengembalian</div>
    <div class="col-md-8">
    <span><?php echo date('Y-m-d', strtotime('+7 days')); ?></span>
    <!-- <input type="date" name="tanggal_pengembalian" class="form-control" value="<?php echo date('Y-m-d', strtotime('+7 days')); ?>"> -->
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

    
    <script>
        function updateImageAndDescription(){
            var selectedBookId = document.getElementsByName('id_buku')[0].value;
            var buk = <?php echo json_encode(mysqli_fetch_all(mysqli_query($koneksi, "SELECT id_buku, sampul, deskripsi FROM book"), MYSQLI_ASSOC)); ?>;
            var selectedBook = buk.find(book => book.id_buku == selectedBookId);
            if (selectedBook){
                document.getElementById('sampul_buku').src = 'gambar/' + selectedBook.sampul;
                document.getElementById('deskripsi_buku').textContent = selectedBook.deskripsi;
            }else{
                document.getElementById('sampul_buku').src = '';
                document.getElementById('deskripsi_buku').textContent = '';
            }
        }
    </script>

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
