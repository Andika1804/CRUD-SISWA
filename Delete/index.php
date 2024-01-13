<?php 

require '../DatabaseConn/DatabaseConn.php';

// tangkap nim di url
$id = $_GET["id"];

// function hapus bedasarkan nim
function hapusData($id) {
	global $conn;
	
	mysqli_query($conn, "DELETE FROM data_siswa WHERE id = $id");
	
return mysqli_affected_rows($conn);	
}	

// cek data apakah berhasil di hapus atau belum
	if (hapusData($id)) {
	echo "
			<script>
			alert('data berhasil dihapus!');
			document.location.href = '../';
			</script>
		";
	}else{

	echo "
			<script>
			alert('data gagal dihapus!');
			</script>
		";
	}

?>