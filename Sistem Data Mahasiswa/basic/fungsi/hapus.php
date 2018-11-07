<?php
if (isset($_GET['nim'])) {
	include('../konek.php');

	$nim = $_GET['nim'];

	$hapus = "DELETE FROM Tb_Mahasiswa WHERE NIM='$nim'";
	$exe=$conn->query($hapus);
		if ($exe) {
			echo '<script language="javascript">';
      		echo 'alert("Sukses menghapus data"); location.href="../home.php"';
      		echo '</script>';
		}else{
			echo '<script language="javascript">';
    		echo 'alert("Menghapus Gagal "'.$conn->error.'"); location.href="../home.php"';
    		echo '</script>';		
		}
}else{
	echo '<script>window.history.back()</script>';
}
?>