<div class="card">
 <div class="card-body">
 <h1 class="mt-4">Laporan Peminjaman Buku</h1>
<div class="row">
 <div class="col-md-12">
    <a href="cetak.php" target="_blank" class="btn btn-primary"><i class="fa fa-print"></i>Cetak Data</a>
    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <tr>
            <th>No</th>
            <th>User</th>
            <th>Buku</th>
            <th>Tanggal Peminjaman</th>
            <th>Tanggal Pengembalian</th>
            <th>Status Peminjaman</th>
            <th>Denda</th>
        </tr>
        <?php
        $i=1;
        $query =  mysqli_query($koneksi, "SELECT*FROM peminjaman_buku LEFT JOIN user_perpus on user_perpus.id_user = peminjaman_buku.id_user LEFT JOIN book on book.id_buku = peminjaman_buku.id_buku");
        while($data = mysqli_fetch_array($query)){
            ?>
            <tr>
                <td><?php echo $i++; ?> </td>
                <td><?php echo $data['nama']; ?> </td>
                <td><?php echo $data['judul_buku']; ?> </td> 
                <td><?php echo $data['tanggal_peminjaman']; ?> </td>
                <td><?php echo $data['tanggal_pengembalian']; ?> </td>
                <td><?php echo $data['status_peminjaman']; ?> </td>
                <td><?php echo $data['denda']; ?> </td>
            </tr>
            <?php
        }
        ?>
    </table>
 </div>
</div>
 </div>
</div>