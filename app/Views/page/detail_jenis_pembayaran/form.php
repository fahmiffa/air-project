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
            <div class="col-3">Tahun Ajaran Periode *</div>
            <div class="col-9">
              <select name="period_id" id="periode_id" class="form-control" required>
                <option value="">Pilh Tahun </option>
                <?php foreach($period as $data_period): ?>
                  <option <?php echo isset($edit_data['period_id'])?($edit_data['period_id'] == $data_period['id'])?'selected':'':'' ?> value="<?php echo $data_period['id']?>"><?php echo $data_period['period_start']. " - "  . $data_period['period_end']?></option>
                <?php endforeach; ?>
              </select>
            </div>
          </div>
          <div class="form-group row">
            <div class="col-3">Jenis Pembayaran *</div>
            <div class="col-9">
              <select name="payment_type_id" id="periode_id" class="form-control" required>
                <option value="">Pilh Jenis Pembayaran </option>
                <?php foreach($type_payment as $data_type_payment): ?>
                  <option <?php echo isset($edit_data['payment_type_id'])?($edit_data['payment_type_id'] == $data_type_payment['id'])?'selected':'':'' ?> value="<?php echo $data_type_payment['id']?>"><?php echo $data_type_payment['payment_type_name']?></option>
                <?php endforeach; ?>
              </select>
            </div>
          </div>
          <div class="form-group row">
            <div class="col-3">Tipe *</div>
            <div class="col-9">
              <select name="detail_payment_type" id="detail_payment_type" class="form-control" required>
                <option value="">Pilih Tipe </option>
                <option <?php echo isset($edit_data['detail_payment_type'])?($edit_data['detail_payment_type'] == 'bulanan')?'selected':'':'' ?> value="bulanan">Bulanan</option>
                <option <?php echo isset($edit_data['detail_payment_type'])?($edit_data['detail_payment_type'] == 'bebas')?'selected':'':'' ?> value="bebas">Bebas</option>
              </select>
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