<?php
require '../DatabaseConn/DatabaseConn.php';

function tambahData($post) {
	global $conn;

	//ambil data dari setiap form 
	$id = htmlspecialchars($post["id"]);
	$nama = htmlspecialchars($post["nama"]);
	$nik = htmlspecialchars($post["nik"]);
	$kelas = htmlspecialchars($post["kelas"]);
	

// push ke database
	$query = "INSERT INTO data_siswa 
				VALUES

			('$id', 
			'$nama',
			'$nik',
			'$kelas')
			";

mysqli_query($conn, $query);

return mysqli_affected_rows($conn);

}

if ( isset($_POST["submit"]) ) {

	// cek apakah data berhasil ditambah atau tidak
	if (tambahData($_POST) > 0 ){
			echo "
			<script>
			alert('data berhasil ditambahkan!');
			document.location.href = '../';
			</script>
		";	
		}	else { echo "
			<script>
			alert('data gagal ditambahkan!');
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
  <title>TAMBAH DATA SISWA</title>
</head>
<body>
  <div class="form-container">
    <h3>TAMBAH DATA SISWA</h3>

    <form action="" autocomplete="off" method="post">

	  <label for="id">id</label>
      <input type="id" id="id" name="id" placeholder="Masukkan id" required>
	  <label for="nama">nama</label>
      <input type="nama" nama="nama" name="nama" placeholder="Masukkan nama" required>
	  <label for="nik">nik</label>
      <input type="nik" nik="nik" name="nik" placeholder="Masukkan nik" required>
	  <label for="kelas">kelas</label>
      <input type="kelas" kelas="kelas" name="kelas" placeholder="Masukkan kelas" required>
	  

    <button type="submit" name="submit">Tambah Data</button>
    </form>
  </div>
</body>
</html>