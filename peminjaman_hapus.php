<?php
$id = $_GET['id'];
$query = mysqli_query($koneksi, "DELETE FROM peminjaman_buku where id_peminjaman =$id")
?>
<script>
    alert ('Hapus data berhasil');
    location.href = "index.php?page=peminjaman";
</script>