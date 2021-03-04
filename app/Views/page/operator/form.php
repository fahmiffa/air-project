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
            <div class="col-2">Nama Operator *</div>
            <div class="col-10">
              <input type="text" class="form-control" placeholder="Nama Operator" required="" name="operator_name" 
              value="<?php echo isset($edit_data['operator_name'])?$edit_data['operator_name']:'' ?>">
            </div>
          </div>
          <div class="form-group row">
            <div class="col-2">Username *</div>
            <div class="col-10">
              <input type="text" class="form-control" placeholder="Username" required="" name="operator_username" 
              value="<?php echo isset($edit_data['operator_username'])?$edit_data['operator_username']:'' ?>">
            </div>
          </div>
          <div class="form-group row">
            <div class="col-2">Password *</div>
            <div class="col-10">
              <input type="password" class="form-control" placeholder="Nama Operator" required="" name="operator_password" 
              value="<?php echo isset($edit_data['operator_password'])?$edit_data['operator_password']:'' ?>">
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