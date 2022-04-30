<?php 
include 'config.php';
 
error_reporting(0);

session_start();
$sql = "SELECT level_user FROM tbl_user WHERE nama_user='".$_SESSION['nama_user']."'";
$result = mysqli_query($conn, $sql);

if (!isset($_SESSION['nama_user'])) {
    header("Location: login_member.html");
}

$nama_user = $_GET['user'];
//echo $nama_user;
//echo $_SESSION['nama_user'];

$sql_delete = "UPDATE tbl_member SET nama_mem=' ',no_hp=' ', tgl_lahir=' ', no_ktp=' ', jenis_kelamin=' ' WHERE email_mem='".$nama_user."'";
$result = $conn->query($sql_delete);
if ($result==TRUE){
  echo "<script>alert('Berhasil menghapus data member! Silakan update data anda kembali')</script>";
		//echo "Berhasil menghapus data member";
} else {
	echo "<script>alert('Gagal menghapus data member! Terjadi kesalahan!')</script>";
		//echo "Gagal menghapus data member! Terjadi kesalahan!";	
	}
	
?>


