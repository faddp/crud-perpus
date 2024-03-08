<?php
    // filter_laporan.php

    // Lakukan koneksi ke database
    $koneksi = mysqli_connect("localhost", "root", "", "perpustakaan");

    // Periksa apakah koneksi berhasil
    if (mysqli_connect_errno()) {
        echo "Koneksi database gagal: " . mysqli_connect_error();
        exit();
    }

    // Ambil tanggal awal dan tanggal akhir dari parameter GET
    $tanggal_awal = isset($_GET['tanggal_awal']) ? $_GET['tanggal_awal'] : '';
    $tanggal_akhir = isset($_GET['tanggal_akhir']) ? $_GET['tanggal_akhir'] : '';

    // Buat query dengan filter tanggal peminjaman jika tanggal_awal dan tanggal_akhir tidak kosong
    $query = "SELECT * FROM peminjaman_buku
            LEFT JOIN user_perpus ON user_perpus.id_user = peminjaman_buku.id_user
            LEFT JOIN book ON book.id_buku = peminjaman_buku.id_buku";
    if (!empty($tanggal_awal) && !empty($tanggal_akhir)) {
        $query .= " WHERE tanggal_peminjaman BETWEEN '$tanggal_awal' AND '$tanggal_akhir'";
    }

    // Eksekusi query
    $result = mysqli_query($koneksi, $query);

    // Tampilkan hasil query dalam bentuk tabel HTML
    echo "<table>";
    echo "<thead>";
            '<tr>
            <th>No</th>
            <th>User</th>
            <th>Buku</th>
            <th>Tanggal Peminjaman</th>
            <th>Tanggal Pengembalian</th>
            <th>Status Peminjaman</th>
        </tr>';
    $i = 1;
    while ($data = mysqli_fetch_array($result)) {
        echo '<tr>
                <td>' . $i++ . '</td>
                <td>' . $data['nama'] . '</td>
                <td>' . $data['judul_buku'] . '</td>
                <td>' . $data['tanggal_peminjaman'] . '</td>
                <td>' . $data['tanggal_pengembalian'] . '</td>
                <td>' . $data['status_peminjaman'] . '</td>
            </tr>';
    }
    echo "</tbody>";
    echo "</table>";
// Tutup koneksi database
mysqli_close($koneksi);
?>