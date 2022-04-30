<?php 
include 'config.php';
 
error_reporting(0);

session_start();
$sql = "SELECT level_user FROM tbl_user WHERE nama_user='".$_SESSION['nama_user']."'";
$result = mysqli_query($conn, $sql);
if (!isset($_SESSION['nama_user']) OR $result != 1) {
    header("Location: index.html");
}

if (isset($_POST['submit'])) {
    $nama_user = $_POST['nama_user'];
    $password = md5($_POST['password']);
 
    $sql = "SELECT * FROM tbl_user WHERE nama_user='$nama_user'";
        $result = mysqli_query($conn, $sql);
        if (!$result->num_rows > 0) {
            $sql = "INSERT INTO tbl_user (nama_user, password, level_user)
                    VALUES ('$nama_user', '$password', '1')";
            $result = mysqli_query($conn, $sql);
            if ($result) {
                echo "<script>alert('Data User berhasil ditambahkan!')</script>";
                $username = "";
                $email = "";
                $_POST['password'] = "";
            } else {
                echo "<script>alert('Terjadi kesalahan! Gagal menambahkan data user')</script>";
            }
        } else {
            echo "<script>alert('Gagal menambahkan user. User telah terdaftar.')</script>";
        }
}

?>

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {font-family: Arial, Helvetica, sans-serif;}
form {border: 3px solid #f1f1f1;}

input[type=text], input[type=password] {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  box-sizing: border-box;
}

button {
  background-color: #04AA6D;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
}

button:hover {
  opacity: 0.8;
}

.cancelbtn {
  width: auto;
  padding: 10px 18px;
  background-color: #f44336;
}

.imgcontainer {
  text-align: center;
  margin: 24px 0 12px 0;
}

img.avatar {
  width: 40%;
  border-radius: 50%;
}

.container {
  padding: 16px;
}

span.psw {
  float: right;
  padding-top: 16px;
}

/* Change styles for span and cancel button on extra small screens */
@media screen and (max-width: 300px) {
  span.psw {
     display: block;
     float: none;
  }
  .cancelbtn {
     width: 100%;
  }
}
</style>
</head>
<body>

<h2>Tambah User Administrator</h2>

<form action="" method="post">
  <div class="container">
  	<label for="Username"><b>Username</b></label>
    <input type="text" placeholder="Masukkan Username" name="nama_user" required>
    
    <label for="Password"><b>Password</b></label>
    <input type="password" placeholder="Masukkan Password" name="password" required>
    
    <button type="submit" name="submit">Tambahkan user ini</button>
  </div> 
</form>
<form action="list_user.php">
	<button type="submit">Lihat Data User</button>
</form>
<form action="admin.php">
    <button type="submit">Kembali ke halaman Admin</button>
</form>
<form action="logout.php">
    <button type="submit">Logout</button>
</form>
</body>
</html>