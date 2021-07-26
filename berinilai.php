<?php
session_start();

if (!isset($_SESSION['user_is_logged_in']) || $_SESSION['user_is_logged_in'] !== true) {
    header('Location: logindosen.php');
    exit;
}
?>
<?php
    include 'configs.php';
    include 'opensdb.php';
    $id = $_GET['id'];
    $sql = "SELECT * FROM uploadata WHERE id ='$id'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0){
        while($row = mysqli_fetch_array($result)) {
            $nama = $row['namafile'];
        }
    }else {
        echo "isi SQL ELLOL";
    }

    include 'closeddb.php';
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Ecrol Dosen</title>
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
      <li class="nav-item ">
        <a class="nav-link" href="datakelass.php">Data Kelas</a>
      </li>
      <li class="nav-item active">
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

<section id="contact">
			<div class="section-content">
				<h1 class="section-header">Memasukkan Nilai Tugas</h1>
                <h3><?php echo $nama ?></h3>
			</div>
			<div class="contact-section">
			<div class="container">
            <form method="get" action="updatenilai.php" >
                <input type="hidden" value="<?php echo $id?>" name="id">
			  			<div class="form-group">
			  				<label for="nama">Masukkan Nilai</label>
					    	<input type="text" class="form-control" name="nilai" placeholder="masukkan nilai tugas">
				  		</div>
					  	<div class="form-group">
                            <button type="submit" name="btnLogin" class="btn btn-primary btn-lg submit">Submit</button>
                        </div>
                    </div>
                </div>
                        
		</section>
        </form>

</body>