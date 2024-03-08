<div class="card">
<div class="card-body">
<h1 class="mt-4">Ulasan Buku</h1>
<div class="row">
 <div class="col-md-12">
        <?php
        if ($_SESSION['user']['role_id'] == 'Admin' || $_SESSION['user']['role_id'] == 'Petugas') {
         ?>
        <a href="?page=ulasan_tambah" class="btn btn-primary">+ Tambah Data</a>
         <?php
         }
         ?>
         <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <tr>
             <th>No</th>
             <th>User</th>
             <th>Sampul</th>
             <th>Buku</th>
             <th>Ulasan</th>
             <th>Rating</th>
             <th>Aksi</th>
        </tr>

            <?php
             $i = 1;
             $query = mysqli_query($koneksi, "SELECT * FROM ulasan ul, user_perpus us, book bk WHERE ul.id_user=us.id_user AND bk.id_buku=ul.id_buku");

             while ($data = mysqli_fetch_array($query)) {
                 if ($_SESSION['user']['role_id'] == 'Peminjam' && $data['id_user'] != $_SESSION['user']['id_user']) {
                 continue; 
                 }
             ?>
                <tr>
                  <td><?php echo $i++; ?></td>
                  <td><?php echo $data['username']; ?></td>
                  <td><img src="gambar/<?php echo $data['sampul']; ?>" style="width: 100px; height: 150px;"></td>
                  <td><?php echo $data['judul_buku']; ?></td>
                  <td><?php echo $data['isi_ulasan']; ?></td>
                  <td><?php echo $data['rating']; ?></td>
                  <td>
                      <div class="d-flex">
                         <?php
                          if ($_SESSION['user']['role_id'] == 'Admin' || $_SESSION['user']['role_id'] == 'Petugas') {
                          ?>
                          <a onclick="return confirm('Apakah anda yakin menghapus data ini?')" href="?page=ulasan_hapus&&id=<?php echo $data['id_ulasan']; ?>" class="btn btn-danger flex-fill">Hapus</a>
                         <?php
                          }
                          ?>
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