<?php 
  require 'DatabaseConn/DatabaseConn.php';

  $rows = query("SELECT * FROM biodata");

  //tombol cari 
  function cariData($keyword){

      $query= "SELECT * FROM biodata WHERE

        NAMA LIKE '%$keyword%' OR
        FAKULTAS LIKE '%$keyword%' OR
        PRODI LIKE '%$keyword%' OR 
        NIM LIKE '%$keyword%' OR 
        USIA LIKE '%$keyword%' OR 
        ALAMAT LIKE '%$keyword%' OR 
        EMAIL LIKE '%$keyword%' OR 
        NOMOR_TELEPON LIKE '%$keyword%' OR 
        JENIS_KELAMIN LIKE '%$keyword%' OR 
        ASAL LIKE '%$keyword%'

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
  <h1 class="title">TABEL MAHASISWA</h1>
   <a href="adddata/"><button type="button" class="btn btn-secondary">TAMBAH DATA MAHASISWA</button></a>
    <form action="" method="GET">
    <input type="text" placeholder="Search.." autocomplete="off" size="35px" name="keyword" id="keyword">
    <button class="btn btn-warning p-8" name="cari">Cari</button>
 </form>
   <table class="content-table">
        <thead>
          <tr>
            <th>No</th>
            <th>Action</th>
            <th>NAMA</th>
            <th>FAKULTAS</th>
            <th>PRODI</th>
            <th>NIM</th>
            <th>USIA</th>
            <th>ALAMAT</th>
            <th>EMAIL</th>
            <th>NOMOR_TELEPON</th>
            <th>JENIS_KELAMIN</th>
            <th>ASAL</th>
          </tr>
        </thead>
        <tbody>
          <?= $i = 1 ?>
          <?php foreach ($rows as $mhs):?>
          <tr>
            <td><?= $i; ?></td>
            <td><a href="editdata/?NIM=<?=$mhs["NIM"]   ?>"><button type="button" class="btn btn-primary">Edit</button></a>  <a href="delete/?NIM=<?=$mhs["NIM"]   ?>" onclick= "return confirm('yakin ingin menghapus data ini?')"><button type="button" class="btn btn-danger">Delete</button></a></td>
            <td><?= $mhs["NAMA"]; ?></td>
            <td><?= $mhs["FAKULTAS"]; ?></td>
            <td><?= $mhs["PRODI"]; ?></td>
            <td><?= $mhs["NIM"]; ?></td>
            <td><?= $mhs["USIA"]; ?></td>
            <td><?= $mhs["ALAMAT"]; ?></td>
            <td><?= $mhs["EMAIL"]; ?></td>
            <td><?= $mhs["NOMOR_TELEPON"]; ?></td>
            <th><?= $mhs["JENIS_KELAMIN"]; ?></th>
            <th><?= $mhs["ASAL"]; ?></th>
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