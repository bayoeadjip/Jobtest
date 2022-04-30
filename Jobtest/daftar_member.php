<?php

include 'config.php';
 //tidak perlu session
/*error_reporting(0);

session_start();
$sql = "SELECT level_user FROM tbl_user WHERE nama_user='".$_SESSION['nama_user']."'";
$result = mysqli_query($conn, $sql);
if (!isset($_SESSION['nama_user']) OR $result != 1) {
    header("Location: index.html");
} */

if (isset($_POST['submit'])) {
    $nama_mem = $_POST['nama_mem'];
	$no_hp = $_POST['no_hp'];
	$tgl_lahir = $_POST['tgl_lahir'];
	$jenis_kelamin = $_POST['jenis_kelamin'];
	$no_ktp = $_POST['no_ktp'];
	$email = $_POST['email_mem'];
    $password = md5($_POST['pass_mem']);
	//echo $nama_mem; echo $no_hp; echo $tgl_lahir; echo $jenis_kelamin; echo $no_ktp; echo $email; echo $password;
 
    $sql = "SELECT * FROM tbl_member WHERE email_mem='$email'";
	$sql1 = "SELECT * FROM tbl_user WHERE nama_user='$email'";
        $result = mysqli_query($conn, $sql);
		$result1 = mysqli_query($conn, $sql1);
        if ((!$result->num_rows > 0) AND (!$result1->num_rows > 0) ) {
            $sql_insert = "INSERT INTO tbl_member (nama_mem, pass_mem, no_hp, tgl_lahir, email_mem, no_ktp, jenis_kelamin)
                    VALUES ('$nama_mem', '$password', '$no_hp', '$tgl_lahir', '$email', '$no_ktp','$jenis_kelamin')";
			$sql_insert1 = "INSERT INTO tbl_user (nama_user, password, level_user) VALUES ('$email','$password','2')";
            $result_insert = mysqli_query($conn, $sql_insert);
			$result_insert1 = mysqli_query($conn, $sql_insert1);
            if ($result_insert AND $result_insert1) {
                echo "<script>alert('Data User berhasil ditambahkan!')</script>";
            } else {
                echo "<script>alert('Terjadi kesalahan! Gagal menambahkan data user')</script>";
            }
        } else {
            echo "<script>alert('Gagal menambahkan user. User telah terdaftar.')</script>";
        } 
}
?>