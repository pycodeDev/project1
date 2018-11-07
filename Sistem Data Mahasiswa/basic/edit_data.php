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
    Edit Data
  </div>
  <!-- body -->
  <div class="card-body">
    <main>
     <!--  <input class="input-coba" id="tab1" type="radio" name="tabs">
        <label class="label-coba" for="tab1">Data</label> -->
      <input class="input-coba" id="tab2" type="radio" name="tabs" checked>
        <label class="label-coba" for="tab2">Edit</label>
       <!-- tab -->
        <section class="section-coba" id="content2">
           <?php
                $nim=$_GET['nim'];
            ?>
          <h4 class="text-center"><b>Form Edit Data Mahasiswa</b></h4>
          <form action="fungsi/edit.php" method="POST">
            <div class="form-group row justify-content-md-center">
              <label class="col-sm-2 col-form-label text-right">NIM</label>
                <div class="col-sm-3">
                  <?php
                    include "konek.php";
                    $q1="SELECT NIM from Tb_Mahasiswa where NIM='$nim' ";
                    $r=mysqli_query($conn,$q1);

                    $res1=mysqli_fetch_array($r,MYSQLI_ASSOC);
                  ?>
                  <input type="text" name="nim" class="form-control" value="<?php echo $res1['NIM'] ?>" readonly>
                </div>
                <div class="col-sm-1"></div>
            </div>

            <div class="form-group row justify-content-md-center">
              <label for="staticEmail" class="col-sm-2 col-form-label text-right">Nama</label>
                <div class="col-sm-3">
                  <?php
                    include "konek.php";
                    $q1="SELECT Nama from Tb_Mahasiswa where NIM='$nim' ";
                    $r=mysqli_query($conn,$q1);

                    $res1=mysqli_fetch_array($r,MYSQLI_ASSOC);
                  ?>
                  <input type="text" class="form-control" name="nama" value="<?php echo $res1['Nama'] ?>">
                </div>
                <div class="col-sm-1"></div>
            </div>

            <div class="form-group row justify-content-md-center">
              <label class="col-sm-2 col-form-label text-right">Semester</label>
              <div class="col-sm-3">
                <select name="sem" class="form-control">
                  <?php
                    include "konek.php";
                    $q1="SELECT Semester from Tb_Mahasiswa where NIM='$nim' ";
                    $r=mysqli_query($conn,$q1);

                    $res1=mysqli_fetch_array($r,MYSQLI_ASSOC);
                  ?>
                  <option selected>Semester Anda</option>
                  <?php
                  $i=1;
                  for ($i=1; $i < 15; $i++) { 
                    if ($i == $res1['Semester']) { ?>
                      <option value="<?php echo $res1['Semester'] ?>" selected><?php echo $res1['Semester'] ?></option>
                  <?php
                     }else{
                  ?>
                  <option value="<?php echo $i ?>"> <?php echo $i ?></option>
                <?php 
                    }
                  } 
                ?>
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
                  $awal="SELECT Fakultas FROM Tb_Mahasiswa where NIM='$nim' ";
                  $res=mysqli_query($conn,$awal);
                  $rr=mysqli_fetch_array($res,MYSQLI_ASSOC);

                              $q="SELECT * FROM Tb_Fakultas Order by Fakultas";
                              $r=$conn->query($q);
                              while ($rw=$r->fetch_assoc()) {  
                                if ($rw['Fakultas'] == $rr['Fakultas']) {?>
                                  <option value="<?php echo $rw['kode_fak'] ?>" selected><?php echo $rw['Fakultas'] ?></option>
                                <?php
                              }else{
                      ?>
                    <option value="<?php echo $rw['kode_fak'];?>"><?php echo $rw['Fakultas']; ?></option>
                  <?php
                                }
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
                  $awal="SELECT Jurusan FROM Tb_Mahasiswa where NIM='$nim' ";
                  $res=mysqli_query($conn,$awal);
                  $rr=mysqli_fetch_array($res,MYSQLI_ASSOC);
                              $q="SELECT * FROM Tb_Jurusan Inner join Tb_Fakultas ON Tb_Jurusan.kode_fak = Tb_Fakultas.kode_fak Order By Jurusan";
                              $r=$conn->query($q);
                              while ($rw=$r->fetch_assoc()) {  
                                if ($rw['Jurusan']  ==  $rr['Jurusan']) {?>
                            <option id='Jurusan' class="<?php echo $rw['kode_fak']; ?>" value="<?php echo $rw['Jurusan'];?>" selected><?php echo $rw['Jurusan']; ?></option>            
                  <?php              }else{
                  ?>
                    <option id='Jurusan' class="<?php echo $rw['kode_fak']; ?>" value="<?php echo $rw['Jurusan'];?>"><?php echo $rw['Jurusan']; ?></option>
                  <?php
                    }
                  }
                  ?>
                </select>
            </div>
             <div class="col-sm-1"></div>
          </div>

            <div class="form-group row justify-content-md-center">
              <label class="col-sm-2 col-form-label text-right"></label>
                <div class="col-sm-3">
                  <a class="btn btn-warning mb-2" style="color: white;" href="home.php">Kembali</a>
                  <button class="btn btn-danger mb-2" type="reset">Bersihkan</button>
                  <button type="submit" class="btn btn-success mb-2 ">Ubah</button>
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