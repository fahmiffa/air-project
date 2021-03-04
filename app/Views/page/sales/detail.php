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
          <div class="col-6">
            <div class="form-group row">
              <div class="col-3">
                <label for="">Nama Lengkap</label>
              </div>
              <div class="col-9">
                <?php echo $detail['students_fullname'] ?>
              </div>
            </div>
            <div class="form-group row">
              <div class="col-3">
                <label for="">Jenis Kelamin</label>
              </div>
              <div class="col-9">
                <?php echo ($detail['students_gender'] == 'l')?'<span class="badge badge-success">Laki-laki</span>':'<span class="badge badge-primary">Perempuan</span>' ?>

              </div>
            </div>
            <div class="form-group row">
              <div class="col-3">
                <label for="">Tempat Lahir</label>
              </div>
              <div class="col-9">
                <?php echo $detail['students_born_place'] ?>
              </div>
            </div>
            <div class="form-group row">
              <div class="col-3">
                <label for="">Tanggal Lahir</label>
              </div>
              <div class="col-9">
                <?php echo $detail['students_born_date'] ?>
              </div>
            </div>
            <div class="form-group row">
              <div class="col-3">
                <label for="">Telepon</label>
              </div>
              <div class="col-9">
                <?php echo $detail['students_phone'] ?>
              </div>
            </div>
            <div class="form-group row">
              <div class="col-3">
                <label for="">Email</label>
              </div>
              <div class="col-9">
                <?php echo $detail['students_email'] ?>
              </div>
            </div>
            <div class="form-group row">
              <div class="col-3">
                <label for="">Alamat</label>
              </div>
              <div class="col-9">
                <?php echo $detail['students_address'] ?>
              </div>
            </div>
          </div>
          <div class="col-6">
            <div class="form-group row">
              <div class="col-3">
                <label for="">Nama Ayah</label>
              </div>
              <div class="col-9">
                <?php echo $detail['students_name_of_father'] ?>
              </div>
            </div>
            <div class="form-group row">
              <div class="col-3">
                <label for="">Nama Ibu</label>
              </div>
              <div class="col-9">
                <?php echo $detail['students_name_of_mother'] ?>
              </div>
            </div>
            <div class="form-group row">
              <div class="col-3">
                <label for="">Telpon Orang Tua</label>
              </div>
              <div class="col-9">
                <?php echo $detail['students_parent_phone'] ?>
              </div>
            </div>
            <div class="form-group row">
              <div class="col-3">
                <label for="">Status</label>
              </div>
              <div class="col-9">
                <?php echo ($detail['students_status'] == 1)?'<span class="badge badge-success">Aktif</span>': '<span class="badge badge-warning">Tidak Aktif</span>' ?>
              </div>
            </div>
          </div>
        </div>      
      </div>
      <!-- /.card-body -->
    </div>
  </div>
</div>