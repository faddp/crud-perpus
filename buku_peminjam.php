<div class="card">
    <div class="card-body">
        <h1 class="mt-4">Buku</h1>
        <div class="row">
            <div class="col-md-12">
                <div class="d-flex justify-content-end mb-3">
                    <form action="" method="GET">
                        <div class="input-group">
                            <input type="text" name="search" class="form-control" placeholder="Cari buku...">
                            <button type="submit" class="btn btn-primary">Cari</button>
                        </div>
                    </form>
                </div>

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
                    $search = isset($_GET['search']) ? $_GET['search'] : '';
                    $query =  mysqli_query($koneksi, "SELECT*FROM book LEFT JOIN kategori on book.id_kategori = kategori.id_kategori WHERE judul_buku LIKE '%$search%'");

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
                                    <a href="?page=peminjaman_tambah&&id=<?php echo $data['id_buku']; ?>" class="btn btn-info flex-fill me-2"> Pinjam </a>
                                    
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