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
        <form action="<?php echo isset($action)?$action:'' ?>" method="post">
          <div class="form-group">
            <label for="">Tahun Ajaran</label>
            <div class="row">
              <div class="col-6">
                <input type="text" class="form-control datepicker" placeholder="Tahun Mulai" name="period_start" id="datepicker" required="" value="<?php echo isset($edit_data['period_start'])?$edit_data['period_start']:'' ?>">
              </div>
              <div class="col-6">
                <input type="text" class="form-control datepicker" placeholder="Tahun Selesai" name="period_end" required="" 
                value="<?php echo isset($edit_data['period_end'])?$edit_data['period_end']:'' ?>">
              </div>
            </div>
          </div>
          <div class="form-group row">
            <div class="col-3">
              <label for="">Status</label>
            </div>
            <div class="col-3">
              <input type="radio" name="period_status" value="0" <?php echo isset($edit_data['period_status'])?($edit_data['period_status'] == 0)?'checked':'':'' ?>> Tidak Aktif
              <br>
              <input type="radio" name="period_status" value="1" <?php echo isset($edit_data['period_status'])?($edit_data['period_status'] == 1)?'checked':'':'' ?>> Aktif
            </div>
          </div>
          <div class="form-group row">
            <div class="col-md-6">
              <input type="submit" class="btn btn-primary" value="Simpan">
              <input type="reset" class="btn btn-danger" value="Reset">
            </div>
          </div>
        </form>
      </div>
      <!-- /.card-body -->
    </div>
  </div>
</div>