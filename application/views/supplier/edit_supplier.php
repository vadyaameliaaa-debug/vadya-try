
<form action="<?php echo base_url()?>supplier/updatesupplier" class="formSupplier" method="POST">

 <div class="form-group mb-3">
 <label class="form-label">Kode Supplier</label>
 <input type="text" readonly value="<?php echo $supplier['kode_supplier'];?>" readonly class="form-control" name="kodesupplier" placeholder="Kode Supplier">
 </div>

 <div  class="form-group mb-3">
 <label class="form-label">Nama Supplier</label>
 <input type="text" value="<?php echo $supplier['nama_supplier'];?>" class="form-control" name="namasupplier" placeholder="Nama Supplier">
 </div>

 <div class="form-group mb-3">
 <label class="form-label">Alamat Supplier</label>
 <input type="text" value="<?php echo $supplier['alamat_supplier'];?>" class="form-control" name="alamatsupplier" placeholder="Alamat Supplier">
 </div>

 <div class="form-group mb-3">
 <label class="form-label">Nomor HP Supplier</label>
 <input type="text" value="<?php echo $supplier['no_hp_supplier'];?>" class="form-control" name="nohpsupplier" placeholder="Nomor HP Supplier">
 </div>

 <div class="form-group mb-3">
 <label class="form-label">Email Supplier</label>
 <input type="text" value="<?php echo $supplier['email_supplier'];?>" class="form-control" name="emailsupplier" placeholder="Email Supplier">
 </div>


 <div class="mb-3">
 	<button type="submit" class="btn btn-primary w-100">
 	<svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><line x1="10" y1="14" x2="21" y2="3" /><path d="M21 3l-6.5 18a0.55 .55 0 0 1 -1 0l-3.5 -7l-7 -3.5a0.55 .55 0 0 1 0 -1l18 -6.5" /></svg>
 	Edit</button>
 </div>

</form>

<script>
  $(function(){
    $('.formSupplier').bootstrapValidator({
      fields: {
        kodesupplier: {
          message: 'Kode Supplier Tidak Valid !',
          validators: {
            notEmpty: {
              message: 'Kode Supplier Harus Diisi !'
            }
          }
        },
          namasupplier: {
          message: 'Nama Supplier Tidak Valid !',
          validators: {
            notEmpty: {
              message: 'Nama Supplier Harus Diisi !'
            }
          }
        },
          alamatsupplier: {
          message: 'Alamat Supplier Tidak Valid !',
          validators: {
            notEmpty: {
              message: 'Alamat Supplier Harus Diisi !'
            }
          }
        },
          nohpsupplier: {
          message: 'Nomor HP Supplier Tidak Valid !',
          validators: {
            notEmpty: {
              message: 'Nomor HP Supplier Harus Diisi !'
            }
          }
        },
          emailsupplier: {
          message: 'Email Supplier Tidak Valid !',
          validators: {
            notEmpty: {
              message: 'Email Supplier Harus Diisi !'
            }
          }
        },
        
    }
    });

  })
</script>