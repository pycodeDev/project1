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

$query="INSERT INTO Tb_Mahasiswa (NIM,Nama,Semester,Fakultas,Jurusan) values ('$nim','$nama','$sem','$fakul','$jur')";
if ($r2=$conn->query($query) === TRUE){
	  echo '<script language="javascript">';
      echo 'alert("Data Berhasil Ditambahkan"); location.href="../home.php"';
      echo '</script>';
}else{
	echo "error: ".$query."<br>".$conn->error;
	echo "<a class='btn btn-danger mb-2' href='../edit_data.php'>Back</a>";
	// echo '<script language="javascript">';
 //    echo 'alert("error: "'.$query.'"<br>"'.$conn->error.'"); location.href="../home.php"';
 //    echo '</script>';
}
$conn->close();
?>