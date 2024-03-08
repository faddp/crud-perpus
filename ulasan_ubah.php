<h1 class="mt-4">Ulasan Buku</h1>
<div class="card">
    <div class="card-body">
    <div class="row">
 <div class="col-md-12">
   <form method="post">

    <?php
    $id = $_GET['id'];
    if(isset($_POST['submit'])){

        $id_buku = $_POST['id_buku'];
        $id_user = @$_SESSION['user']['id_user'];
        $ulasan = $_POST['isi_ulasan'];
        $rating = $_POST['rating'];

        $query = mysqli_query($koneksi, "UPDATE ulasan set id_buku='$id_buku',isi_ulasan='$ulasan', rating='$rating' WHERE id_ulasan=$id ");
        if($query){
            echo '<script>alert("Ubah Data Berhasil"); location.href="?page=ulasan"</script>';
        }else{
            echo '<script>alert("Ubah Data Gagal");</script>';
        }
    }
    $query = mysqli_query($koneksi, "SELECT * FROM ulasan WHERE id_ulasan=$id");
    $data = mysqli_fetch_array($query);
    ?>


    <div class="row mb-3">
    <div class="col-md-2">Buku </div>
    <div class="col-md-8">
    <select name="id_buku" class="form-control" onchange="updateImageAndDescription()">
            <?php
            $buk = mysqli_query($koneksi,"SELECT * FROM book");
            while($buku = mysqli_fetch_array($buk)){
                ?>
                <option <?php if($data['id_buku'] == $buku['id_buku']) echo 'selected'; ?> value="<?php echo $buku['id_buku']; ?>"> <?php echo $buku ['judul_buku']; ?> </option>
                <?php
            }
            ?>
        </select>
        </div>
    </div>

    <div class="row mb-3">
    <div class="col-md-2">Ulasan</div>
    <div class="col-md-8"><textarea name="isi_ulasan" rows="2" class="form-control"><?php echo $data['isi_ulasan']; ?></textarea>
    </div>
    </div>

    <div class="row mb-3">
    <div class="col-md-2">Rating</div>
    <div class="col-md-8">
    <select name="rating" class="form-control">
            <?php
                for($i = 1; $i<=10; $i++){
                    ?>
                    <option <?php if($data['rating'] == $i) echo 'selected'; ?>><?php echo $i; ?></option>
                    <?php
                }
            ?>
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
            }else{
                document.getElementById('sampul_buku').src = '';
            }
        }
    </script>

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
