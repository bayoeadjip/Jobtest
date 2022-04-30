<?php 
include 'config.php';
 
error_reporting(0);

session_start();
$sql = "SELECT level_user FROM tbl_user WHERE nama_user='".$_SESSION['nama_user']."'";
$result = mysqli_query($conn, $sql);

if (!isset($_SESSION['nama_user']) OR $result != 1) {
    header("Location: index.html");
}

$nama_user = $_GET['user'];
//echo $nama_user;
//echo $_SESSION['nama_user'];
//if nama user = session maka tidak boleh hapus
if($nama_user==$_SESSION['nama_user']){
	echo "<script>alert('Gagal menghapus Data User! Anda tidak dapat menghapus data Anda sendiri!')</script>";
} else {
	$sql_delete = "DELETE FROM tbl_user WHERE nama_user='".$nama_user."'";
	$result = $conn->query($sql_delete);
	if ($result==TRUE){
		echo "<script>alert('Berhasil menghapus data user!')</script>";
		//echo "Berhasil menghapus data user";
	} else {
		echo "<script>alert('Gagal menghapus data user! Terjadi kesalahan!')</script>";
		//echo "Gagal menghapus data user! Terjadi kesalahan!";	

	}
		
}
?>


