<?php

include 'config.php';
 
error_reporting(0);

session_start();
$sql = "SELECT level_user FROM tbl_user WHERE nama_user='".$_SESSION['nama_user']."'";
$result = mysqli_query($conn, $sql);
//jika session tidak sama atau bukan level 1 maka tidak boleh akses
if (!isset($_SESSION['nama_user']) OR $result != 1) {
    header("Location: index.html");
}
$username_get= $_POST['nama_user'];
//command update data user
if (isset($_POST['submit'])) {
    $nama_user1 = $_POST['nama_user1']; //mengambil post username baru
    $password1 = md5($_POST['password1']); //mengambil post password baru
	if($nama_user1==$_SESSION['nama_user']){ //jika memperbarui user yang sedang dlam login session, maka otomatis logout
		$sql_update = "UPDATE tbl_user SET nama_user='$nama_user1', password='$password1' WHERE nama_user='$username_get'";
		$result = $conn->query($sql_delete);
		if($result==TRUE){
			echo "<script>alert('Berhasil memperbarui data Anda! Silakan login kembali dengan username/password baru!')</script>";
			session_destroy();
		} else {
			echo "<script>alert('Gagal memperbarui data Anda!')</script>";	
		}
	} else { //jika user lain yang diubah datanya
		$sql_update = "UPDATE tbl_user SET nama_user='$nama_user1', password='$password1' WHERE nama_user='$username_get'";
		$result = $conn->query($sql_delete);
		if($result==TRUE){
			echo "<script>alert('Berhasil memperbarui data User!')</script>";
		} else {
			echo "<script>alert('Gagal memperbarui data User!')</script>";	
		}
	}
 
}

?>