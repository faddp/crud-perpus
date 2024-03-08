<div class="card">
 <div class="card-body">
 <h1 class="mt-4">Buku</h1>
<div class="row">
 <div class="col-md-12">
    <a href="?page=buku_tambah" class="btn btn-primary">+ Tambah Data</a>

    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <tr>
            <th>No</th>
            <th>Nama Kategori</th>
            <th>Sampul</th>
            <th>Judul</th>
            <th>Penulis</th>
            <th>Penerbit</th>
            <th>Tahun Terbit</th>
            <th>Deskripsi</th>
            <th>Stok</th>
            <th>Aksi</th>
        </tr>
        <?php
        $i=1;
        $query =  mysqli_query($koneksi, "SELECT*FROM book LEFT JOIN kategori on book.id_kategori = kategori.id_kategori");
        while($data = mysqli_fetch_array($query)){
       
        ?>
            <tr>
                <td><?php echo $i++; ?> </td>
                <td><?php echo $data['nama_kategori']; ?> </td>

                <td> <?php if ($data['sampul'] != ''): ?>
                <img src="gambar/<?php echo $data['sampul']; ?>" style="width: 150px; height: 200px;">
                 <?php else: ?>
                <img src="gambar/eror.jpg" style="width: 150px; height: 200px;">
                <?php endif; ?>
                
                </td>
                <td><?php echo $data['judul_buku']; ?> </td>
                <td><?php echo $data['penulis']; ?> </td>
                <td><?php echo $data['penerbit']; ?> </td>
                <td><?php echo $data['tahun_terbit']; ?> </td>
                <td><?php echo $data['deskripsi']; ?> </td>
                <td><?php echo $data['stok']; ?> </td>
                <td>
                    <div class="d-flex">
                    <a href="?page=buku_ubah&&id=<?php echo $data['id_buku']; ?>" class="btn btn-info flex-fill me-2"> Ubah </a>
                    <a onclick="return confirm('Apakah anda yakin menghapus data ini?')" href="?page=buku_hapus&&id=<?php echo $data['id_buku']; ?>" class="btn btn-danger flex-fill"> Hapus </a>
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