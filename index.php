<?php 

require 'DatabaseConn/DatabaseConn.php';

$rows = query("SELECT * FROM data_siswa");

// tombol cari
function cariData($keyword){
  
  $query= "SELECT * FROM data_siswa WHERE

      id LIKE '%$keyword%' OR 
      nama LIKE '%$keyword%' OR
      nik LIKE '%$keyword%' OR 
      kelas LIKE '%$keyword%' OR
    ";

  return query($query);
}

// mengecek ketika tombol cari sudah ditekan
if (isset($_GET["cari"])) {

  $rows = cariData($_GET["keyword"]);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  <link rel="stylesheet" href="style.css">
  <title>TABEL MAHASISWA</title>
</head>
<body>
  <h1 class="title">TABEL SISWA</h1>
   <a href="AddData/"><button type="button" class="btn btn-warning">TAMBAH DATA SISWA</button></a>
  <form action="" method="GET">
    <input type="text" placeholder="Search.." autocomplete="off" size="35px" name="keyword" id="keyword">
    <button class="btn btn-secondary p-8" name="cari">Cari</button>
 </form>
  <table class="content-table">
        <thead>
          <tr>
            <th>NO</th>
            <th>Action</th>
            <th>ID</th>
            <th>Nama</th>
            <th>NIK</th>
            <th>Kelas</th>
          </tr>
        </thead>
        <tbody>
          <?php $i = 1; ?>
          <?php foreach ($rows as $mhs):?>
          <tr>
            <td><?= $i; ?></td>
            <td><a href="EditData/?id=<?=$mhs["id"] ?>"><button type="button" class="btn btn-primary">Edit</button></a>
                <a href="Delete/?id=<?=$mhs["id"] ?>" onclick= "return confirm('yakin ingin menghapus data ini?')"><button type="button" class="btn btn-danger">Delete</button></a>
            </td>
            <td><?=$mhs["id"]; ?></td>
            <td><?=$mhs["nama"]; ?></td>
            <td><?=$mhs["nik"]; ?></td>
            <td><?=$mhs["kelas"]; ?></td>
          </tr>
        
        <?php $i++; ?>
      <?php endforeach; ?>
        </tbody>
      </table>

<script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>