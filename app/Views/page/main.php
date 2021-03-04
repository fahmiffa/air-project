<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?php echo isset($title)?$title:'' ?></title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url() ?>/assets/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="<?php echo base_url() ?>/assets/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="<?php echo base_url() ?>/assets/css/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="<?php echo base_url() ?>/assets/css/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url() ?>/assets/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="<?php echo base_url() ?>/assets/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link href="<?php echo base_url() ?>/assets/css/bootstrap-datepicker.css" rel="stylesheet"/>

  <!-- data tables -->
  <link href="<?php echo base_url() ?>/assets/css/dataTables.bootstrap4.min.css" rel="stylesheet"/>

  <!-- jQuery -->
  <script src="<?php echo base_url() ?>/assets/js/jquery.min.js"></script>
  <!-- jQuery UI 1.11.4 -->
  <script src="<?php echo base_url() ?>/assets/js/jquery-ui.min.js"></script>

  <style>
    .btn-group-xs > .btn, .btn-xs {
      padding: .25rem .4rem;
      font-size: .875rem;
      line-height: .5;
      border-radius: .2rem;
    }

    label {
      font-size:13px;
    }

    .geser-radio {
      margin-left: 17px;
    }

    .card-body ul {
      margin-bottom: 0;
    }
  </style>
</head>
<body class="hold-transition sidebar-mini layout-fixed">
  <div class="wrapper">


    <!-- Navbar -->
    <?php include('inc/navbar.php') ?>
    <!-- /.navbar -->

    <!-- sidebar -->
    <?php include('inc/sidebar.php') ?>
    <!-- ./sidebar -->

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0"><?php echo isset($title)?$title:'' ?></h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Dashboard v1</li>
              </ol>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->

      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
          <!-- alert -->
          <?php if (!empty(session()->getFlashData('notif'))): ?>
          <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <strong>Berhasil!!</strong> <?php echo session()->getFlashData('notif') ?>
          </div>
        <?php endif ?>
        <!-- Main row -->
        <div class="main-content">
          <?php echo view($main); ?>
        </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 3.1.0-rc
    </div>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->


<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="<?php echo base_url() ?>/assets/js/bootstrap.bundle.min.js"></script>
<!-- jQuery Knob Chart -->
<script src="<?php echo base_url() ?>/assets/js/jquery.knob.min.js"></script>
<!-- overlayScrollbars -->
<script src="<?php echo base_url() ?>/assets/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url() ?>/assets/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url() ?>/assets/js/demo.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="<?php echo base_url() ?>/assets/js/dashboard.js"></script>
<!-- datepicker -->
<script src="<?php echo base_url() ?>/assets/js/bootstrap-datepicker.js"></script>

<script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script src="<?php echo base_url() ?>/assets/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url() ?>/assets/js/dataTables.bootstrap4.min.js"></script>

<script src="<?php echo base_url() ?>assets/js/app.js"></script>
<script>

  $('.tableData').DataTable();
  $(".datepicker").datepicker({
    format: "yyyy",
    viewMode: "years", 
    minViewMode: "years",
    autoclose: true,
  });


  $('#submit').click(function(event) {

    var form= $('#form'), formUrl = form.attr('action'), 
    level_name = form.find('input[type="text"]').val(),
    level_status = form.find('input[type="radio"]').val();


    if (form.find('input[type="text"]').val()  == "") {
      showAlert("warning","Upss!!","Nama Level tidak boleh kosong");
      return false;
    }



    $.ajax({
      url: formUrl,
      type: 'POST',
      dataType: 'json',
      data: {
        "level_name" : level_name,
        "level_status": level_status,
      },
      success:function(data){
        if (data.success == true) {
         showAlert("success","Yeay!!","Berhasil ditambah");
         clearAll();
         $('#exampleModal').modal('hide');
       }
     }
   });

  });



function clearAll(){
  $('#form').find("input").val("");
  $('#form').find("input[type='radio']").prop('checked',false)
}
function  showAlert(icon, title, text){
  Swal.fire({
    icon: icon,
    title: title,
    text: text
  });
}
</script>

</body>
</html>
