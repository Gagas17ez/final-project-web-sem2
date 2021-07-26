<?php
include 'koneksi1.php';

$nilai=$_GET['nilai'];
$id=$_GET['id'];

$sql = "UPDATE uploadata SET Nilai='$nilai' WHERE id='$id' ";


if(mysqli_query($conn,$sql)){
header("location:completenilai.php");
}
mysqli_close($conn);
?>