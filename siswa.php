<?php
$host = "localhost"; // Ganti dengan nama host MySQL Anda
$username = "root"; // Ganti dengan username MySQL Anda
$password = ""; // Ganti dengan password MySQL Anda
$database = "dataujian"; // Ganti dengan nama database Anda

// Buat koneksi
$koneksi = new mysqli($host, $username, $password, $database);

// Periksa koneksi
if ($koneksi->connect_error) {
    die("Koneksi Gagal: " . $koneksi->connect_error);
}

// Query untuk mengambil data dari tabel
$query = "SELECT * FROM data_siswa"; // Ganti 'nama_tabel' dengan nama tabel yang sesuai

$result = $koneksi->query($query);

// Periksa apakah query berhasil dieksekusi
if ($result) {
    // Ambil data satu per satu
    while ($row = $result->fetch_assoc()) {
        // Tampilkan data
        echo "ID: " . $row["id"] . " - Nama: " . $row["nama"] . " - Nik: " . $row["nik"] . " - Kelas: " . $row["kelas"] . "<br>";
    }
} else {
    echo "Error: " . $koneksi->error;
}

// Tutup koneksi
$koneksi->close();
?>
