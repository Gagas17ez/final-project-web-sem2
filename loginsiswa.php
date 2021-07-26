<?php
session_start();
$errorMessage = '';
if (isset($_POST['txtUserId']) && isset($_POST['txtPassword'])) {
    include 'configs.php';
    include 'opensdb.php';
    $userId = $_POST['txtUserId'];
    $password = $_POST['txtPassword'];
    $_SESSION['user'] = $userId;
    

    $sql = "SELECT user_id FROM mahasiswa WHERE user_id = '$userId' AND user_password ='$password'";
    $result = mysqli_query($conn,$sql);
    if (mysqli_num_rows($result) == 1) {
        $_SESSION['user_is_logged_in'] = true;

        header('Location: mainsiswa.php');
        exit;
    } else {
        $errorMessage = 'Mohon Maaf UserId Mahasiswa anda Salah';
    }
    include 'closeddb.php';
}
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Proyek Akhir Pemograman Web</title>
  <link rel="stylesheet" type="text/css" href="stylesheet3.css">
  <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
  <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
  <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
</head>
<body>
  <link href="https://fonts.googleapis.com/css?family=Oleo+Script:400,700" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Teko:400,700" rel="stylesheet">
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
  <section id="contact">
			<div class="section-content">
				<h1 class="section-header">Login Mahasiswa</h1>
				<h3>Proyek Akhir Pemograman Web</h3>
			</div>
			<div class="contact-section">
			<div class="container">
            <form action="" method="post" name="frmLogin" id="frmLogin">
			  			<div class="form-group">
			  				<label for="nama">UserName Mahasiswa</label>
					    	<input type="text" class="form-control" name="txtUserId" placeholder=" masukkan username anda">
				  		</div>
				  		<div class="form-group">
					    	<label for="pass">Password</label>
					    	<input type="password" class="form-control" name="txtPassword" placeholder=" masukkan password anda">
					  	</div>
                          <?php
                            if ($errorMessage != '') {
                            ?>
                            <p align="left"><strong><font color="red"><?php echo $errorMessage; ?></font></strong></p>
                            <?php
                                }
                            ?>	
					  	<div class="form-group">
                            <button type="submit" name="btnLogin" id="btnLogin" value="Login" class="btn btn-primary btn-lg submit">Log in</button>
                            <button value="click" onClick="window.open('regist.php')" class="btn btn-success btn-lg submit">Register</button>
                        </div>
                    </div>
                    </div>
                        
                        
		</section>
        </form>
</body>
</html>