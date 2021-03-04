<!-- Modal -->
<div class="modal fade" id="exampleModal<?php echo $value['id']?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel" style="color:black">Ubah Tarif :  <?php echo $value['payment_type_name'] ?></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body ">
        <form action="/admin/detail_jenis_pembayaran/store_payment_class/<?php echo $value['id'] ?>" method="post">
          <input type="hidden" name="spp_bill_id" value="<?php echo $value['id'] ?>">
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
              <input type="text" class="form-control" value="<?php echo $value['payment_type_name'] ?>" readonly>
            </div>
          </div>
          <div class="form-group row">
            <div class="col-2">
              <label for="" class="control-label">Kelas</label>
            </div>
            <div class="col-10">
              <select name="class_id" id="" class="form-control">
                <option value="">Pilih Kelas</option>
                <?php foreach ($kelas as $data_kelas): ?>
                  <option <?php echo ($value['class_id'] == $data_kelas['id'])?'selected':'' ?> value="<?php echo $data_kelas['id'] ?>"><?php echo $data_kelas['class_name'] ?></option>

                <?php endforeach ?>
              </select>
            </div>
          </div>
          <div class="form-group row">
            <div class="col-2">
              <label for="" class="control-label">Tarif Bulanan</label>
            </div>
            <div class="col-10">
              <input type="number" class="form-control" placeholder="Masukan tanpa titik :10000" name="jumlah" required="" value="<?php echo $value['jumlah'] ?>">
              <input type="hidden" name="detail_type_payment_id" value="<?php echo $edit_data['id'] ?>">
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
          <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
        </div>
      </form>
    </div>
  </div>
</div>