<div class="row">
  <div class="col-12">
    <div class="card card-default">
      <div class="card-header">
        <h3 class="card-title"><?php echo isset($title)?$title:'' ?></h3>

        <div class="card-tools">
          <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
          <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-remove"></i></button>
        </div>
      </div>
      <!-- /.card-header -->
      <div class="card-body">
        <div class="row">
          <div class="col-12">
            <h5>Petunjuk Singkat</h5>
            <p>Penginputan data Siswa bisa dilakukan dengan mengupload data dari file Ms. Excel. Format file excel harus sesuai kebutuhan aplikasi. Silahkan download formatnya <a href="" class="badge badge-success">Disini</a></p>
            <form method="post" enctype="multipart/form-data" action="">
              <b>Silahkan Upload Disini</b>
              <br>
              <div class="form-group mt-3">
                <input type="file" name="file"> 
              </div>
              <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Upload File">
                <a href="/admin/siswa" class="btn btn-danger">Batal</a>
              </div>
            </form>
          </div>
        </div>      
      </div>
      <!-- /.card-body -->
    </div>
  </div>
</div>