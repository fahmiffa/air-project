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
            <div class="col-3">Nama Jenis Pembayaran *</div>
            <div class="col-9">
              <input type="text" class="form-control" placeholder="Nama Jenis Pembayaran" required="" name="payment_type_name" 
              value="<?php echo isset($edit_data['payment_type_name'])?$edit_data['payment_type_name']:'' ?>">
            </div>
          </div>
          <div class="form-group row">
            <div class="col-3">Keterangan  *</div>
            <div class="col-9">
              <input type="text" class="form-control" placeholder="Keterangan"  name="payment_type_desc" 
              value="<?php echo isset($edit_data['payment_type_desc'])?$edit_data['payment_type_desc']:'' ?>">
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