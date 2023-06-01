<?php 

require '../DatabaseConn/DatabaseConn.php';

// tangkap NIM di url
$NIM = $_GET["NIM"];

// function hapus berdasarkan NIM
function hapusData ($NIM){
	global $conn;

	mysqli_query($conn, "DELETE FROM biodata WHERE NIM = $NIM");

return mysqli_affected_rows($conn);
}

// cek data apakah berhasil di hapus atau belum
	if (hapusData($NIM)) {
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