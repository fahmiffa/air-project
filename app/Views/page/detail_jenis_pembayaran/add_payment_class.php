<div class="row">
  <div class="col-12">
    <div class="card card-default">
      <div class="card-header">
        <h3 class="card-title">Pilih Kelas</h3>
        <div class="card-tools">
          <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
          <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-remove"></i></button>
        </div>
      </div>
      <!-- /.card-header -->
      <div class="card-body">
        <?php if (!empty(session()->getFlashData('warning'))): ?>
          <div class="alert alert-danger">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <strong>Upss!</strong> <?php echo session()->getFlashData('warning'); ?>
          </div>
        <?php endif ?>
        <form action="/admin/detail_jenis_pembayaran/store_payment_class/<?php echo $edit_data['id'] ?>" method="post">
          <div class="form-group row">
            <div class="col-2">
              <label for="" class="control-label">Jenis Bayar</label>
            </div>
            <div class="col-10">
              <input type="text" class="form-control" value="<?php echo $edit_data['detail_payment_type']. " - T.A " . $period['period_start'] ."/". $period['period_end'] ?>" readonly>
            </div>
          </div>
          <div class="form-group row">
            <div class="col-2">
              <label for="" class="control-label">Tahun Ajaran</label>
            </div>
            <div class="col-10">
              <input type="text" class="form-control" value="<?php echo $period['period_start'] ."/". $period['period_end'] ?>" readonly>
            </div>
          </div>
          <div class="form-group row">
            <div class="col-2">
              <label for="" class="control-label">Tipe Bayar</label>
            </div>
            <div class="col-10">
              <input type="text" class="form-control" value="<?php echo $type_payment['payment_type_name'] ?>" readonly>
            </div>
          </div>
          <div class="form-group row">
            <div class="col-2">
              <label for="" class="control-label">Kelas</label>
            </div>
            <div class="col-10">
              <select name="class_id" id="" class="form-control">
                <option value="">Pilih Kelas</option>
                <?php foreach ($kelas as $key => $value): ?>
                  <option value="<?php echo $value['id'] ?>"><?php echo $value['class_name'] ?></option>

                <?php endforeach ?>
              </select>
            </div>
          </div>
          <div class="form-group row">
            <div class="col-2">
              <label for="" class="control-label">Tarif Bulanan</label>
            </div>
            <div class="col-10">
              <input type="number" class="form-control" placeholder="Masukan tanpa titik :10000" name="jumlah" value="<?php echo old('jumlah') ?>">
            </div>
          </div>
          <div class="form-group row mt-5">
            <div class="col-md-6">
              <input type="submit" class="btn btn-primary" value="Simpan">
              <a href="<?php echo $_SERVER['HTTP_REFERER'] ?>" class="btn btn-danger">Kembali</a>
            </div>
          </div>
        </form>
      </div>
      <!-- /.card-body -->
      <div class="card-footer">
        <div class="text-info">
          *) Kolom Wajib diisi
        </div>
      </div>
    </div>
  </div>
</div>