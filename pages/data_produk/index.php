<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
  <?php session_start() ?>
  <?php
  if (empty($_SESSION["username"])) {
   # code...
   header("Location:../login/index.php?pesan=invalid");
  }
 ?>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Starter</title>
  <!-- summernote -->
  <link rel="stylesheet" href="../../plugins/summernote/summernote-bs4.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
  <!-- daterange picker -->
  <link rel="stylesheet" href="../../plugins/daterangepicker/daterangepicker.css">
  <!-- iCheck for checkboxes and radio inputs -->
  <link rel="stylesheet" href="../../plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Bootstrap Color Picker -->
  <link rel="stylesheet" href="../../plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="../../plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- Select2 -->
  <link rel="stylesheet" href="../../plugins/select2/css/select2.min.css">
  <link rel="stylesheet" href="../../plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
  <!-- Bootstrap4 Duallistbox -->
  <link rel="stylesheet" href="../../plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css">
  <!-- BS Stepper -->
  <link rel="stylesheet" href="../../plugins/bs-stepper/css/bs-stepper.min.css">
  <!-- dropzonejs -->
  <link rel="stylesheet" href="../../plugins/dropzone/min/dropzone.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
   <!-- Toastr -->
   <link rel="stylesheet" href="../../plugins/toastr/toastr.min.css">
</head>
<body class="hold-transition sidebar-mini">
  <div class="wrapper">
    <?php include '../../asset/navbar.php' ?>
    <?php include '../../asset/koneksi.php' ?>
    <!-- Main Sidebar Container -->
    <aside class="main-sidebar main-sidebar-custom sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="index3.html" class="brand-link">
      <span class="brand-text font-weight-light"> <center><img src="../../logo_white.png" alt="AdminLTE Logo" width="150"></span> </center>
      </a>
      <?php include '../../asset/sidebar.php' ?>
    </aside>
    
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0"><i class="fas fa-box-open"></i> Management Produk</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Starter Page</li>
              </ol>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->

      <!-- Main content -->
      <div class="content">
        <div class="container-fluid">
        <div class="card card-primary card-outline">
              <div class="card-header">
              <div class="btn-group">
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-default"><i class="fas fa-plus"></i>  Tambah Data </button>
                        <a href="action/cetak.php"><button type="button" class="btn btn-default"><i class="far fa-file-pdf"></i> Exsport Data</button></a>
                        
                      </div>
                <div class="card-tools">
                  <div class="input-group input-group-sm" style="width: 150px;">
                    <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                    <div class="input-group-append">
                      <button type="submit" class="btn btn-default">
                        <i class="fas fa-search"></i>
                      </button>
                    </div>
                  </div>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0" style="height: 500px;">
                <table class="table table-head-fixed text-nowrap">
                  <thead>
                    <tr>
                      <th style="width: 10px">#</th>
                      <th>ID</th>
                      <th>Jenis Produk</th>
                      <th>Harga Produk <span class="badge bg-primary">Rp</span></th>
                      <th>Kategori Produk</th>
                      <th>Status Barang</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $no=0;
                    $query = "SELECT * FROM tbl_produk ";
                    $result = mysqli_query($koneksi, $query);
                    while($data = mysqli_fetch_assoc($result)){ $no++;
                    $id_produk = $data['id_produk'];
                    echo'
                    <tr data-widget="expandable-table" aria-expanded="false">
                      <td><div class="btn-group ">
                      <button type="button" class="btn btn-default btn-sm btn-flat" data-toggle="modal" data-target="#modal-edit'.$id_produk.'"> Edit </button>
                      <a href="action/act_delete_produk.php?id_produk='.$data['id_produk'].'"><button type="button" class="btn btn-default btn-sm btn-flat" ><i class="far fa-trash-alt"></i></button></a>
                     
                      </div></td>
                      <td>'.$data['id_produk'].'</td>
                      <td>'.$data['jenis_produk'].'</td>
                      <td>'.$data['harga_produk'].'</td>';
                      $id_kategori= $data['id_kategori'];
                      $nomor=0;
                      $query3 = "SELECT * FROM tbl_kategori where id_kategori='$id_kategori'";
                      $result2 = mysqli_query($koneksi, $query3);
                      while($myrow = mysqli_fetch_assoc($result2)){
                      $nomor++;
                      $kategori = $myrow['jenis_kategori'];
                    }
                    echo'
                    <td>'.$kategori.'</td>
                      <td>';
                      if($data['status']=="1"){
                        echo' <center><span class="badge rounded-pill bg-success">
                        Tersedia</span></center></td>';
                      }else{
                        echo'<center><span class="badge rounded-pill bg-danger">
                        Belum Tersedia</span></center></td>';
                      }
                    echo'  
                    </tr>
                    <tr class="expandable-body">
                    <div class="card-body table-responsive p-0">
                      <td colspan="6" class="col-1">
                        
                        <div class="card card-primary card-outline">
                          <div class="card-header">
                            <h3 class="card-title"><b>Rincian Produk</b></h3>
                          </div>
                          <!-- /.card-header -->
                          <div class="card-body p-0">
                            <table class="table table-sm">
                              <thead>
                                <tr>
                                  <th style="width: 10px">#</th>
                                  <th style="width: 100px">ID Supplier</th>
                                  <th style="width: 200px">Nama Supplier</th>
                                  
                                  <th>Stok Produk <span class="badge bg-warning">Pcs</span></th>
                                  <th style="width: 100px">Foto</th>
                                  <th></th>
                                </tr>
                              </thead>
                              <tbody>';
                                $id_supplier= $data['id_supplier'];
                                $nomor=0;
                                $query2 = "SELECT * FROM tbl_supplier where id_supplier='$id_supplier'";
                                $result1 = mysqli_query($koneksi, $query2);
                                while($row = mysqli_fetch_assoc($result1)){
                                $nomor++;
                                $supplier = $row['nama_supplier'];
                              }
                              echo'
                              <tr>
                                <td>'.$nomor.'. </td>
                                <td>'.$id_supplier.'</td>
                                <td>'.$supplier.'</td>
                                <td>'.$data['stok_produk'].'</td>';

                               echo'
                              <td>
                                <button type="button" class="btn btn-default" data-toggle="modal" data-target="#a'.$id_produk.'">
                                 Gambar
                               </button>
                             </td>
                             <td style="width: 100px"></td>
                           </tr>
                           <tr class="expandable-body">
                           <td colspan="6" class="col-1">
                           <br>
                           <b>Keterangan Produk :</b><br>
                          <textarea class="form-control " readonly> '.$data['deskripsi'].' </textarea>
                           </td>
                           </tr>
                         </tbody>
                       </table>
                     
                     </div>
                     <!-- /.card-body -->
                   </div>
                   
                 </tbody>
               </td>
               
             </div>
           </tr>';
         } ?>
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>

</div><!-- /.container-fluid -->
</div>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->
<div class="modal fade" id="modal-default">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Input Data Produk Baru</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="card card-default">
          <div class="card-header">
            <h3 class="card-title"> Form Untuk Menginput data Produk Baru</h3>

            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
              </button>
              
            </div>
          </div>
          <!-- kode Otomatis -->
          <?php
          // mengambil data barang dengan kode paling besar
          $query = mysqli_query($koneksi, "SELECT max(id_produk) as kodeTerbesar FROM tbl_produk");
          $data = mysqli_fetch_array($query);
          $kodeBarang = $data['kodeTerbesar'];
          
          // mengambil angka dari kode barang terbesar, menggunakan fungsi substr
          // dan diubah ke integer dengan (int)
          $urutan = (int) substr($kodeBarang, 3, 3);
          
          // bilangan yang diambil ini ditambah 1 untuk menentukan nomor urut berikutnya
          $urutan++;
          
          // membentuk kode barang baru
          // perintah sprintf("%03s", $urutan); berguna untuk membuat string menjadi 3 karakter
          // misalnya perintah sprintf("%03s", 15); maka akan menghasilkan '015'
          // angka yang diambil tadi digabungkan dengan kode huruf yang kita inginkan, misalnya BRG 
          $huruf = "62";
          $kodeBarang = $huruf . sprintf("%03s", $urutan);
          ?>
          <!-- /.card-header -->
          <div class="card-body">
            <div class="row">
              
              <div class="col-md-6">
                <form action="action/act_input_produk.php" method="post" enctype="multipart/form-data">
                  <div class="form-group">
                    <label> Jenis Produk </label>
                    <input type="text"class="form-control" name="nama_produk" required>
                  </div>
                  <input type="text"class="form-control" name="id_produk"  hidden value="<?php echo $kodeBarang ?>">
                  <div class="form-group">
                    <label>Supplier</label>
                    <select class="form-control select2 select2-hidden-accessible" style="width: 100%;"   data-select2-id="9" tabindex="-1" aria-hidden="true" name="supplier">
                      
                      <?php
                      $query = "SELECT * FROM tbl_supplier";
                      $result = mysqli_query($koneksi, $query);
                      while($data = mysqli_fetch_array($result)){
                      echo'<option value="'.$data['id_supplier'].'"> '.$data['nama_supplier'].'</option>';
                    }
                    
                    ?>
                  </select>
                </div>
                <!-- /.form-group -->
          
            <div class="card  ">
              <div class="card-header p-0 pt-1 border-bottom-0">
                <ul class="nav nav-tabs" id="custom-tabs-three-tab" role="tablist">
                  <li class="nav-item">
                    <a class="nav-link active" id="custom-tabs-three-home-tab" data-toggle="pill" href="#custom-tabs-three-home" role="tab" aria-controls="custom-tabs-three-home" aria-selected="true">Strok</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="custom-tabs-three-profile-tab" data-toggle="pill" href="#custom-tabs-three-profile" role="tab" aria-controls="custom-tabs-three-profile" aria-selected="false">Status</a>
                  </li>
             
                </ul>
              </div>
              <div class="card-body">
                <div class="tab-content" id="custom-tabs-three-tabContent">
                  <div class="tab-pane fade show active" id="custom-tabs-three-home" role="tabpanel" aria-labelledby="custom-tabs-three-home-tab">
                  <div class="form-group">
                  <label> Jumlah Stok </label>
                  <input type="number"class="form-control" name="stok" required value="0">
                </div>     
                </div>
                  <div class="tab-pane fade" id="custom-tabs-three-profile" role="tabpanel" aria-labelledby="custom-tabs-three-profile-tab">
                  <div class="form-group">
                  <label>Status Ketersediaan</label>
                  <select class="form-control" name="status">
                    <option value="1"> Tersedia </option>
                    <option value="0"> Belum Tersedia </option>
                  </select>
                </div>
                </div>
                 
                </div>
              </div>
              <!-- /.card -->
                  </div>
               
              </div>
              <!-- /.col -->
              <div class="col-md-6">
                <div class="form-group">
                  <label> Harga Produk (Rp.) </label>
                  <input type="number"class="form-control" name="harga" required>
                </div>
                <div class="form-group">
                  <label>Kategori</label>
                  <select class="form-control select2 select2-hidden-accessible" style="width: 100%;"   data-select2-id="2" tabindex="-1" aria-hidden="true" name="kategori">
                    <option selected> ------ Pilih Kategori ------ </option>
                    <?php
                    $query = "SELECT * FROM tbl_kategori";
                    $result = mysqli_query($koneksi, $query);
                    while($data = mysqli_fetch_array($result)){
                    echo'<option value="'.$data['id_kategori'].'"> '.$data['jenis_kategori'].'</option>';
                  }
                  
                  ?>
                </select>
              </div>
              <!-- /.form-group -->
              <div class="form-group">
                <label> Upload Foto Produk </label><br>
                <div class="custom-file">
                      <input type="file" class="form-control custom-file-input" id="customFile" name="foto">
                      <label class="custom-file-label" for="customFile">Choose file</label>
                    </div>    
            
              </div>
              
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->
          <label> Deskripsi Produk </label>
          <textarea  class="form-control" name="deskripsi" rows="10"></textarea>
          
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
            <!-- Visit <a href="https://select2.github.io/">Select2 documentation</a> for more examples and information about
              the plugin.-->
            </div>
          </div>

        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save changes</button>
        </form>
      </div>
      
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<?php
$query1 = "SELECT * from tbl_produk INNER JOIN tbl_supplier ON tbl_produk.id_supplier = tbl_supplier.id_supplier INNER JOIN tbl_kategori ON tbl_produk.id_kategori = tbl_kategori.id_kategori";
$result1 = mysqli_query($koneksi, $query1);
while($data1 = mysqli_fetch_assoc($result1)){
  
?>
<!-- /.modal -->
<div class="modal fade" id="modal-edit<?php echo $data1['id_produk'] ?>">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Edit Data Produk</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="card card-default">
          <div class="card-header">
            <h3 class="card-title"> Form Untuk Menginput data Produk Baru</h3>

            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
              </button>
              
            </div>
          </div>
          <div class="card-body">
            <div class="row">
              
              <div class="col-md-6">
                <form action="action/act_update_produk.php" method="post" enctype="multipart/form-data">
                  <div class="form-group">
                    <label> Jenis Produk </label>
                    <input type="text"class="form-control" name="nama_produk" value="<?php echo $data1['jenis_produk'] ?>">
                  </div>
                  <input type="text"class="form-control" name="id_produk"  hidden value="<?php echo $data1['id_produk'] ?>">
                  <div class="form-group">
                    <label>Supplier</label>
                    <select class="form-control select2bs4 select2-hidden-accessible" style="width: 100%;"   data-select2-id="17" tabindex="-1" aria-hidden="true" name="supplier">
                      <option value="<?php echo $data1['id_supplier'] ?>" selected> <?php echo $data1['nama_supplier'] ?></option>
                      <?php
                      $query = "SELECT * FROM tbl_supplier";
                      $result = mysqli_query($koneksi, $query);
                      while($data = mysqli_fetch_array($result)){
                      echo'<option value="'.$data['id_supplier'].'"> '.$data['nama_supplier'].'</option>';
                    }
                    
                    ?>
                  </select>
                </div>
               <div class="form-group ">
                 <label>Stok</label>
                 <input type="text" class="form-control" name="stok" value="<?= $data1['stok_produk'] ?>">
                  </div>
                  <div class="form-group ">
                 <label>Status Ketersediaan</label>
                 <select name="status" class="form-control">
                   <?php
                   if($data1['status']=="1"){
                     echo'
                    <option selected>Tersedia </option>'; 
                   }else{
                     echo'
                    <option selected>Belum Tersedia </option>'; 
                   }
                   ?>     
                   <option value="1"> Tersedia</option>
                   <option value="2"> Belum terserdia </option>
                  </select>
                  </div>
                  </div>
               
              <!-- /.col -->
              <div class="col-md-6">
                <div class="form-group">
                  <label> Harga Produk (Rp.) </label>
                  <input type="number"class="form-control" name="harga" value="<?php echo $data1['harga_produk'] ?>">
                </div>
                <div class="form-group">
                  <label>Kategori</label>
                  <select class="form-control select2bs4 select2-hidden-accessible" style="width: 100%;"   data-select2-id="21" tabindex="-1" aria-hidden="true" name="kategori">
                    <option selected value="<?php echo $data1['id_kategori'] ?>"><?php echo $data1['jenis_kategori'] ?></option>
                    <?php
                    $query = "SELECT * FROM tbl_kategori";
                    $result = mysqli_query($koneksi, $query);
                    while($data = mysqli_fetch_array($result)){
                    echo'<option value="'.$data['id_kategori'].'"> '.$data['jenis_kategori'].'</option>';
                  }
                  
                  ?>
                </select>
              </div>
              <!-- /.form-group -->
              <div class="form-group">
                <label> Upload Foto Produk </label><br>
                <div class="custom-file">
                      <input type="file" class="form-control custom-file-input" id="customFile" name="foto">
                      <label class="custom-file-label" for="customFile">Choose file</label>
                    </div>    
            
              </div>
              
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->
          <label> Deskripsi Produk </label>
          <textarea  class="form-control" name="deskripsi" rows="10"><?php echo $data1['deskripsi'] ?></textarea>
          
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
            <!-- Visit <a href="https://select2.github.io/">Select2 documentation</a> for more examples and information about
              the plugin.-->
            </div>
          </div>

        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save changes</button>
        </form>
        
      </div>
    </div>
    
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<?php } ?>
<!-- /.modal -->
<!-- modal gambar -->
<!-- Modal -->
<?php
$query = "SELECT * FROM tbl_produk ";
$result = mysqli_query($koneksi, $query);
while($data = mysqli_fetch_assoc($result)){
?>
<div class="modal fade" id="a<?php echo $data['id_produk'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Preview </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       
        <center><img alt="gambar" src="upload/<?php echo $data['gambar'] ?>" width="450"></center>
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<?php  }?>
<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
  <!-- Control sidebar content goes here -->
  <div class="p-3">
    <h5>Title</h5>
    <p>Sidebar content</p>
  </div>
</aside>
<!-- /.control-sidebar -->

<!-- Main Footer -->
<footer class="main-footer">
  <!-- To the right -->
  <div class="float-right d-none d-sm-inline">
    Anything you want
  </div>
  <!-- Default to the left -->
  <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
</footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->
<!-- jQuery -->
<!-- Summernote -->
<script src="../../plugins/summernote/summernote-bs4.min.js"></script>
<script src="../../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- Select2 -->
<script src="../../plugins/select2/js/select2.full.min.js"></script>
<!-- InputMask -->
<script src="../../plugins/moment/moment.min.js"></script>
<script src="../../plugins/inputmask/jquery.inputmask.min.js"></script>
<!-- date-range-picker -->
<script src="../../plugins/daterangepicker/daterangepicker.js"></script>
<!-- bootstrap color picker -->
<script src="../../plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="../../plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Bootstrap Switch -->
<script src="../../../plugins/bootstrap-switch/js/bootstrap-switch.min.js"></script>
<!-- BS-Stepper -->
<script src="../../plugins/bs-stepper/js/bs-stepper.min.js"></script>
<!-- dropzonejs -->
<script src="../../plugins/dropzone/min/dropzone.min.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>

<script src="../../plugins/toastr/toastr.min.js"></script>
<?php include '../../asset/alert.php' ?>
<!-- bs-custom-file-input -->
<script src="../../plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
<script>
$(function () {
  bsCustomFileInput.init();
});
</script>
<script>
  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()

    //Initialize Select2 Elements
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    })
    

    //Datemask dd/mm/yyyy
    $('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })
    //Datemask2 mm/dd/yyyy
    $('#datemask2').inputmask('mm/dd/yyyy', { 'placeholder': 'mm/dd/yyyy' })
    //Money Euro
    $('[data-mask]').inputmask()

    //Date picker
    $('#reservationdate').datetimepicker({
      format: 'L'
    });

    //Date and time picker
    $('#reservationdatetime').datetimepicker({ icons: { time: 'far fa-clock' } });

    //Date range picker
    $('#reservation').daterangepicker()
    //Date range picker with time picker
    $('#reservationtime').daterangepicker({
      timePicker: true,
      timePickerIncrement: 30,
      locale: {
        format: 'MM/DD/YYYY hh:mm A'
      }
    })
    //Date range as a button
    $('#daterange-btn').daterangepicker(
    {
      ranges   : {
        'Today'       : [moment(), moment()],
        'Yesterday'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
        'Last 7 Days' : [moment().subtract(6, 'days'), moment()],
        'Last 30 Days': [moment().subtract(29, 'days'), moment()],
        'This Month'  : [moment().startOf('month'), moment().endOf('month')],
        'Last Month'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
      },
      startDate: moment().subtract(29, 'days'),
      endDate  : moment()
    },
    function (start, end) {
      $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
    }
    )

    //Timepicker
    $('#timepicker').datetimepicker({
      format: 'LT'
    })

    //Bootstrap Duallistbox
    $('.duallistbox').bootstrapDualListbox()

    //Colorpicker
    $('.my-colorpicker1').colorpicker()
    //color picker with addon
    $('.my-colorpicker2').colorpicker()

    $('.my-colorpicker2').on('colorpickerChange', function(event) {
      $('.my-colorpicker2 .fa-square').css('color', event.color.toString());
    })

    $("input[data-bootstrap-switch]").each(function(){
      $(this).bootstrapSwitch('state', $(this).prop('checked'));
    })

  })
  // BS-Stepper Init
  document.addEventListener('DOMContentLoaded', function () {
    window.stepper = new Stepper(document.querySelector('.bs-stepper'))
  })

  // DropzoneJS Demo Code Start
  Dropzone.autoDiscover = false

  // Get the template HTML and remove it from the doumenthe template HTML and remove it from the doument
  var previewNode = document.querySelector("#template")
  previewNode.id = ""
  var previewTemplate = previewNode.parentNode.innerHTML
  previewNode.parentNode.removeChild(previewNode)

  var myDropzone = new Dropzone(document.body, { // Make the whole body a dropzone
    url: "/target-url", // Set the url
    thumbnailWidth: 80,
    thumbnailHeight: 80,
    parallelUploads: 20,
    previewTemplate: previewTemplate,
    autoQueue: false, // Make sure the files aren't queued until manually added
    previewsContainer: "#previews", // Define the container to display the previews
    clickable: ".fileinput-button" // Define the element that should be used as click trigger to select files.
  })

  myDropzone.on("addedfile", function(file) {
    // Hookup the start button
    file.previewElement.querySelector(".start").onclick = function() { myDropzone.enqueueFile(file) }
  })

  // Update the total progress bar
  myDropzone.on("totaluploadprogress", function(progress) {
    document.querySelector("#total-progress .progress-bar").style.width = progress + "%"
  })

  myDropzone.on("sending", function(file) {
    // Show the total progress bar when upload starts
    document.querySelector("#total-progress").style.opacity = "1"
    // And disable the start button
    file.previewElement.querySelector(".start").setAttribute("disabled", "disabled")
  })

  // Hide the total progress bar when nothing's uploading anymore
  myDropzone.on("queuecomplete", function(progress) {
    document.querySelector("#total-progress").style.opacity = "0"
  })

  // Setup the buttons for all transfers
  // The "add files" button doesn't need to be setup because the config
  // `clickable` has already been specified.
  document.querySelector("#actions .start").onclick = function() {
    myDropzone.enqueueFiles(myDropzone.getFilesWithStatus(Dropzone.ADDED))
  }
  document.querySelector("#actions .cancel").onclick = function() {
    myDropzone.removeAllFiles(true)
  }
  // DropzoneJS Demo Code End
</script>
<script>
function myFunction() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[0];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }       
  }
}
</script>

</body>
</html>
