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
        <div class="row mb-2" align="">
          <div class="col-6">
          </div>
          <div class="col-6" align="right">
            <a href="/page/sales/add" class="text-right btn btn-primary btn-sm">Tambah</a>
            <a href="/admin/siswa/import" class="btn btn-info btn-sm">Import</a>            
            <a href="" class="btn btn-success btn-sm"><i class="fa fa-print"></i> Cetak</a>            
          </div>
        </div>
        <div class="table-responsive">
          <table class="table table-hover table-bordered">
            <thead>
              <tr>
                <th>#</th>
                <th>Tanggal</th>
                <th>No Transaksi</th>
                <th>Nama Pelanggan</th>
                <th>Tipe</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              <?php $no=1; foreach ($list as $key => $value): ?>
              <tr>
                <td><?php echo $no++ ?></td>
                <td><?php echo $value['students_nis'] ?></td>
                <td><?php echo $value['students_fullname'] ?></td>
                <td><?php echo $value['class_name'] ?></td>
                <td><?php echo $value['students_name_of_mother'] ?></td>
                <td><?php echo ($value['students_status'] == 1)?'<span class="badge badge-success">Aktif</span>':'<span class="badge badge-warning">Tidak Aktif</span>'; ?></td>
                <td>
                  <a href="/admin/siswa/detail/<?php echo $value['id'] ?>" class="btn btn-danger btn-xs">
                    <i class="fa fa-eye"></i>
                  </a>

                  <a target="_blank" href="/admin/siswa/print/<?php echo $value['id'] ?>" class="btn btn-danger btn-xs">
                    <i class="fa fa-print"></i>
                  </a>                    
                  <a href="/admin/siswa/update/<?php echo $value['id'] ?>" class="btn btn-primary btn-xs">
                    <i class="fa fa-edit"></i>
                  </a>
                  <a onclick="return confirm('Apakah anda yakin??')" href="/admin/siswa/delete/<?php echo $value['id'] ?>" class="btn btn-danger btn-xs">
                    <i class="far fa-trash-alt"></i>
                  </a>
                </td>
              </tr>
            <?php endforeach ?>
          </tbody>
        </table>
      </div>
    </div>
    <!-- /.card-body -->
  </div>
</div>
</div>