<?php

require '../DatabaseConn/DatabaseConn.php';

// ambil id yang ada di URL
$sws = $_GET["id"];

// data yang mau diedit kembalikan value
$mhs = query("SELECT * FROM data_siswa WHERE id = $sws")[0];

function editData($post)
{
    global $conn;

    // ambil data dari tiap form
    $idLama = $_GET["id"];
    $id = $post["id"];
    $nama = htmlspecialchars($post["nama"]);
    $nik = htmlspecialchars($post["nik"]);
    $kelas = htmlspecialchars($post["kelas"]);
    // kirim data yang sudah diubah ke database
    $query = "UPDATE data_siswa SET
			nama ='$nama',
			nik ='$nik',
			kelas ='$kelas'
			WHERE id =$idLama;
			";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

// cek apakah tombol submit sudah dipencet apa belum

if (isset($_POST["submit"])) {

    // cek apakah data berhasil ditambah atau tidak
    if (editData($_POST) > 0) {
        echo "
			<script>
				alert('data berhasil diubah!');
				document.location.href= '../';
			</script>
			";
    } else {
        echo "
			<script>
					alert('data gagal diubah!');
					document.location.href= '../';
			</script>
			";
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>EDIT DATA SISWA</title>
</head>

<body>
    <div class="form-container">
        <h3>EDIT DATA SISWA</h3>

        <form action="" autocomplete="off" method="post" enctype="multipart/form-data">
            <label for="id">id</label>
            <input type="text" id="id" name="id" value="<?= $mhs["id"] ?>" style="background-color: #f2f2f2;" readonly>
            <label for="nama">nama</label>
            <input type="text" id="nama" name="nama" value="<?= $mhs["nama"] ?>" style="background-color: #f2f2f2;">
            <label for="nik">nik</label>
            <input type="text" id="nik" name="nik" value="<?= $mhs["nik"] ?>" style="background-color: #f2f2f2;">
            <label for="kelas">kelas</label>
            <input type="text" id="kelas" name="kelas" value="<?= $mhs["kelas"] ?>" style="background-color: #f2f2f2;">

            <button type="submit" name="submit">Ubah Data</button>

        </form>
    </div>
</body>

</html>
