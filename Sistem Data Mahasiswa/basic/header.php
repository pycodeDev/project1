<!DOCTYPE html>
<html>
<head>
	<title>Beranda</title>
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="bootstrap/css/tab.css">
	<link rel="stylesheet" type="text/css" href="bootstrap/css/footer.css">
  <link rel="stylesheet" type="text/css" href="DataTables/datatables.css">
  <!-- <link rel="stylesheet" type="text/css" href="bootstrap/css/fontawesome-free-5.4.1-web/css/fontawesome.css"> -->
  <link rel="stylesheet" type="text/css" href="bootstrap/css/fontawesome-free-5.4.1-web/css/all.css">

	<script type="text/javascript" src="bootstrap/js/bootstrap.js"></script>
  <script type="text/javascript" src="bootstrap/js/jquery/jquery.min.js"></script>
  <script type="text/javascript" src="DataTables/datatables.js"></script>
  <script type="text/javascript" src="JqueryC/jquery.chained.min.js"></script>
  
  <!-- <script type="text/javascript" src="bootstrap/js/jquery/jquery.dataTables.min.js"></script> -->
  
</head>
<body style="background-color: #e9ecef;">
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  	<a class="navbar-brand" href="home.php">Sistem Informasi Data Mahasiswa</a>
  		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    	<span class="navbar-toggler-icon"></span>
  		</button>
</nav>
<!-- Data Tables -->
<script>
  $(function(){
    $("#tampil").dataTable();
  })
</script>
<!-- Combo Box Berantai Menggunakan Chained -->
<script>
  $("#Jurusan").chained("#Fakultas");
</script>
<!-- Peringatan saat ingin menghapus data -->
<script type="text/javascript" language="JavaScript">
  function konfirmasi(){
    tanya = confirm("Anda Yakin Akan Menghapus Data ?");
      if (tanya == true) return true;
      else return false;
  }
</script>