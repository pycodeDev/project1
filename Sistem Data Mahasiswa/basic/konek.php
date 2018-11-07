<?php
$server="localhost"; //server yang digunakan
$user="root"; //username server "disini default nya ialah root"
$pass=""; //password server "disini default nya ialah kosong(Null) / gak usah diisi"
$db="Data_Kampus"; //database yang kita gunakan

$conn=new mysqli($server, $user, $pass, $db); //buat koneksi baru

if ($conn ->connect_error) {	//pemilihan jika koneksi error
	die("Connection failed:".$conn->connect_error);
}
// echo "Connection Succes";
?>