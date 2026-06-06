
<form action="<?php echo base_url()?>pelanggan/updatepelanggan" class="formPelanggan" method="POST">

 <div class="form-group mb-3">
 <label class="form-label">Kode Pelanggan</label>
 <input type="text" readonly value="<?php echo $pelanggan['kode_pelanggan'];?>" readonly class="form-control" name="kodepelanggan" placeholder="Kode Pelanggan">
 </div>

 <div  class="form-group mb-3">
 <label class="form-label">Nama Pelanggan</label>
 <input type="text" value="<?php echo $pelanggan['nama_pelanggan'];?>" class="form-control" name="namapelanggan" placeholder="Nama Pelanggan">
 </div>

 <div class="form-group mb-3">
 <label class="form-label">Umur</label>
 <input type="number" value="<?php echo $pelanggan['umur'];?>" class="form-control" name="umur" placeholder="Umur">
 </div>

 <div class="form-group mb-3">
 <label class="form-label">Alamat</label>
 <input type="text" value="<?php echo $pelanggan['alamat_pelanggan'];?>" class="form-control" name="alamat" placeholder="Alamat Pelanggan">
 </div>

 <div class="form-group mb-3">
 <label class="form-label">Nomor HP</label>
 <input type="text" value="<?php echo $pelanggan['no_hp'];?>" class="form-control" name="nomor_hp" placeholder="Nomor HP">
 </div>

 <div class="form-group mb-3">
 <label class="form-label">Email</label>
 <input type="text" value="<?php echo $pelanggan['email_pelanggan'];?>" class="form-control" name="email" placeholder="Email Pelanggan">
 </div>

 <div class="mb-3">
 	<button type="submit" class="btn btn-primary w-100">
 	<svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><line x1="10" y1="14" x2="21" y2="3" /><path d="M21 3l-6.5 18a0.55 .55 0 0 1 -1 0l-3.5 -7l-7 -3.5a0.55 .55 0 0 1 0 -1l18 -6.5" /></svg>
 	Edit</button>
 </div>

</form>

<script>
  $(function(){
    $('.formPelanggan').bootstrapValidator({
      fields: {
        kodepelanggan: {
          message: 'Kode Pelanggan Tidak Valid !',
          validators: {
            notEmpty: {
              message: 'Kode Pelanggan Harus Diisi !'
            }
          }
        },
          namapelanggan: {
          message: 'Nama Pelanggan Tidak Valid !',
          validators: {
            notEmpty: {
              message: 'Nama Barang Harus Diisi !'
            }
          }
        },
          umur: {
          message: 'Umur Pelanggan Tidak Valid !',
          validators: {
            notEmpty: {
              message: 'Umur Pelanggan Harus Diisi !'
            }
          }
        },
          alamat: {
          message: 'Alamat Pelanggan Tidak Valid !',
          validators: {
            notEmpty: {
              message: 'Alamat Pelanggan Harus Diisi !'
            }
          }
        },
          nomor_hp: {
          message: 'Nomor HP Pelanggan Tidak Valid !',
          validators: {
            notEmpty: {
              message: 'Nomor HP Pelanggan Harus Diisi !'
            }
          }
        },
          email: {
          message: 'Email Pelanggan Tidak Valid !',
          validators: {
            notEmpty: {
              message: 'Email Pelanggan Harus Diisi !'
            }
          }
        },
    }
    });

  })
</script>