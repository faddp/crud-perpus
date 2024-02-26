<div class="card">
 <div class="card-body">
 <h1 class="mt-4">Ulasan Buku</h1>
<div class="row">
 <div class="col-md-12">
    <a href="?page=ulasan_tambah" class="btn btn-primary">+ Tambah Data</a>
    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <tr>
            <th>No</th>
            <th>User</th>
            <th>Sampul</th>
            <th>Buku</th>
            <th>Ulasan</th>
            <th>Rating</th>
        </tr>
        <?php
        $i=1;
        $query =  mysqli_query($koneksi, "SELECT*FROM ulasan ul,user_perpus us ,book bk where ul.id_user=us.id_user and bk.id_buku=ul.id_buku");
        
        while($data = mysqli_fetch_array($query)){
            ?>
            <tr>
                <td><?php echo $i++; ?> </td>
                <td><?php echo $data['username']; ?> </td>
                <td><img src="gambar/<?php echo $data['sampul']; ?>" style="width: 150px; height: 200px;"></td>
                <td><?php echo $data['judul_buku']; ?> </td>
                <td><?php echo $data['isi_ulasan']; ?> </td>
                <td><?php echo $data['rating']; ?> </td>
                <td>
                    <div class="d-flex">
                    <a href="?page=ulasan_ubah&&id=<?php echo $data['id_ulasan']; ?>" class="btn btn-info flex-fill me-2"> Ubah </a>
                    <a onclick="return confirm('Apakah anda yakin menghapus data ini?')" href="?page=ulasan_hapus&&id=<?php echo $data['id_ulasan']; ?>" class="btn btn-danger flex-fill"> Hapus </a>
                    </div>
                </td>
            </tr>
            <?php
        }
        ?>
    </table>
 </div>
</div>
 </div>
</div>