<?php
$id = $_GET['id'];
$query = mysqli_query($koneksi, "DELETE FROM user_perpus where id_user =$id")
?>
<script>
    alert ('Hapus data berhasil');
    location.href = "index.php?page=user";
</script>