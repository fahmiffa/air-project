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
          <a href="/page/customer/add" class="text-right btn btn-primary btn-sm">Tambah</a>
        </div>
        <div class="table-responsive">
          <table class="table table-hover table-bordered tableData">
            <thead>
              <tr>
                <th>#</th>
                <th>Tipe</th>
                <th>Nama Pelanggan</th>
                <th>Telephone/Hp</th>
                <th>Alamat</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              <?php $no=1; foreach ($list as $key => $value): ?>
                <tr>
                  <td><?php echo $no++ ?></td>
                  <td><?php echo $value['price_type'] ?></td>
                  <td><?php echo $value['customer_name'] ?></td>
                  <td>
                    <small>
                      Telepon : <?php echo $value['customer_telphone'] ?>
                      <br>
                      Handphone : <?php echo $value['customer_hp'] ?>

                    </small>
                  </td>
                  <td><?php echo $value['customer_address'] ?></td>
                  <td>
                    <a href="/page/customer/update/<?php echo $value['id'] ?>" class="btn btn-primary btn-xs">
                      <i class="fa fa-edit"></i>
                    </a>
                     <a onclick="return confirm('Apakah anda yakin??')" href="/page/customer/delete/<?php echo $value['id'] ?>" class="btn btn-danger btn-xs">
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