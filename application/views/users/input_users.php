
<form action="<?php echo base_url()?>users/simpanusers" class="formUsers" method="POST">
 <div class="form-group mb-3">
 <label class="form-label">ID User</label>
 <input type="text" class="form-control" name="idusers" placeholder="ID User">
 </div>

 <div  class="form-group mb-3">
 <label class="form-label">Nama User</label>
 <input type="text" class="form-control" name="namalengkap" placeholder="Nama User">
 </div>

 <div class="form-group mb-3">
 <label class="form-label">Nomor HP</label>
 <input type="text" class="form-control" name="nohp" placeholder="Nomor HP">
 </div>

  <div class="form-group mb-3">
 <label class="form-label">Username</label>
 <input type="text" class="form-control" name="username" placeholder="Username">
 </div>

 <div class="form-group mb-3">
 <label class="form-label">Password</label>
 <input type="text" class="form-control" name="password" placeholder="Password">
 </div>

  <div class="form-group mb-3">
 <label class="form-label">Level</label>
 <input type="text" class="form-control" name="level" placeholder="Level">
 </div>


 <div class="form-group mb-3">
 <div class="form-label">Kode Cabang</div>
 <select name="kodecabang" class="form-select" >
 <option value=""></option>
 <?php foreach($cabang as $c) { ?>
 	<option value="<?php echo $c->kode_cabang;?>"><?php echo $c->kode_cabang; ?></option>
 <?php } ?>
 </select>
 </div>

 <div class="mb-3">
 	<button type="submit" class="btn btn-primary w-100">
 	<svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><line x1="10" y1="14" x2="21" y2="3" /><path d="M21 3l-6.5 18a0.55 .55 0 0 1 -1 0l-3.5 -7l-7 -3.5a0.55 .55 0 0 1 0 -1l18 -6.5" /></svg>
 	Simpan</button>
 </div>

</form>

<script>
	$(function(){
		$('.formUsers').bootstrapValidator({
      fields: {
        idusers: {
          message: 'ID User Tidak Valid !',
          validators: {
            notEmpty: {
              message: 'ID User Harus Diisi !'
            }
          }
        },
          namalengkap: {
          message: 'Nama User Tidak Valid !',
          validators: {
            notEmpty: {
              message: 'Nama User Harus Diisi !'
            }
          }
        },
          nohp: {
          message: 'Nomor HP Tidak Valid !',
          validators: {
            notEmpty: {
              message: 'Nomor HP Harus Diisi !'
            }
          }
        },
          username: {
          message: 'Username Tidak Valid !',
          validators: {
            notEmpty: {
              message: 'Username Harus Diisi !'
            }
          }
        },
          password: {
          message: 'Password Tidak Valid !',
          validators: {
            notEmpty: {
              message: 'Password Harus Diisi !'
            }
          }
        },
          level: {
          message: 'Level Tidak Valid !',
          validators: {
            notEmpty: {
              message: 'Level Harus Diisi !'
            }
          }
        },
          kodecabang: {
          message: 'Kode Cabang Tidak Valid !',
          validators: {
            notEmpty: {
              message: 'Kode Cabang Harus Diisi !'
            }
          }
        },
    }
    });

	})
</script>