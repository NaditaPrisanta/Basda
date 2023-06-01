<?php 

require '../DatabaseConn/DatabaseConn.php';

// ambil id yang ada di url
$NIM = $_GET['NIM'];

// data yang mau diedit kembalikan value
$mhs = query("SELECT * FROM biodata WHERE NIM = $NIM")[0];
 
function editData($post){
  global $conn;

  // ambil data dari tiap form
  $NIMLama = $_GET["NIM"];
  $NAMA = $post["NAMA"];
  $FAKULTAS = $post["FAKUTAS"];
  $PRODI = $post["PRODI"];
  $NIM = $post["NIM"];
  $USIA = $post["USIA"];
  $ALAMAT = $post["ALAMAT"];
  $EMAIL = $post["EMAIL"];
  $NOMOR_TELEPON = $post["NOMOR_TELEPON"];
  $JENIS_KELAMIN = $post["JENIS_KELAMIN"];
  $ASAL = $post["ASAL"];

  //kirim data yang sudah di ubah ke database
  $query= "UPDATE biodata SET
      NAMA = '$NAMA',
      FAKULTAS = '$FAKULTAS',
      PRODI = '$PRODI',
      NIM = '$NIM',
      USIA = '$USIA',
      ALAMAT = '$ALAMAT',
      EMAIL = '$EMAIL',
      NOMOR_TELEPON = '$NOMOR_TELEPON',
      JENIS_KELAMIN = '$JENIS_KELAMIN',
      ASAL = '$ASAL'

      WHERE NIM = $NIMLama;
      ";

    mysqli_query ($conn, $query);

    return mysqli_affected_rows($conn);

    }

    // cek apakah tombol submit sudah dipencet apa belum

    if (isset($_POST["submit"]) ) {

      //cek apakah data berhasil ditambah atau tidak
      if (editData($_POST) > 0){
              echo "
          <script>
            alert('data berhasil diubah!');
            document.location.href=
            '../';
          </script>
          ";
        }
      else{echo "
          <script>
              alert('data gagal diubah!');
              document .location.href=
              '../';
          <script>
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
  <title>editdata</title>
</head>
<body>
  <div class="form-container">
    <h3>EDIT DATA MAHASISWA</h3>

    <form action="" autocomplete="off" method="post" enctype="multipart/form-data">
      <label for="NAMA">NAMA</label>
      <input type="text" id="NAMA" name="NAMA" value="<?=$mhs["NAMA"]  ?>" placeholder="MASUKKAN NAMA" required>
      
      <label for="FAKULTAS">FAKULTAS</label>
      <input type="text" id="FAKULTAS" name="FAKULTAS" value="<?=$mhs["FAKULTAS"]  ?>" placeholder="FAKULTAS" required>
      
      <label for="PRODI">PRODI</label>
      <input type="text" id="PRODI" name="PRODI" value="<?=$mhs["PRODI"]  ?>" placeholder="PROGRAM STUDI" required>
      
      <label for="NIM">NIM</label>
      <input type="text" id="NIM" name="NIM" value="<?=$mhs["NIM"]  ?>" placeholder="Nomor Induk Mahasiswa" required>
      
      <label for="USIA">USIA</label>
      <input type="text" id="USIA" name="USIA" value="<?=$mhs["USIA"]  ?>" placeholder="USIA" required>
      
      <label for="ALAMAT">ALAMAT</label>
      <input type="text" id="ALAMAT" name="ALAMAT" value="<?=$mhs["ALAMAT"]  ?>" placeholder="ALAMAT" required>
      
      <label for="EMAIL">EMAIL</label>
      <input type="text" id="EMAIL" name="EMAIL" value="<?=$mhs["EMAIL"]  ?>" placeholder="EMAIL" required>
      
      <label for="NOMOR_TELEPON">NOMOR_TELEPON</label>
      <input type="text" id="NOMOR_TELEPON" name="NOMOR_TELEPON" value="<?=$mhs["NOMOR_TELEPON"]  ?>" placeholder="NOMOR TELEPON" required>
      
      <label for="JENIS_KELAMIN">JENIS_KELAMIN</label>
      <input type="text" id="JENIS_KELAMIN" name="JENIS_KELAMIN" value="<?=$mhs["JENIS_KELAMIN"]  ?>" placeholder="JENIS KELAMIN" required>
      
      <label for="ASAL">ASAL</label>
      <input type="text" id="ASAL" name="ASAL" value="<?=$mhs["ASAL"]  ?>" placeholder="ASAL" required>

      <button type="submit" name="submit">Tambah Data</button>
    </form>
  </div>
</body>
</html>
