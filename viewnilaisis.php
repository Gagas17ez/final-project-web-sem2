<?php
session_start();

if (!isset($_SESSION['user_is_logged_in']) || $_SESSION['user_is_logged_in'] !== true) {

    header('Location: loginsiswa.php');
    exit;
}
?>


<?php
    include 'configs.php';
    include 'opensdb.php';
    $id = $_SESSION['user'];
    $sql = "SELECT * FROM mahasiswa WHERE user_id='$id'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0){
        while($row = mysqli_fetch_array($result)) {
            $nama = $row['nama'];
        }
    }else {
        echo "isi SQL kosong lur";
    }
    
    include 'closeddb.php';
?>

<?php
include 'configs.php';
include 'opensdb.php';

$sql = "SELECT * FROM uploadata WHERE pengumpul ='$nama'";
$result = mysqli_query($conn, $sql);
include 'closeddb.php';

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
  <a class="navbar-brand" href="maindosen.php">Ecrol Mahasiswa</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item ">
        <a class="nav-link" href="mainsiswa.php">Overview</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="usersiswa.php">Profile User</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="uploadmenu.php">Upload Tugas</a>
      </li>
      <li class="nav-item active">
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

<?php
echo "<div class='form-title'>Data Pengumpulan Tugas $nama </div>";
?>

<div class="contact-section">
		<div class="container">
    <table class="table table-striped table-dark">
  <thead> 
    <tr>
      <th scope="col">No</th>
      <th scope="col">Nama File</th>
      <th scope="col">Type</th>
      <th scope="col">Matkul</th>
      <th scope="col">Pengumpul</th>
      <th scope="col">Nilai</th>
      <th scope="col">Action</th>
    </tr>

  <?php
  $no = 1;

  if (mysqli_num_rows($result) > 0){
    while($row = mysqli_fetch_array($result)){
      echo "<tr>";
      echo "<td>" . $no;
      echo "<td>" . $row['namafile'];
      echo "<td>" . $row['desc'];
      echo "<td>" . $row['matkul'];
      echo "<td>" . $row['pengumpul'];
      echo "<td>" . $row['Nilai'];
    ?>
      <td><a href="donlodd.php?filename=<?=$row['namafile']?>">Download</a></td>
    <?php 
      $no++;   
    }
  }else{
    echo "<tr>";
    echo "<td>";
    echo "<td>";
    echo "<td>";
    echo "<td>";
    echo "<td>" . "isi tabel kosong";
    $sql = "ALTER TABLE form AUTO_INCREMENT = 1";
  }
  ?>
</table>
  </div>
  </div>
</body>
</html>
</body>