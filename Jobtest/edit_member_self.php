<?php
include 'config.php';
 
error_reporting(0);

session_start();

//jika bukan member yang sedang login tidak bisa akses
if (!isset($_SESSION['nama_user'])) {
    header("Location: index.html");
}

$sql1 = "SELECT * FROM tbl_member WHERE email_mem='".$_SESSION['nama_user']."'"; 

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
<h3> Perbaruan Data Anda </h3>

<form action="edit_member_self_go.php" method="post">
  <div class="container">
  	<label for="nama_member"><b>Nama</b></label>
    <input type="text" placeholder="Masukkan Nama baru Anda (gunakan Nama lama jika tidak akan mengubah data ini)" name="nama_mem" required>
    
    <label for="no_hp"><b>Nomor HP</b></label>
    <input type="text" placeholder="Masukkan no HP baru Anda (gunakan no HP lama jika tidak akan mengubah data ini)" name="no_hp" required>
   
    <label for="tgl_lahir"><b>Tanggal Lahir</b></label>
    <div class="tgl_lahir" style="width:200px;">
		<input type="date" id="tgl_lahir" name="tgl_lahir" >
    </div>

    <label for="jenis_kelamin"><b>Jenis Kelamin</b></label>
    <div class="jenis_kelamin" style="width:200px;">
  		<select name="jenis_kelamin" id="jenis_kelamin">
    		<option value="Laki-laki">Laki-laki</option>
    		<option value="Perempuan">Perempuan</option>
    		<option value="Tidak menyebutkan">Tidak menyebutkan</option>
  		</select>
	</div>
    
    <label for="no_ktp"><b>Nomor KTP</b></label>
    <input type="text" placeholder="Masukkan nomor KTP baru Anda (gunakan nomor KTP lama jika tidak akan mengubah data ini)" name="no_ktp" required>
    
   <!-- <label for="foto_mem"><b>Foto Diri (Ukuran Maksimal 1 Mb)</b></label>
	<div class="foto_mem" style="width:200px;">
  		<img src="member.jpg" alt="Member">
	</div>
     
    <div class="foto_mem" style="width:200px;">
  		<input type="file" name="foto_mem" id="foto_mem">   
	</div> -->
     
    
    <button type="submit" name="submit">Klik untuk menuju laman perbaruan data member Anda</button>
  </div> 
</form>


<form action="logout_member.php" method="get">
	<div class="container">
    	<button type="submit">Logout</button>
    </div>
</form>
</body>
</html>