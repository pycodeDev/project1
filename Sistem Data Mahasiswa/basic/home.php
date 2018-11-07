<?php
include "header.php";
include "konek.php";
?>
<div class="jumbotron">
  <h4 class="display-8 " style="text-align: center;"> Data Mahasiswa</h1>
  <hr class="my-4">
<div class="card">
  <!-- header -->
  <div class="card-header text-center ">
    Data
  </div>
  <!-- body -->
  <div class="card-body">
    <main>
      <input class="input-coba" id="tab1" type="radio" name="tabs" checked>
        <label class="label-coba" for="tab1">Data</label>
          <input class="input-coba" id="tab2" type="radio" name="tabs">
        <label class="label-coba" for="tab2">Input</label>
          <input  class="input-coba" id="tab3" type="radio" name="tabs">
        <section class="section-coba" id="content1">
          <h4 class="text-center"><b>Data Mahasiswa</b></h4>
          <center><u><a href="fungsi/laporan.php" target="_blank">export to pdf</a></u></center>
            <div class="table-responsive-md">
              <table class="table table-hover table-bordered table-stripped table-light" id="tampil">
                <thead class="thead-dark">
                  <tr>
                    <th>No</th>
                    <th>NIM</th>
                    <th>Nama</th>
                    <th>Semester</th>
                    <th>Jurusan</th>
                    <th>Fakultas</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  
                    <?php
                    $no=1;
                    $sql="SELECT * from Tb_Mahasiswa";
                    $result=$conn->query($sql);

                    if($result->num_rows > 0){
                      while ($row = $result->fetch_assoc()) {?>
                      <tr>
                        <td><?php echo $no++;?></td>
                        <td><?php echo $row['NIM']?></td>
                        <td><?php echo $row['Nama']?></td>
                        <td><?php echo $row['Semester']?></td>
                        <td><?php echo $row['Jurusan']?></td>
                        <td><?php echo $row['Fakultas']?></td>
                        <td>
                          <a class="btn btn-warning btn-xs fa fa-eye" href="edit_data.php?nim=<?php echo $row['NIM'] ?>"></a> 
                          <a class="btn btn-danger btn-xs fa fa-trash" onclick="return konfirmasi()" href="fungsi/hapus.php?nim=<?php echo $row['NIM'] ?>"></a>
                        </td>
                      </tr>
                    <?php 
                     }
                   }else{?>
                    <td colspan="7" class="text-center">Tidak Ada Data!!!</td>
                   <?php

                    }
                    $conn->close();
                    ?>
                    
                  
                </tbody>
              </table>
            </div>
        </section>
        <section class="section-coba" id="content2">
          <h4 class="text-center"><b>Form Input Data Mahasiswa</b></h4>
          <form action="fungsi/tambah.php" method="POST">
            <div class="form-group row justify-content-md-center">
              <label class="col-sm-2 col-form-label text-right">NIM</label>
                <div class="col-sm-3">
                  <input type="text" name="nim" class="form-control" placeholder="Masukkan NIM Anda">
                </div>
                <div class="col-sm-1"></div>
            </div>

            <div class="form-group row justify-content-md-center">
              <label for="staticEmail" class="col-sm-2 col-form-label text-right">Nama</label>
                <div class="col-sm-3">
                  <input type="text" class="form-control" name="nama" placeholder="Masukkan Nama Anda">
                </div>
                <div class="col-sm-1"></div>
            </div>

            <div class="form-group row justify-content-md-center">
              <label class="col-sm-2 col-form-label text-right">Semester</label>
              <div class="col-sm-3">
                <select name="sem" class="form-control">
                  <option selected>Semester Anda</option>
                  <?php
                  $i=1;
                  for ($i=1; $i < 15; $i++) { 
                  ?>
                  <option value="<?php echo $i ?>"><?php echo $i ?></option>
                <?php } ?>
                </select>
              </div>
              <div class="col-sm-1"></div>
            </div>

            <div class="form-group row justify-content-md-center">
              <label class="col-sm-2 col-form-label text-right">Fakultas</label>
              <div class="col-sm-3">
                <select name="Fakultas" id="Fakultas" class="form-control">
                  <option value="">Fakultas Anda</option>
                  <?php
                  include "konek.php";
                              $q="SELECT * FROM Tb_Fakultas Order by Fakultas";
                              $r=$conn->query($q);
                              while ($rw=$r->fetch_assoc()) {  
                  ?>
                    <option value="<?php echo $rw['kode_fak'];?>"><?php echo $rw['Fakultas']; ?></option>
                  <?php
                  }
                  ?>
                </select>  
            </div>
            <div class="col-sm-1"></div>
          </div>

            <div class="form-group row justify-content-md-center">
              <label class="col-sm-2 col-form-label text-right">Jurusan</label>
              <div class="col-sm-3">
                <select name="Jurusan" id="Jurusan" class="form-control" >
                  <?php
                  include "konek.php";
                              $q="SELECT * FROM Tb_Jurusan Inner join Tb_Fakultas ON Tb_Jurusan.kode_fak = Tb_Fakultas.kode_fak Order By Jurusan";
                              $r=$conn->query($q);
                              while ($rw=$r->fetch_assoc()) {  
                  ?>
                    <option id='Jurusan' class="<?php echo $rw['kode_fak']; ?>" value="<?php echo $rw['Jurusan'];?>"><?php echo $rw['Jurusan']; ?></option>
                  <?php
                  }
                  ?>
                </select>
            </div>
             <div class="col-sm-1"></div>
          </div>

            <div class="form-group row justify-content-md-center">
              <label class="col-sm-2 col-form-label text-right"></label>
                <div class="col-sm-3">
                  <button class="btn btn-danger mb-2" type="reset">Bersihkan</button>
                  <button type="submit" class="btn btn-success mb-2 ">Tambah</button>
                </div>
                <div class="col-sm-1"></div>
            </div>
          
          </form>
        </section>
    </main>
  </div>
  <!-- footer -->
  <div class="card-footer text-muted">
  </div>
</div>
<div class="footer">
  © PyCode Dev 2018
</div>
<!-- <script type="text/javascript" src="JqueryC/jquery-1.10.2.min.js"></script> -->
<script type="text/javascript" src="JqueryC/jquery.chained.min.js"></script>
<script>
  $("#Jurusan").chained("#Fakultas");
</script>