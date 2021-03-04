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
            <div class="col-2">
              <label for="">Nama Lengkap *</label>
            </div>
            <div class="col-10">
              <input type="text" class="form-control" placeholder="Nama Lengkap" required="" name="fullname"
              value="<?php echo isset($edit_data['fullname'])?$edit_data['fullname']:'' ?>"> 
            </div>
          </div>
          <div class="form-group row">
            <div class="col-2">
              <label for="">Email *</label>
            </div>
            <div class="col-10">
              <input type="email" class="form-control" placeholder="Email" required="" name="email" value="<?php echo isset($edit_data['email'])?$edit_data['email']:'' ?>">
            </div>
          </div>
          <div class="form-group row">
            <div class="col-2">
              <label for="">
                Password 
                <small>)* Panjang min 6 kata</small>
              </label>
            </div>
            <div class="col-10">
              <input type="password" class="form-control" placeholder="Password"  minlength="6" name="password">
            </div>
          </div>
          <div class="form-group row">
            <div class="col-2">
              <label for="">Level *</label>
            </div>
            <div class="col-8">
              <select name="level_id" id="" class="form-control">
                <option value="">Pilih Level</option>
                <?php foreach ($levels as $key => $value): ?>
                  <option value="<?php echo $value['id'] ?>" <?php echo isset($edit_data['level_id'])?($edit_data['level_id'] == $value['id'])?'selected':'':'' ?>><?php echo $value['level_name']; ?></option>
                <?php endforeach ?>
              </select>
            </div>
            <div class="col-2">
              <button data-toggle="modal" data-target="#exampleModal" type="button" class="btn btn-primary btn-sm btn-block" style="margin-top: 5px">Tambah Level</button>
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