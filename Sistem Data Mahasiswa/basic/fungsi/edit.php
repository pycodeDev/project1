<?php
include "../konek.php";
$nim	=$_POST['nim'];
$nama	=$_POST['nama'];
$sem	=$_POST['sem'];
$fak	=$_POST['Fakultas'];
$jur	=$_POST['Jurusan'];


$q="SELECT * FROM Tb_Fakultas where kode_fak='".$fak."'";
$r=$conn->query($q);
$rw=mysqli_fetch_array($r,MYSQLI_ASSOC);
$fakul=$rw['Fakultas'];

$query="UPDATE Tb_Mahasiswa SET Nama='$nama', Semester='$sem', Fakultas='$fakul', Jurusan='$jur' where NIM='$nim'";
if ($r2=$conn->query($query) === TRUE){
	  echo '<script language="javascript">';
      echo 'alert("Data Berhasil Diubah"); location.href="../home.php"';
      echo '</script>';
	// echo "sukses";
}else{
	echo "error: ".$query."<br>".$conn->error;
	echo "<a class='btn btn-danger mb-2' href='../edit_data.php'>Back</a>";
	// echo '<script language="javascript">';
 //    echo 'alert("error: "'.$query.'"<br>"'.$conn->error.'"); location.href="../home.php"';
 //    echo '</script>';
}
$conn->close();
?>