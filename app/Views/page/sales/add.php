<style>
  .table tr th, .table tr td {
    /*width: 147px;*/
  }
</style>
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
        <div class="row formCustomer">
          <div class="col-6 ">
            <div class="form-group row">
              <div class="col-3">
                <label for="">Nama Pelanggan</label>
              </div>
              <div class="col-9">
                <select name="customer_id" id="customer_id" class="form-control customer_id">
                  <option value="">Pilih Pelanggan</option>
                  <?php foreach ($customer as $key => $value): ?>
                    <option value="<?php echo $value['id'] ?>"><?php echo $value['customer_name'] ?></option>
                  <?php endforeach ?>
                </select>
              </div>
            </div>
            <div class="form-group row">
              <div class="col-3">
                <label for="">Alamat</label>
              </div>
              <div class="col-9">
                <input type="text" class="form-control address"  id="address" placeholder="Alamat">
              </div>
            </div>

            <div class="form-group row">
              <div class="col-3">
                <label for="">Telephone/Fax</label>
              </div>
              <div class="col-9">
                <input type="text" class="form-control no_phone"  id="no_phone" placeholder="Telephone/Fax">
              </div>
            </div>
          </div>
          <div class="col-6">
            <div class="form-group row">
              <div class="col-3 text-right">
                <label for="">No Polisi</label>
              </div>
              <div class="col-9">
                <input type="text" class="form-control no_pol" id="no_pol" placeholder="No Polisi">
              </div>
            </div>
            <div class="form-group row">
              <div class="col-3 text-right">
                <label for="">Tanggal</label>
              </div>
              <div class="col-9">
                <input type="text" class="form-control date" id="date" placeholder="Tanggal" readonly="" value="<?php echo date("d M Y"); ?>">
              </div>
            </div>
          </div>
        </div>
        <div class="formTransaksi mt-4">
          <table class="table table-bordered table-hover">
            <thead>
              <tr>
                <th width="66px">No</th>
                <th width="147px">Nomor Meter</th>
                <th width="147px">Meter Akhir</th>
                <th width="100px">Jumlah <br>Dalam <br> (m3)</th>
                <th>Keterangan</th>
                <th width="45px"></th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td class="text-right"></td>
                <td>
                  <input type="text" name="meter_awal" id="meter_awal" class="form-control" placeholder="Nomor Meter">
                </td>
                <td>
                  <input type="text" name="meter_akhir" id="meter_akhir" class="form-control" placeholder="Meter Akhir">
                </td>
                <td>
                  <input type="text" name="jumlah_kubik" id="jumlah_kubik" class="form-control" placeholder="Jumlah dalam m3">
                </td>
                <td>
                  <input type="text" class="form-control keterangan" id="keterangan" placeholder="Keterangan">
                </td>
                <td>
                  <a href="" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                </td>
              </tr>
            </tbody>
          </table>
        </div>        
      </div>
    </div>
  </div>
</div>

<script>
  // get pelanggan
  $('#customer_id').change(function(event) {
    var id = $(this).val(), formCustomer = $('.formCustomer');
    $.ajax({
      url: '<?php echo base_url() ?>/ajax/getCustomer/'+id,
      type: 'GET',
      dataType: 'json',
      success: function(data){
        console.log(data);
        if(data.success !== true){
          formCustomer.find('input').val("");
          formCustomer.find('input').attr('readonly', false);
        }else{
          formCustomer.find('input').attr('readonly', true);
          $('.address').val(data.data.customer_address);
          $('.no_phone').val(data.data.customer_telphone);
          $('.no_pol').val(data.data.customer_nopol);
        }
      }
    })
  });

  function  showAlert(icon, title, text){
    Swal.fire({
      icon: icon,
      title: title,
      text: text
    });
  }



</script>