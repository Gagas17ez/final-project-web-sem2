<?php
session_start();

if (!isset($_SESSION['user_is_logged_in']) || $_SESSION['user_is_logged_in'] !== true) {

    header('Location: login2.php');
    exit;
}
?>

<?php
    include 'configs.php';
    include 'opensdb.php';
    $id = $_GET['id'];
    $sql = "SELECT * FROM mahasiswa WHERE id=".$id;
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0){
        while($row = mysqli_fetch_array($result)) {
            $nama = $row['nama'];
            $nrp = $row['nrp'];
            $ttl = $row['ttl'];
            $tlp = $row['tlp'];
            $alamat = $row['alamat'];
            $kelas = $row['kelas'];
            $userid = $row['user_id'];
        }
    }else {
        echo "isi SQL kosong lur";
    }
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Praktikum Cookies Session</title>
  <link rel="stylesheet" type="text/css" href="stylesheet3.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

</head>

<body>
  <link href="https://fonts.googleapis.com/css?family=Oleo+Script:400,700" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Teko:400,700" rel="stylesheet">
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
  
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="maindosen.php">Ecrol Dosen</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item ">
        <a class="nav-link" href="maindosen.php">Overview</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="userdosen.php">Profile User</a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="datakelass.php">Data Kelas</a>
      </li>
      <li class="nav-item ">
        <a class="nav-link" href="penilaianmenu.php">Penilaian Tugas</a>
      </li>
      <li class="nav-item">
      <a class="nav-link" href="uploadmenumateri.php">Upload Materi</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="logootdosen.php">Log Out</a>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Ngolek Opo" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
  </div>
</nav>


<div class="main">
    <div class="display-contact">
      <div class="form-title">Detail Mahasiswa</div>
      <a href="datakelass.php"><- Kembali ke Data Kelas</a>
      <div class="text-center">
      <?php
      if($nama == "Gagas Amukti Nandaka"){
      echo "<img src='https://i.imgur.com/HBHfxr1.jpg' class='img-thumbnail' style='width:300px;height:300px;' alt='potoku'>";
      }
      else if($nama == "Valentino Harpa"){
        echo "<img src='https://i.imgur.com/aeqax3u.png' class='img-thumbnail' style='width:300px;height:300px;' alt='potoku'>";
      }
      else if($nama == "Anne Boonchuy"){
        echo "<img src='https://i.imgur.com/sLpDfv5.png' class='img-thumbnail' style='width:300px;height:300px;' alt='potoku'>";
      }
      else{
        echo "<img src='https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_1280.png' class='img-thumbnail' style='width:300px;height:300px;' alt='potoku'>";
      }
      ?>
      </div>

      <div class="form-item"> Nama</div>
      <?php 
      if($nama == NULL){
        echo "Nama belum terisi";
      }else{
        echo $nama;
      }
      ?>

      <div class="form-item">NRP</div>
      <?php 
      if($nrp == NULL){
        echo "NRP belum diisi";
      }else{
        echo $nrp;
      } 
      ?>

      <div class="form-item">Kelas</div>
      <?php 
      if($kelas == NULL){
        echo "KELAS belum diisi";
      }else{
        echo $kelas;
      } 
      ?>

      <div class="form-item">Nomor Telepon</div>
      <?php 
      if($tlp == NULL){
        echo "Nomor Telepon belum terisi";
      }else{
        echo $tlp;
      } 
      ?>

      <div class="form-item">Tgl lahir</div>
      <?php 
      if($ttl == NULL){
        echo "Tanggal lahir belum terisi dengan benar";
      }else{
        echo $ttl; 
      }
      ?>
      
      <div class="form-item">alamat</div>
      <?php 
      if($alamat == NULL){
        echo "NRP belum diisi";
      }else{
        echo $alamat;
      } 
      ?>

    <div class="form-item">UserName</div>
      <?php 
      if($userid == NULL){
        echo "userid belum diisi";
      }else{
        echo $userid;
      } 
      ?>
    </div>
  </div>
</body>