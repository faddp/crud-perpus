<div class="card">
 <div class="card-body">
 <h1 class="mt-4">Peminjaman Buku</h1>
<div class="row">
 <div class="col-md-12">
    <a href="?page=peminjaman_tambah"  class="btn btn-primary"><i class="fa fa-plus"></i> Tambah Peminjaman </a>
    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <tr>
            <th>No</th>
            <th>User</th>
            <th>Buku</th>
            <th>Tanggal Peminjaman</th>
            <th>Tanggal Pengembalian</th>
            <th>Status Peminjaman</th>
            <th>Denda</th>
            <?php if ($_SESSION['user']['role_id'] == 'Petugas'): ?>
            <th>Aksi</th>
            <?php endif; ?>
        </tr>
        <?php
        $i=1;

        if ($_SESSION['user']['role_id'] == 'Peminjam') {
            $query = mysqli_query($koneksi, "SELECT * FROM peminjaman_buku LEFT JOIN user_perpus ON user_perpus.id_user = peminjaman_buku.id_user LEFT JOIN book ON book.id_buku = peminjaman_buku.id_buku WHERE peminjaman_buku.id_user=".$_SESSION['user']['id_user']);
        } else {
            $query = mysqli_query($koneksi, "SELECT * FROM peminjaman_buku LEFT JOIN user_perpus ON user_perpus.id_user = peminjaman_buku.id_user LEFT JOIN book ON book.id_buku = peminjaman_buku.id_buku");
        }

        while($data = mysqli_fetch_array($query)){
            ?>
            <tr>
                <td><?php echo $i++; ?> </td>
                <td><?php echo $data['nama']; ?> </td>
                <td><?php echo $data['judul_buku']; ?> </td> 
                <td><?php echo $data['tanggal_peminjaman']; ?> </td>
                <td><?php echo $data['tanggal_pengembalian']; ?> </td>
                <td><?php echo $data['status_peminjaman']; ?> </td>
                <td><?php echo $data['denda']; ?></td>
                <?php if ($_SESSION['user']['role_id'] == 'Petugas'): ?>
                <td>
                    <div class="d-flex">
                    <a href="?page=peminjaman_ubah&&id=<?php echo $data['id_peminjaman']; ?>" class="btn btn-info flex-fill me-2"> Ubah </a>
                    <a onclick="return confirm('Apakah anda yakin menghapus data ini?')" href="?page=peminjaman_hapus&&id=<?php echo $data['id_peminjaman']; ?>" class="btn btn-danger flex-fill"> Hapus </a>
                    </div>
                </td>
                <?php endif; ?>
            </tr>
            <?php
        }
        ?>
    </table>
 </div>
</div>
 </div>
</div>