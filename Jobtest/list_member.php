<?php 
include 'config.php';
session_start();

if (!isset($_SESSION['nama_user'])) {
    header("Location: index.html");
}
?>
<!DOCTYPE html>
<html>
<head>
<style>
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}
</style>
</head>
<body>

<h2>Data Member</h2>

<table>
  <tr>
    <th>Nama</th>
    <th>Nomor HP</th>
    <th>Tanggal Lahir</th>
    <th>Email</th>
    <th>Jenis Kelamin</th>
    <th>Nomor KTP</th>
    <th>Foto Diri</th>
    <th>Aksi</th>
  </tr>
  <!-- Tampilkan data -->
  <tr>
  	<?php
		$sql = "SELECT * FROM tbl_member";
		$result = $conn->query($sql);
		if ($result->num_rows > 0) {
  			while($row = $result->fetch_assoc()) {
    			echo "<tr><td>".$row["nama_mem"]."</td><td>".$row["no_hp"]."</td><td>".$row["tgl_lahir"]."</td><td>".$row["email_mem"]."</td><td>".$row["jenis_kelamin"]."</td><td>".$row["no_ktp"]."</td><td><img src=".'/Jobtest/member_pic/pasfoto_biru.png'." width=".'150'." height=".'200'. "></td><td><a href='edit_member_self.php/?user=".$row["nama_user"]."'>Edit</a></td></tr>";
  			}
		} else {
  			echo "0 results";
		}
		$conn->close();
	?>
  </tr>
 
</table>

</body>
</html>

