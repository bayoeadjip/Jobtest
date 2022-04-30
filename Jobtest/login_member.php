<?php 
 
include 'config.php';
 
error_reporting(0);
 
session_start();
 
if (isset($_SESSION['nama_user'])) {
    header("Location: index.html");
} 
 
if (isset($_POST['submit'])) {
    $nama_user = $_POST['email_mem'];
    $password = md5($_POST['password']);
 
    $sql = "SELECT * FROM tbl_user WHERE nama_user='$nama_user' AND password='$password'";
    $result = mysqli_query($conn, $sql);
    if ($result->num_rows > 0) {
        $row = mysqli_fetch_assoc($result);
        $_SESSION['nama_user'] = $row['nama_user'];
        header("Location: member.php");
		echo "<script>alert('Selamat datang')</script>";
    } else {
		sleep(2);
        echo "<script>alert('Username atau password Anda salah. Silahkan coba lagi!')</script>";
		
    }
}
 
?>