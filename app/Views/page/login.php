<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Login Panel | Sistem Informasi Pembayaran</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url() ?>/assets/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="<?php echo base_url() ?>/assets/css/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url() ?>/assets/css/adminlte.min.css">
</head>
<body class="hold-transition login-page">
  <div class="login-box">
    <div class="login-logo">
      <a href="#"><b>Air Bersih</b></a>
    </div>
    <!-- /.login-logo -->
    <div class="card">
      <div class="card-body login-card-body">
        <p class="login-box-msg">Sign in to start your session</p>

        <form action="" method="post">
          <div class="input-group mb-3">
            <input id="username" type="text" class="form-control" placeholder="Username" name="username" required="">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-envelope"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <input id="password" type="password" class="form-control" placeholder="Password" name="password" required="">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-8">
              <div class="icheck-primary">
                <input type="checkbox" id="remember">
                <label for="remember">
                  Remember Me
                </label>
              </div>
            </div>
            <!-- /.col -->
            <div class="col-4">
              <button type="button" class="btn btn-primary btn-block" id="submit">Sign In</button>
            </div>
            <!-- /.col -->
          </div>
        </form>

        <p class="mb-1">
          <a href="forgot-password.html">I forgot my password</a>
        </p>
      </div>
      <!-- /.login-card-body -->
    </div>
  </div>
  <!-- /.login-box -->

  <!-- jQuery -->
  <script src="<?php echo base_url() ?>/assets/js/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="<?php echo base_url() ?>/assets/js/bootstrap.bundle.min.js"></script>
  <!-- AdminLTE App -->
  <script src="<?php echo base_url() ?>/assets/js/adminlte.min.js"></script>
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
  <script>
    $('#submit').click(function(event) {
      var form = $('form'), 
      username = form.find('#username').val()
      password = form.find('#password').val()
      if (username  == "") {
        showAlert("error","Opps","Username tidak boleh kosong");
        $("#username").focus();
        return false;
      }

      if (password  == "") {
        showAlert("warning","Opps","password tidak boleh kosong");
        $("#password").focus();
        return false;
      }

      $.ajax({
        url: '<?php echo base_url() ?>/logincontroller/login_action',
        type: 'POST',
        dataType: 'json',
        data: {
          "username": username,
          "password": password,
        },
        success:function(data){
          if (data.success == true) {
            swal.fire({
              icon:"success",
              title: "Login Berhasil!!",
              text: "Anda akan diarahkan dalam 3 detik",
              time: 3000,
            })
            .then(function(){
              window.location.href = "<?php echo base_url()?>/dashboardcontroller";
            });
          }else{
            swal.fire({
              icon:"error",
              title: "Login Gagal!!",
              text: "Mohon periksa kembali username dan password anda",
            });
          }
        }
      });

    });


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
