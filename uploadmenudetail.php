<?php
session_start();

if (!isset($_SESSION['user_is_logged_in']) || $_SESSION['user_is_logged_in'] !== true) {

    header('Location: loginsiswa.php');
    exit;
}
?>

<?php
    $matkul = $_GET['namakelas'];
    include 'configs.php';
    include 'opensdb.php';
    $id = $_SESSION['user'];
    $sql = "SELECT * FROM mahasiswa WHERE user_id='$id'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0){
        while($row = mysqli_fetch_array($result)) {
            $pengumpul = $row['nama'];
        }
    }else {
        echo "isi SQL kosong lur";
    }
    
    include 'closeddb.php';
?>

<?php 
require 'configss.php';

if (isset($_POST['submit'])) {
$tipeFile = array('png','jpg','docx','pdf','ppt');
$namaFile= $_FILES['file']['name'];
$ukuran = $_FILES['file']['size'];
$cek = pathinfo($namaFile, PATHINFO_EXTENSION);




if ($cek == 'jpg' || $cek == 'png') {
    $deskripsi = 'Gambar';
}elseif ($cek == 'txt' || $cek == 'pdf' || $cek == 'docx' || $cek == 'ppt') {
    $deskripsi = 'Dokumen';
}elseif($cek == 'exe'){
    $deskripsi = 'App';
}else {
  echo "<script> alert('ELLOLL');</script>";
}
if (!in_array($cek,$tipeFile)) {
  echo "<script> alert('ELLOLL');</script>";
}else {
  echo "<script> alert('Berhasil Upload');</script>";
    if ($ukuran < 5097152) {
        move_uploaded_file($_FILES['file']['tmp_name'],'file/'.$namaFile);
        mysqli_query($koneksi,"INSERT INTO uploadata VALUES (NULL,'$namaFile','$cek','$ukuran','$deskripsi','$pengumpul','$matkul', 0)");
        
        header("Location: completeupload.php");
    }else {
        echo "<script> alert('Ukuran file terlalu besar');</script>";
    }
} 
}
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Praktikum Cookies Session</title>
  <link rel="stylesheet" type="text/css" href="stylesheet3.css">
  <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
  <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
  <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
</head>

<body>
  <link href="https://fonts.googleapis.com/css?family=Oleo+Script:400,700" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Teko:400,700" rel="stylesheet">
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
  
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="mainsiswa.php">Ecrol Mahasiswa</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="mainsiswa.php">Overview</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="usersiswa.php">Profile User</a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="uploadmenu.php">Upload Tugas</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="viewnilaisis.php">Lihat Nilai</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="materimenusis.php">Materi</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="logootsiswa.php">Log Out</a>
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
      <div class="form-title">Upload Tugas <?php echo $matkul ?></div>
     
    
<div class="contact-section">
	<div class="container">
    <form action="" method="POST" enctype="multipart/form-data">
        Upload File
        <input type="file" name="file" id="fileToUpload">
        <input type="submit" value="Upload File" name="submit">
    </form>
    </div>
</div>
</div>
</div>
</div>
</body>