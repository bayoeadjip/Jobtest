<?php
include 'config.php';

$sql = "SELECT * FROM tbl_member";
$result = $conn->query($sql);

//buat array php
$emparray = array();
while($row =mysqli_fetch_assoc($result)){
        $emparray[] = $row;
}

//konversi array php to json
echo json_encode($emparray);
?>