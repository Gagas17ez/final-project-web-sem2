<?php
session_start();

if (!isset($_SESSION['user_is_logged_in']) || $_SESSION['user_is_logged_in'] !== true) {

    header('Location: logindosen.php');
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Praktikum Proyek  Akhir</title>
  <link rel="stylesheet" type="text/css" href="stylesheet3.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
  <link href="https://fonts.googleapis.com/css?family=Oleo+Script:400,700" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Teko:400,700" rel="stylesheet">
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
  
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="main2.php">Ecrol Dosen</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item ">
        <a class="nav-link" href="maindosen.php">Overview</a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="userdosen.php">Profile User</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="datakelass.php">Data Kelas</a>
      </li>
      <li class="nav-item">
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

<?php
    include 'configs.php';
    include 'opensdb.php';
    $id = $_SESSION['user'];
    $sql = "SELECT * FROM dosen WHERE user_id='$id'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0){
        while($row = mysqli_fetch_array($result)) {
            $nama = $row['nama'];
            $matkul = $row['matkul'];
            $tlp = $row['tlp'];
            $email = $row['email'];
            $ttl = $row['ttl'];
            $alamat = $row['alamat'];
        }
    }else {
        echo "isi SQL kosong lur";
    }
    include 'closeddb.php';
    ?>
<div class="main">
    <div class="display-contact">
      <div class="form-title">Profile Dosen</div>
      <div class="text-center">
      <?php
      if($nama == "Gagas Amukti Nandaka"){
      echo "<img src='https://i.imgur.com/HBHfxr1.jpg' class='img-thumbnail' style='width:300px;height:300px;' alt='potoku'>";
      }
      else if($nama == "Umi Saadah"){
        echo "<img src='https://i1.rgstatic.net/ii/profile.image/528602216058880-1503039997573_Q512/Umi-Saadah.jpg' class='img-thumbnail' style='width:300px;height:300px;' alt='potoku'>";
      }
      else if($nama == "Anne Boonchuy"){
        echo "<img src='https://i.imgur.com/sLpDfv5.png' class='img-thumbnail' style='width:300px;height:300px;' alt='potoku'>";
      }
      else{
        echo "<img src='https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_1280.png' class='img-thumbnail' style='width:300px;height:300px;' alt='potoku'>";
      }
      ?>
      </div>

      <div class="form-item">Nama</div>
      <?php 
      if($nama == NULL){
        echo "Nama belum terisi";
      }else{
        echo $nama;
      }
      ?>

      <div class="form-item">Mata Kuliah</div>
      <?php 
      if($matkul == NULL){
        echo "Matkul Kosong";
      }else{
        echo $matkul;
      } 
      ?>

    <div class="form-item">Tlp</div>
      <?php 
      if($tlp == NULL){
        echo "Alamat Kosong";
      }else{
        echo $tlp;
      } 
      ?>

    <div class="form-item">Email</div>
      <?php 
      if($email == NULL){
        echo "NRP belum diisi";
      }else{
        echo $email;
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

      <div class="form-item">Alamat</div>
      <?php 
      if($alamat == NULL){
        echo "Alamat Kosong";
      }else{
        echo $alamat;
      } 
      ?>
      
    </div>
  </div>
</body>