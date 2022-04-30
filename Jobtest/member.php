<?php
include 'config.php';
 
error_reporting(0);

session_start();

//jika bukan member yang sedang login tidak bisa akses
if (!isset($_SESSION['nama_user'])) {
    header("Location: index.html");
}

$sql1 = "SELECT * FROM tbl_member WHERE email_mem='".$_SESSION['nama_user']."'";

$result = $conn->query($sql1);
		if ($result->num_rows > 0) {
  			while($row = $result->fetch_assoc()) {
    			$nama_mem = $row['nama_mem'];
				$pass_mem = $row['pass_mem'];
				$no_hp = $row['no_hp'];
				$tgl_lahir = $row['tgl_lahir'];
				$email_mem = $row['email_mem'];
				$no_ktp = $row['no_ktp'];
				$jenis_kelamin = $row['jenis_kelamin'];
  			}
		} else {
  			echo "0 results";
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

<?php echo "<h2>Selamat Datang, " .$nama_mem."!". "</h2>"; ?>
<h3> Data Anda </h3>

<form action="edit_member_self.php" method="post">
  <div class="container">
  	<label for="nama_member"><b>Nama</b></label>
    <input type="text" placeholder= <?php echo $nama_mem; ?> name="nama_mem" disabled>
    
    <label for="no_hp"><b>Nomor HP</b></label>
    <input type="text" placeholder=<?php echo $no_hp; ?> name="no_hp" disabled>
   
    <label for="tgl_lahir"><b>Tanggal Lahir</b></label>
    <input type="text" placeholder=<?php echo $tgl_lahir; ?> name="tgl_lahir" disabled>

    <label for="jenis_kelamin"><b>Jenis Kelamin</b></label>
    <input type="text" placeholder=<?php echo $jenis_kelamin; ?> name="jenis_kelamin" disabled>
    
    <label for="no_ktp"><b>Nomor KTP</b></label>
    <input type="text" placeholder=<?php echo $no_ktp; ?> name="no_ktp" disabled>
        
    <label for="email_mem"><b>Email</b></label>
    <input type="text" placeholder=<?php echo $email_mem; ?> name="email_mem" disabled>
    
   <label for="foto_mem"><b>Foto Diri (Ukuran Maksimal 1 Mb)</b></label>
	<div class="foto_mem" style="width:200px;">
  		<img src="/Jobtest/member_pic/pasfoto_biru.png" width="150" height="200" alt="Member">
	</div>
     
    <div class="foto_mem" style="width:200px;">
  		<input type="file" name="foto_mem" id="foto_mem">   
	</div>
     
    
    <button type="submit" name="submit">Klik untuk menuju laman perbaruan data member Anda</button>
  </div> 
</form>

<form action="hapus_member.php" method="get">
	<div class="container">
    	<?php echo "<a href='hapus_member.php?user=".$email_mem."'>Hapus Data Anda</a>"?>
    </div>
</form>

<form action="logout_member.php">
	<div class="container">
    	<button type="submit">Logout</button>
    </div>
</form>
</body>
</html>