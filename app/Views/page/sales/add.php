<style>
  .table tr th,
  .table tr td {
    /*width: 147px;*/
  }
</style>
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
          <input type="hidden" value="<?= session()->USER_ID ?>" name="user">
          <div class="row formCustomer">
            <div class="col-6 ">
              <div class="form-group row">
                <div class="col-3">
                  <label for="">Nama Pelanggan</label>
                </div>
                <div class="col-9">
                  <select name="customer" id="customer_id" class="form-control customer_id select2">
                    <option value="">Pilih Pelanggan</option>
                    <?php foreach ($customer as $key => $value) : ?>
                      <option value="<?php echo $value['id'] ?>"><?php echo $value['customer_name'] ?></option>
                    <?php endforeach ?>
                  </select>
                </div>
              </div>
              <div class="form-group row">
                <div class="col-3">
                  <label for="">Jenis Pelanggan</label>
                </div>
                <div class="col-9">
                  <input type="text" class="form-control jen" id="pel" placeholder="Jenis">
                  <input type="hidden" id="price">
                </div>
              </div>

              <div class="form-group row">
                <div class="col-3">
                  <label for="">Alamat</label>
                </div>
                <div class="col-9">
                  <input type="text" class="form-control address" id="address" placeholder="Alamat">
                </div>
              </div>

              <div class="form-group row">
                <div class="col-3">
                  <label for="">Telephone/Fax</label>
                </div>
                <div class="col-9">
                  <input type="text" class="form-control no_phone" id="no_phone" placeholder="Telephone/Fax">
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
              <thead class="text-center">
                <tr>
                  <th>No Meter</th>
                  <th>Meter Akhir</th>
                  <th>Jumlah (m<sup>3</sup>)</th>
                  <th width="15%">Harga</th>
                  <th>Total</th>
                  <th width="25%">Keterangan</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>
                    <input type="number" name="no_meter" id="meter_awal" class="form-control" placeholder="No Meter">
                  </td>
                  <td>
                    <input type="number" name="meter" id="meter_akhir" class="form-control" placeholder="Meter Akhir">
                  </td>
                  <td>
                    <input type="number" min="1" value="1" name="jumlah" id="m3" class="form-control" placeholder="Jumlah">
                  </td>
                  <td>
                    <select id="cost" name="cost" class="form-control" required>
                      <option value="">Harga</option>
                    </select>
                  </td>
                  <td>
                    <input type="text" name="total" id="total" class="form-control" placeholder="Total" readonly>
                  </td>
                  <td>
                    <input type="text" name="ket" class="form-control keterangan" id="keterangan" placeholder="Keterangan">
                  </td>
                  <td>
                    <a href="" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                  </td>
                </tr>
              </tbody>
            </table>
            <button type="submit" class="btn btn-primary float-right">Simpan</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<script>
  // get pelanggan
  $('#customer_id').change(function(event) {
    var id = $(this).val(),
      formCustomer = $('.formCustomer');
    $.ajax({
      url: '<?php echo base_url() ?>/ajax/getCustomer/' + id,
      type: 'GET',
      dataType: 'json',
      success: function(data) {
        console.log(data);
        if (data.success !== true) {
          formCustomer.find('input').val("");
          formCustomer.find('input').attr('readonly', false);
        } else {
          formCustomer.find('input').attr('readonly', true);
          $('.address').val(data.data.customer_address);
          $('.jen').val(data.data.jenis_customer);
          $('#price').val(data.data.jenis_value);
          $('.no_phone').val(data.data.customer_telphone);
          $('.no_pol').val(data.data.customer_nopol);
        }
      }
    })
  });

  $("#cost").change(function(e) {
    e.preventDefault();
    var c = $("#cost option:selected").text();
    var pr = parseInt($("#price").val());
    var n = $("#m3").val();
    if (c & pr) {
      var en = n * c;
      console.log(n * c + pr);
      $("#total").val(pr + n * c);

    } else {
      bootbox.alert('value tidak valid');
      return false;
    }




  });


  $(document).ready(function() {

    $.ajax({
      url: '<?php echo base_url() ?>/ajax/getHarga/',
      type: 'GET',
      dataType: 'json',
      success: function(data) {
        var $op = $("#cost");
        for (i = 0; i < data.length; i++) {
          $op.append('<option value="' + data[i].id + '">' + data[i].price_value + '</option>');
        }

      }
    })

  });

  function showAlert(icon, title, text) {
    Swal.fire({
      icon: icon,
      title: title,
      text: text
    });
  }
</script>