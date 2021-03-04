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
        <div class="col-12 mb-2" align="right">
          <a href="/admin/period/add" class="text-right btn btn-primary btn-sm">Tambah</a>
        </div>
        <div class="table-responsive">
          <table class="table table-hover table-bordered">
            <thead>
              <tr>
                <th>#</th>
                <th>Tahun Mulai</th>
                <th>Tahun Selesai</th>
                <th>Status</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              <?php $no=1; foreach ($list as $key => $value): ?>
                <tr>
                  <td><?php echo $no++ ?></td>
                  <td><?php echo $value['period_start'] ?></td>
                  <td><?php echo $value['period_end'] ?></td>
                  <td><?php echo ($value['period_status'] == 0)?'<span class="badge badge-warning">Tidak Aktif</span>':'<span class="badge badge-success">Aktif</span>' ?></td>
                  <td>
                    <a href="/admin/period/update/<?php echo $value['id'] ?>" class="btn btn-primary btn-sm">
                      <i class="fa fa-edit"></i>
                    </a>
                     <a onclick="return confirm('Apakah anda yakin??')" href="/admin/period/delete/<?php echo $value['id'] ?>" class="btn btn-danger btn-sm">
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