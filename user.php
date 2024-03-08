<div class="card">
 <div class="card-body">
 <h1 class="mt-4">Kelola User </h1>
<div class="row">
 <div class="col-md-12">
    <a href="?page=user_tambah" class="btn btn-primary">+ Tambah Data</a>
    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Username</th>
            <th>Email</th>
            <th>Alamat</th>
            <th>Level</th>
        </tr>

        <?php
        $i = 1;
        $query = mysqli_query($koneksi, "SELECT * FROM user_perpus");
        while ($data = mysqli_fetch_array($query)) {
        ?>
        <tr>
        <td><?php echo $i++; ?> </td>
        <td><?php echo $data['nama']; ?> </td>
        <td><?php echo $data['username']; ?> </td>
        <td><?php echo $data['email']; ?> </td>
        <td><?php echo $data['alamat']; ?> </td>
        <td><?php echo $data['role_id']; ?> </td>
        <td>
            <div class="d-flex">
                <?php
                if ($data['role_id'] != 'Admin') {
                    ?>
                    <a href="?page=user_ubah&&id=<?php echo $data['id_user']; ?>" class="btn btn-info flex-fill me-2">Ubah</a>
                <?php
                }
                if ($data['role_id'] != 'Admin') {
                    ?>
                    <a onclick="return confirm('Apakah anda yakin menghapus data ini?')" href="?page=user_hapus&&id=<?php echo $data['id_user']; ?>" class="btn btn-danger flex-fill">Hapus</a>
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