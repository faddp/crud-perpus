-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 08 Mar 2024 pada 14.49
-- Versi server: 10.4.25-MariaDB
-- Versi PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `perpustakaan`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `book`
--

CREATE TABLE `book` (
  `id_buku` int(11) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `sampul` varchar(255) NOT NULL,
  `judul_buku` varchar(255) NOT NULL,
  `penulis` varchar(255) NOT NULL,
  `penerbit` varchar(255) NOT NULL,
  `tahun_terbit` int(11) NOT NULL,
  `deskripsi` text NOT NULL,
  `stok` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `book`
--

INSERT INTO `book` (`id_buku`, `id_kategori`, `sampul`, `judul_buku`, `penulis`, `penerbit`, `tahun_terbit`, `deskripsi`, `stok`) VALUES
(7, 2, 'kancil.jpg', 'Dongeng Si Kancil', 'Etno Sutejo', 'Erlangga', 2015, 'Buku Dongeng Si Kancil', 15),
(11, 4, 'dilan1990.jpg', 'Dilan 1990', 'Budi Santoso', 'Falcon', 2011, 'Cerita dilan 1990', 6),
(13, 4, '', 'Dilan 1992', 'Budi Santoso', 'Falcon', 2012, 'Cerita dilan 1992', 20),
(14, 7, 'rumus2.jpg', 'Rumus Matematika SMP/MTS', 'Fajar Punjabi', 'Erlangga', 2012, 'Rumus praktis matematika untuk SMP/MTS', 20);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`) VALUES
(2, 'Fiksi'),
(4, 'Novel'),
(7, 'Rumus'),
(8, 'Kamus'),
(11, 'Cerita Pendek');

-- --------------------------------------------------------

--
-- Struktur dari tabel `koleksi_pribadi`
--

CREATE TABLE `koleksi_pribadi` (
  `id_koleksi` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_buku` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `peminjaman_buku`
--

CREATE TABLE `peminjaman_buku` (
  `id_peminjaman` int(11) NOT NULL,
  `id_buku` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `tanggal_peminjaman` date NOT NULL,
  `tanggal_pengembalian` date NOT NULL,
  `status_peminjaman` enum('Dipinjam','Dikembalikan') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `peminjaman_buku`
--

INSERT INTO `peminjaman_buku` (`id_peminjaman`, `id_buku`, `id_user`, `tanggal_peminjaman`, `tanggal_pengembalian`, `status_peminjaman`) VALUES
(24, 7, 10, '2024-02-28', '2024-03-06', 'Dikembalikan'),
(28, 11, 12, '2024-03-03', '2024-03-10', 'Dipinjam'),
(30, 11, 10, '2024-03-03', '2024-03-10', 'Dipinjam'),
(35, 7, 10, '2024-03-03', '2024-03-10', 'Dipinjam');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ulasan`
--

CREATE TABLE `ulasan` (
  `id_ulasan` int(11) NOT NULL,
  `id_buku` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `isi_ulasan` text NOT NULL,
  `rating` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `ulasan`
--

INSERT INTO `ulasan` (`id_ulasan`, `id_buku`, `id_user`, `isi_ulasan`, `rating`) VALUES
(16, 7, 10, 'aaa', 1),
(17, 7, 10, 'Bagus', 10),
(19, 11, 9, 'Bagusss', 9);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_perpus`
--

CREATE TABLE `user_perpus` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `alamat` text NOT NULL,
  `role_id` enum('Admin','Petugas','Peminjam') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user_perpus`
--

INSERT INTO `user_perpus` (`id_user`, `nama`, `username`, `password`, `email`, `alamat`, `role_id`) VALUES
(3, 'Administrator', 'Admin', '698d51a19d8a121ce581499d7b701668', 'admin@gmail.com', 'Jenangan, Ponorogo', 'Admin'),
(4, 'Petugas1', 'Petugas', '698d51a19d8a121ce581499d7b701668', 'petugas@gmail.com', 'Sumoroto, Ponorogo', 'Petugas'),
(6, 'Fernando Miko', 'Miko', '698d51a19d8a121ce581499d7b701668', 'miko@gmail.com', 'Mangkujayan, Ponorogo', 'Peminjam'),
(7, 'Andik Pratama', 'Andik', '698d51a19d8a121ce581499d7b701668', 'andik@gmail.com', 'Jetis, Ponorogo', 'Peminjam'),
(9, 'Fira', 'Firaa', '698d51a19d8a121ce581499d7b701668', 'fira@gmail.com', 'Ponorogo, Ponorogo', 'Peminjam'),
(10, 'Fadfa Putra', 'Fadfa', '698d51a19d8a121ce581499d7b701668', 'fadfa@gmail.com', 'Ponorogo, Ponorogo', 'Peminjam'),
(11, 'Deni Sumargo', 'Deni', '698d51a19d8a121ce581499d7b701668', 'deni@gmai.com', 'Ponorogo, Ponorogo', 'Petugas'),
(12, 'Bagus', 'Bagus', '698d51a19d8a121ce581499d7b701668', 'bagus@gmail.com', 'Ponorogo, Ponorogo', 'Peminjam'),
(14, 'Ferdi Jaya', 'Ferdi', '698d51a19d8a121ce581499d7b701668', 'ferdi@gmail.com', 'Ponorogo, Ponorogo', 'Peminjam'),
(16, 'Ferdi Nanda', 'Ferdi', '698d51a19d8a121ce581499d7b701668', 'ferdi@gmail.com', 'Ponorogo, Ponorogo', 'Peminjam');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`id_buku`),
  ADD KEY `id_kategori` (`id_kategori`);

--
-- Indeks untuk tabel `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indeks untuk tabel `koleksi_pribadi`
--
ALTER TABLE `koleksi_pribadi`
  ADD PRIMARY KEY (`id_koleksi`),
  ADD KEY `id_user` (`id_user`,`id_buku`),
  ADD KEY `id_buku` (`id_buku`);

--
-- Indeks untuk tabel `peminjaman_buku`
--
ALTER TABLE `peminjaman_buku`
  ADD PRIMARY KEY (`id_peminjaman`),
  ADD KEY `id_buku` (`id_buku`,`id_user`),
  ADD KEY `id_user` (`id_user`);

--
-- Indeks untuk tabel `ulasan`
--
ALTER TABLE `ulasan`
  ADD PRIMARY KEY (`id_ulasan`),
  ADD KEY `id_buku` (`id_buku`,`id_user`),
  ADD KEY `id_user` (`id_user`);

--
-- Indeks untuk tabel `user_perpus`
--
ALTER TABLE `user_perpus`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `book`
--
ALTER TABLE `book`
  MODIFY `id_buku` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `koleksi_pribadi`
--
ALTER TABLE `koleksi_pribadi`
  MODIFY `id_koleksi` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `peminjaman_buku`
--
ALTER TABLE `peminjaman_buku`
  MODIFY `id_peminjaman` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT untuk tabel `ulasan`
--
ALTER TABLE `ulasan`
  MODIFY `id_ulasan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT untuk tabel `user_perpus`
--
ALTER TABLE `user_perpus`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `book`
--
ALTER TABLE `book`
  ADD CONSTRAINT `book_ibfk_1` FOREIGN KEY (`id_kategori`) REFERENCES `kategori` (`id_kategori`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `koleksi_pribadi`
--
ALTER TABLE `koleksi_pribadi`
  ADD CONSTRAINT `koleksi_pribadi_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user_perpus` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `koleksi_pribadi_ibfk_2` FOREIGN KEY (`id_buku`) REFERENCES `peminjaman_buku` (`id_buku`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `peminjaman_buku`
--
ALTER TABLE `peminjaman_buku`
  ADD CONSTRAINT `peminjaman_buku_ibfk_1` FOREIGN KEY (`id_buku`) REFERENCES `book` (`id_buku`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `peminjaman_buku_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `user_perpus` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `ulasan`
--
ALTER TABLE `ulasan`
  ADD CONSTRAINT `ulasan_ibfk_1` FOREIGN KEY (`id_buku`) REFERENCES `book` (`id_buku`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ulasan_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `user_perpus` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
