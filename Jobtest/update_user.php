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

$username_get = $_GET['user']; //mengambil get user yg dilempar dari list_user.php
$sql_pass = "SELECT password from tbl_user WHERE nama_user='".$username_get."'";
$result = $conn->query($sql_pass);
		if ($result->num_rows > 0) {
  			while($row = $result->fetch_assoc()) {
				$password_get = $row['password'];
  			}
		} 
		$conn->close();

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

<h2>Update User Administrator</h2>


<form action="update_user_go.php" method="post">
  <div class="container">
  	<label for="Username"><b>Username</b></label>
    <input type="text" placeholder=<?php echo $username_get; ?> name="nama_user" disabled>
    <input type="text" placeholder="Masukkan Username Baru (isi dengan username yang sama jika tidak ingin memperbarui username)" name="nama_user1" required>
    
    <label for="Password"><b>Password</b></label>
    <input type="password" placeholder="Masukkan Password Baru (isi dengan password yang sama jika tidak ingin memperbarui password)" name="password1" required>
    
    <button type="submit" name="submit">Perbarui Data user ini</button>
  </div> 
</form>
<form action="list_user.php">
	<button type="submit">Lihat Data User</button>
</form>
</body>
</html>