<?php 
require '../DatabaseConn/DatabaseConn.php';

function tambahData($post)  {
  global $conn;

  //ambil data dari setiap form
  $NAMA = htmlspecialchars($post["NAMA"]);
  $FAKULTAS = htmlspecialchars($post["FAKULTAS"]);
  $PRODI = htmlspecialchars($post["PRODI"]);
  $NIM = htmlspecialchars($post["NIM"]);
  $USIA = htmlspecialchars($post["USIA"]);
  $ALAMAT = htmlspecialchars($post["ALAMAT"]);
  $EMAIL = htmlspecialchars($post["EMAIL"]);
  $NOMOR_TELEPON = htmlspecialchars($post["NOMOR_TELEPON"]);
  $JENIS_KELAMIN = htmlspecialchars($post["JENIS_KELAMIN"]);
  $ASAL = htmlspecialchars($post["ASAL"]);

//push ke database 
  $query = "INSERT INTO biodata
        VALUES 
      ('$NAMA',
        '$FAKULTAS',
        '$PRODI',
        '$NIM',
        '$USIA',
        '$ALAMAT',
        '$EMAIL',
        '$NOMOR_TELEPON',
        '$JENIS_KELAMIN',
        '$ASAL')
        ";

mysqli_query($conn, $query);

return mysqli_affected_rows($conn);

}
// user klik tombol submit

if ( isset ($_POST["submit"]) ) {

  // cek apakah data berhasil ditambah atau tidak
  if (tambahData($_POST) > 0 ){
    echo "
    <script>
    alert ('data berhasil ditambahkan!');
    document.location.href = '../';
    </script>
    ";
  } else {echo "
    <script>
    alert ('data gagal ditambahkan!');
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
  <title>Add Data</title>
</head>
<body>
  <div class="form-container">
    <h3>TAMBAH DATA MAHASISWA</h3>



    <form action="" autocomplete="off" method="post">
      <label for="NAMA">NAMA</label>
      <input type="text" id="NAMA" name="NAMA" placeholder="MASUKKAN NAMA" required>
      <label for="FAKULTAS">FAKULTAS</label>
      <input type="text" id="FAKULTAS" name="FAKULTAS" placeholder="FAKULTAS" required>
      <label for="PRODI">PRODI</label>
      <input type="text" id="PRODI" name="PRODI" placeholder="PROGRAM STUDI" required>
      <label for="NIM">NIM</label>
      <input type="text" id="NIM" name="NIM" placeholder="Nomor Induk Mahasiswa" required>
      <label for="USIA">USIA</label>
      <input type="text" id="USIA" name="USIA" placeholder="USIA" required>
      <label for="ALAMAT">ALAMAT</label>
      <input type="text" id="ALAMAT" name="ALAMAT" placeholder="ALAMAT" required>
      <label for="EMAIL">EMAIL</label>
      <input type="text" id="EMAIL" name="EMAIL" placeholder="EMAIL" required>
      <label for="NOMOR_TELEPON">NOMOR_TELEPON</label>
      <input type="text" id="NOMOR_TELEPON" name="NOMOR_TELEPON" placeholder="NOMOR TELEPON" required>
      <label for="JENIS_KELAMIN">JENIS_KELAMIN</label>
      <input type="text" id="JENIS_KELAMIN" name="JENIS_KELAMIN" placeholder="JENIS KELAMIN" required>
      <label for="ASAL">ASAL</label>
      <input type="text" id="ASAL" name="ASAL" placeholder="ASAL" required>

      <button type="submit" name="submit">Tambah Data</button> 
    </form>
  </div>
</body>
</html>
