<div class="row">
  <div class="col-8">
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
        <?php $errors = session()->getFlashdata('error_validation')['message']; ?>
        <?php if (!empty(session()->getFlashdata('error_validation'))): ?>
          <?php foreach ($errors as $error): ?>
            <div class="alert alert-<?php echo session()->getFlashdata('error_validation')['class'] ?>">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
              <?php echo $error ?>
            </div>
          <?php endforeach ?>
        <?php endif ?>
        <form action="/admin/siswa/edit/<?php echo $edit_data['id'] ?>" method="post" enctype="multipart/form-data">
          <?= csrf_field(); ?> 
          <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item">
              <a class="nav-link active" id="pribadi-tab" data-toggle="tab" href="#pribadi" role="tab" aria-controls="pribadi" aria-selected="true">Data Pribadi</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" id="sekolah-tab" data-toggle="tab" href="#sekolah" role="tab" aria-controls="sekolah" aria-selected="false">Data Sekolah</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" id="keluarga-tab" data-toggle="tab" href="#keluarga" role="tab" aria-controls="keluarga" aria-selected="false">Data Keluarga</a>
            </li>
          </ul>
          <div class="tab-content mt-2" id="myTabContent">
            <div class="tab-pane fade show active" id="pribadi" role="tabpanel" aria-labelledby="pribadi-tab">
              <div class="form-group">
                <label for="">Nama Lengkap *</label>
                <input type="text" class="form-control" placeholder="Nama Lengkap" name="students_fullname" value="<?php echo $edit_data['students_fullname'] ?>">
              </div>
              <div class="form-group">
                <label for="">Jenis Kelamin </label>
                <div class="clearfix"></div>
                <input type="radio" name="students_gender" value="l" <?php echo ($edit_data['students_gender'] == 'l')?'checked':'' ?>> Laki-laki
                <span class="geser-radio">
                  <input type="radio" name="students_gender" value="p" <?php echo ($edit_data['students_gender'] == 'p')?'checked':'' ?>> Perempuan
                </span>
              </div>
              <div class="form-group">
                <label for="">Tempat Lahir</label>
                <input type="text" class="form-control" placeholder="Tempat Lahir" name="students_born_place" value="<?php echo $edit_data['students_born_place'] ?>">
              </div>
              <div class="form-group">
                <label for="">Tanggal Lahir</label>
                <input type="date" class="form-control" placeholder="Tanggal Lahir" name="students_born_date" value="<?php echo $edit_data['students_born_date'] ?>">
              </div>
              <div class="form-group">
                <label for="">No Handphone *</label>
                <input type="text" class="form-control" placeholder="No Handphone" name="students_phone" value="<?php echo $edit_data['students_phone'] ?>">
              </div>
               <div class="form-group">
                <label for="">No Email </label>
                <input type="email" class="form-control" placeholder="Email" name="students_email" value="<?php echo $edit_data['students_email'] ?>">
              </div>
              <div class="form-group">
                <label for="">Alamat</label>
                <textarea name="students_address" id="" cols="30" rows="10" class="form-control"><?php echo $edit_data['students_address'] ?></textarea>
              </div>
            </div>
            <div class="tab-pane fade" id="sekolah" role="tabpanel" aria-labelledby="sekolah-tab">
              <div class="form-group">
                <label for="">NIS *</label>
                <input type="text" class="form-control" placeholder="NIS" name="students_nis" value="<?php echo $edit_data['students_nis'] ?>">
              </div>
              <div class="form-group">
                <label for="">NISN *</label>
                <input type="text" class="form-control" placeholder="NISN" name="students_nisn" value="<?php echo $edit_data['students_nisn'] ?>">
              </div>
              <div class="form-group">
                <label for="">Kelas *</label>
                <select name="class_id"  class="form-control">
                  <option value="">Pilih Kelas</option>
                  <?php foreach ($kelas as $key => $value): ?>
                    <option <?php echo ($edit_data['students_nis'] == $value['id'])?'selected':'' ?> value="<?php echo $value['id'] ?>"><?php echo $value['class_name'] ?></option>
                  <?php endforeach ?>
                </select>
              </div>
            </div>
            <div class="tab-pane fade" id="keluarga" role="tabpanel" aria-labelledby="keluarga-tab">
              <div class="form-group">
                <label for="">Nama Ayah Kandung *</label>
                <input type="text" class="form-control" placeholder="Nama Ayah Kandung" name="students_name_of_father" 
                value="<?php echo $edit_data['students_name_of_father'] ?>">
              </div>
              <div class="form-group">
                <label for="">Nama Ibu Kandung *</label>
                <input type="text" class="form-control" placeholder="Nama Ibu Kandung" name="students_name_of_mother" value="<?php echo $edit_data['students_name_of_mother'] ?>">
              </div>
              <div class="form-group">
                <label for="">No Handphone Orang Tua *</label>
                <input type="text" class="form-control" placeholder="No Handphone Orang Tua" name="students_parent_phone" value="<?php echo $edit_data['students_parent_phone'] ?>">
              </div>
            </div>
          </div>
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
          <div class="text-info">
            *) Kolom Wajib diisi
          </div>
        </div>
      </div>
    </div>
    <div class="col-4">
      <div class="card card-default">
        <div class="card-header">
          <h3 class="card-title"></h3>
        </div>
        <div class="card-body">
          <div class="form-group">
            <label for="">Status</label>
            <div class="clearfix"></div>
            <input type="radio" name="students_status" value="1" <?php echo ($edit_data['students_status'] == '1')?'checked':'' ?>> Aktif
            <div class="clearfix"></div>
            <input type="radio" name="students_status" value="0" <?php echo ($edit_data['students_status'] == '0')?'checked':'' ?>> Tidak Aktif
          </div>
          <!-- <div class="form-group">
            <label for="">Foto</label>
            <a href="" class="thumbnail ">
              <img src="/assets/img/img-default.png" alt="" id="target" alt="Pilih gambar yang akan diupload">
            </a>
            <input type="file" name="students_image" class="mt-2">
          </div> -->
          <div class="formg-group">
            <input type="submit" class="btn btn-primary btn-block" value="Simpan">
            <a href="/admin/siswa" class="btn btn-danger btn-block">Batal</a>
          </div>
        </div>
      </div>
    </div>
  </form>
</div>