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
          <div class="form-group row">
            <div class="col-2">Tipe Harga *</div>
            <div class="col-10">
              <input type="text" class="form-control" placeholder="Tipe Harga" required="" name="price_type" 
              value="<?php echo isset($edit_data['price_type'])?$edit_data['price_type']:'' ?>">
            </div>
          </div>
          <div class="form-group row">
            <div class="col-2">Harga Nilai *</div>
            <div class="col-10">
              <input type="text" class="form-control" placeholder="Harga Nilai" required="" name="price_value" 
              value="<?php echo isset($edit_data['price_value'])?$edit_data['price_value']:'' ?>">
            </div>
          </div>
          <div class="form-group row">
            <div class="col-2">Status </div>
            <div class="col-10">
              <input type="radio" name="price_status" value="1" <?php echo isset($edit_data['price_status'])?($edit_data['price_status'] == '1')?'checked':'':'' ?> > Aktif
              <input type="radio" name="price_status" value="0" <?php echo isset($edit_data['price_status'])?($edit_data['price_status'] == '0')?'checked':'':'' ?> > Tidak Aktif
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