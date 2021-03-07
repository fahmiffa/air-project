<div class="row">
  <div class="col-12">
    <div class="card card-default">
      <div class="card-header">
        <h3 class="card-title"><?php echo isset($title) ? $title : '' ?></h3>

        <div class="card-tools">
          <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
          <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-remove"></i></button>
        </div>
      </div>
      <!-- /.card-header -->
      <div class="card-body">
        <form action="<?php echo isset($action) ? $action : '' ?>" method="post">
          <div class="form-group row">
            <div class="col-2">
              <label for="">Jenis Pelanggan *</label>
            </div>
            <div class="col-10">
              <select name="jenis_id" id="" class="form-control select2">
                <option value="">Pilih Jenis</option>
                <?php foreach ($price as $key => $value) : ?>
                  <option value="<?php echo $value['id'] ?>" <?php echo isset($edit_data['jenis_id']) ? ($edit_data['jenis_id'] == $value['id']) ? 'selected' : '' : '' ?>><?php echo $value['jenis_customer']; ?></option>
                <?php endforeach ?>
              </select>
            </div>
          </div>
          <div class="form-group row">
            <div class="col-2">
              <label for="">Nama Pelanggan *</label>
            </div>
            <div class="col-10">
              <input type="text" class="form-control" placeholder="Nama Pelanggan" required="" name="customer_name" value="<?php echo isset($edit_data['customer_name']) ? $edit_data['customer_name'] : '' ?>">
            </div>
          </div>
          <div class="form-group row">
            <div class="col-2">
              <label for="">Kontak </label>
            </div>
            <div class="col-5">
              <input type="number" class="form-control" placeholder="Telepon" name="customer_telphone" value="<?php echo isset($edit_data['customer_telphone']) ? $edit_data['customer_telphone'] : '' ?>">
            </div>
            <div class="col-5">
              <input type="number" class="form-control" placeholder="No Handphone" name="customer_hp" value="<?php echo isset($edit_data['customer_hp']) ? $edit_data['customer_hp'] : '' ?>">
            </div>
          </div>
          <div class="form-group row">
            <div class="col-2">
              <label for="">PIC </label>
            </div>
            <div class="col-10">
              <input type="text" class="form-control" placeholder="PIC" name="customer_pic" value="<?php echo isset($edit_data['customer_pic']) ? $edit_data['customer_pic'] : '' ?>">
            </div>
          </div>
          <div class="form-group row">
            <div class="col-2">
              <label for="">No Polisi </label>
            </div>
            <div class="col-10">
              <input type="text" class="form-control" placeholder="Nomor Polisi" name="customer_nopol" value="<?php echo isset($edit_data['customer_nopol']) ? $edit_data['customer_nopol'] : '' ?>">
            </div>
          </div>

          <div class="form-group row">
            <div class="col-2">
              <label for="">Alamat </label>
            </div>
            <div class="col-10">
              <textarea name="customer_address" class="form-control" id="" cols="30" rows="10"><?php echo isset($edit_data['customer_address']) ? $edit_data['customer_address'] : '' ?></textarea>
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


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Level</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="<?php echo base_url('ajax/store_level') ?>" id="form" method="post">
        <div class="modal-body">
          <div class="form-group">
            <label for="">Nama Level</label>
            <input type="text" class="form-control" placeholder="Nama Level" required="">
          </div>

          <div class="form-group">
            <label for="">Status Level</label>
            <br>
            <input type="radio" name="level_status" value="1">Aktif
            <br>
            <input type="radio" name="level_status" value="0">Tidak Aktif
          </div>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button id="submit" type="button" class="btn btn-primary">Save changes</button>
        </div>
      </form>
    </div>
  </div>
</div>