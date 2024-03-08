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
        $id_user = $_SESSION['user']['id_user']; 
        $ulasan = $_POST['isi_ulasan'];
        $rating = $_POST['rating'];

        $query = mysqli_query($koneksi, "INSERT INTO ulasan (id_buku,id_user,isi_ulasan,rating) values ('$id_buku','$id_user','$ulasan','$rating')");
        
        if($query){
            echo '<script>alert("Tambah Ulasan Berhasil"); location.href="?page=ulasan"</script>';
        }else{
            echo '<script>alert("Tambah Ulasan Gagal");</script>';
        }
    }
    ?>

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