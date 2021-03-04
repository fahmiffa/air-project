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
        <form action="" method="get">
          <div class="row">
            <div class="col-4">
              <div class="form-group row">
                <div class="col-2">
                  <label for="">Tahun</label>
                </div>
                <div class="col-9">
                  <input type="text" class="form-control" readonly  value="<?php echo $period['period_start']."/".$period['period_end'] ?> ">
                </div>
              </div>
            </div>
            <div class="col-4">
              <div class="form-group row">
                <div class="col-2">
                  <label for="">Kelas</label>
                </div>
                <div class="col-10">
                  <select name="kelas" id="" class="form-control">
                    <option value="">Pilih Kelas</option>
                    <?php foreach($kelas as $data_kelas): ?>
                      <option value="<?php echo $data_kelas['id']?>"><?php echo $data_kelas['class_name']?></option>
                    <?php endforeach ?>
                  </select>
                </div>
              </div>
            </div>
            <div class="col-4">
              <button class="btn btn-success" type="submit">Cari/Tampilkan</button>
            </div>
          </div>
        </form>
        <hr>
        <div class="form-group row">
          <div class="col-2">
            <label for="">Setting Tarif</label>
          </div>
          <div class="col-9">
            <a href="/admin/detail_jenis_pembayaran/add_payment_class/<?php echo $edit_data['id'] ?>" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> Berdasarkan Kelas</a>
            <a href="/admin/detail_jenis_pembayaran/add_payment_student/<?php echo $edit_data['id'] ?>" class="btn btn-info btn-sm"><i class="fa fa-plus"></i> Berdasarkan Siswa</a>
            <a href="/admin/detail_jenis_pembayaran" class="btn btn-default btn-sm"> Kembali</a>
          </div>
        </div>
        <br>
        <br>
        <div class="row">
          <div class="col-12">
            <div class="table-responsive">
              <table class="table table-hover table-bordered">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Kelas</th>
                    <th>Jenis Pembayaran</th>
                    <th>Jumlah</th>
                    <th></th>
                  </tr>
                </thead>
                <tbody>
                  <?php $no=1; foreach ($list_spp as $key => $value): ?>
                  <tr>
                    <td><?php echo $no++ ?></td>
                    <td>
                      <?php echo $value['class_name'] ?>
                    </td>
                    <td><?php echo $value['payment_type_name'] ?></td>
                    <td><?php echo "Rp. " . number_format($value['jumlah']) ?></td>
                    <td>
                      <a href="" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#exampleModal<?php echo $value['id']?>"> 
                        <i class="fa fa-edit"></i>
                      </a>
                      <a onclick="return confirm('Apakah anda sudah yakin akan menghapus data ini??')" href="/admin/detail_jenis_pembayaran/delete_bill_monthly/<?php echo $value['id'] ?>" class="btn btn-danger btn-xs"> 
                        <i class="fa fa-trash"></i>
                      </a>
                      <?php include('modal_ubah_tarif_pembayaran.php') ?>
                    </td>
                  </tr>
                  <?php endforeach ?>
                </tbody>
              </table>
            </div>
          </div>
          
        </div>
      </div>
      <!-- /.card-body -->
    </div>
  </div>
</div>


