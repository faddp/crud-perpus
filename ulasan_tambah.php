<h1 class="mt-4">Ulasan Buku</h1>
<div class="card">
    <div class="card-body">
    <div class="row">
 <div class="col-md-12">
   <form method="post">

    <?php
    // print_r($_SESSION['user']);
    
    if(isset($_POST['submit'])){
        // print_r($_POST);
        $id_buku = $_POST['id_buku'];
        $id_user = $_POST['id_user'];
        $ulasan = $_POST['isi_ulasan'];
        $rating = $_POST['rating'];

        $query = mysqli_query($koneksi, "INSERT INTO ulasan (id_buku,id_user,isi_ulasan,rating) values ('$id_buku','$id_user','$ulasan','$rating')");

        // $query = mysqli_query($koneksi, "SELECT * FROM peminjaman_buku LEFT JOIN user_perpus ON user_perpus.id_user = peminjaman_buku.id_user LEFT JOIN book ON book.id_buku = peminjaman_buku.id_buku WHERE peminjaman_buku.id_user=" . $_SESSION['user']['id_user']);
        
        if($query){
            echo '<script>alert("Tambah Ulasan Berhasil"); location.href="?page=ulasan"</script>';
        }else{
            echo '<script>alert("Tambah Ulasan Gagal");</script>';
        }
    }
    ?>

    <div class="row mb-3">
    <div class="col-md-2">User </div>
    <div class="col-md-8">
        <select name="id_user" class="form-control">
        <?php
            $users = mysqli_query($koneksi,"SELECT * FROM user_perpus WHERE role_id = 'peminjam'");
            while($user = mysqli_fetch_array($users)){
                ?>
                <option value="<?php echo $user['id_user']; ?>"> <?php echo $user['username']; ?> </option>
                <?php
            }
            ?>
        </select>
        </div>
    </div>

    <div class="row mb-3">
    <div class="col-md-2">Buku </div>
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
    <div class="col-md-2">Ulasan</div>
    <div class="col-md-8"><textarea name="isi_ulasan" rows="2" class="form-control"></textarea>
    </div>
    </div>

    <div class="row mb-3">
    <div class="col-md-2">Rating</div>
    <div class="col-md-8">
    <select  name="rating" class="form-control" >
            <option>1</option>
            <option>2</option>
            <option>3</option>
            <option>4</option>
            <option>5</option>
            <option>6</option>
            <option>7</option>
            <option>8</option>
            <option>9</option>
            <option>10</option>
    </select>
    </div>

    <script>
        function updateImageAndDescription(){
            var selectedBookId = document.getElementsByName('id_buku')[0].value;
            var buk = <?php echo json_encode(mysqli_fetch_all(mysqli_query($koneksi, "SELECT id_buku, sampul, deskripsi FROM book"), MYSQLI_ASSOC)); ?>;
            var selectedBook = buk.find(book => book.id_buku == selectedBookId);
            if (selectedBook){
                document.getElementById('sampul_buku').src = 'gambar/' + selectedBook.sampul;
            }else{
                document.getElementById('sampul_buku').src = '';
            }
        }
    </script>

    </div>
   <div class="row">
    <div class="col-md-4"></div>

    <div class="col-md-8">
    <button type="submit" class="btn btn-primary" name="submit" value="submit">Simpan</button>
    <button type="reset" class="btn btn-secondary">Reset</button>
    <button type="reset" class="btn btn-warning"><a href="?page=ulasan">Kembali</a></button>

    </div>
   </div>
   </form> 
 </div>
</div>
    </div>
</div>
