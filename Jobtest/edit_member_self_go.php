<?php
include 'config.php';
 
error_reporting(0);

session_start();

//jika bukan member yang sedang login tidak bisa akses
if (!isset($_SESSION['nama_user'])) {
    header("Location: index.html");
}

$sql1 = "SELECT * FROM tbl_member WHERE email_mem='".$_SESSION['nama_user']."'";
$username_get = $_SESSION['nama_user'];

if (isset($_POST['submit'])) {
    $nama_mem = $_POST['nama_mem'];
	$no_hp = $_POST['no_hp'];
	$tgl_lahir = $_POST['tgl_lahir'];
	$jenis_kelamin = $_POST['jenis_kelamin'];
	$no_ktp = $_POST['no_ktp'];
	//echo $nama_mem; echo $no_hp; echo $tgl_lahir; echo $jenis_kelamin; echo $no_ktp; echo $email; echo $password;
	$sql_update = "UPDATE tbl_member SET nama_mem='$nama_mem', no_hp='$no_hp', tgl_lahir='$tgl_lahir', jenis_kelamin='$jenis_kelamin', no_ktp='$no_ktp' WHERE nama_mem='$username_get'";
	$result = $conn->query($sql_delete);
		if($result==TRUE){
			echo "<script>alert('Berhasil memperbarui data User!')</script>";
		} else {
			echo "<script>alert('Gagal memperbarui data User!')</script>";	
		}
}
	

?>