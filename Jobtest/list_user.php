<?php 
include 'config.php';
 
error_reporting(0);

session_start();
$sql = "SELECT level_user FROM tbl_user WHERE nama_user='".$_SESSION['nama_user']."'";
$result = mysqli_query($conn, $sql);

if (!isset($_SESSION['nama_user']) OR $result != 1) {
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

<h2>Data Login Admin dan User</h2>

<form action="tambah_user.php">
    <input type="submit" value="Tambah Data User" />
</form>


<table>
  <tr>
    <th>Nama User</th>
    <th>Password</th>
    <th>Level User</th>
    <th>Aksi</th>

  </tr>
  <!-- Tampilkan data -->
  <tr>
  	<?php
		$sql = "SELECT * FROM tbl_user";
		$result = $conn->query($sql);
		if ($result->num_rows > 0) {
  			while($row = $result->fetch_assoc()) {
    			echo "<tr><td>".$row["nama_user"]."</td><td>".$row["password"]."</td><td>".$row["level_user"]."</td><td><a href='hapus_user.php/?user=".$row["nama_user"]."'>Hapus</a><br><a href='update_user.php/?user=".$row["nama_user"]."'>Update</a></td></tr>";
  			}
		} else {
  			echo "0 results";
		}
		$conn->close();
	?>
    	<!--<form action="edit_user.php">
    		<button type="submit">Edit</button>
		</form>
        <form action="hapus_user.php">
    		<button type="submit">Hapus</button>
		</form> -->
 
</table>
<form action="admin.php">
    <input type="submit" value="Kembali ke halaman Admin" />
</form>
<form action="logout.php">
    <input type="submit" value="Logout" />
</form>

</body>
</html>

