
<form action="<?php echo base_url()?>barang/updatebarang" class="formBarang" method="POST">
 <div class="form-group mb-3">
 <label class="form-label">Kode Barang</label>
 <input type="text" readonly value="<?php echo $barang['kode_barang'];?>" class="form-control" name="kodebarang" placeholder="Kode Barang">
 </div>

 <div  class="form-group mb-3">
 <label class="form-label">Nama Barang</label>
 <input type="text" value="<?php echo $barang['nama_barang'];?>" class="form-control" name="namabarang" placeholder="Nama Barang">
 </div>

 <div class="form-group mb-3">
 <label class="form-label">Stok</label>
 <input type="number" value="<?php echo $barang['stok'];?>" class="form-control" name="stok" placeholder="Stok">
 </div>

 <div class="form-group mb-3">
 	<label class="form-label">Satuan</label>
 	<select name="satuan" class="form-select">
 		 <option value=""></option>
 		 <option <?php if($barang['satuan'] == "strip") {
      echo "selected";
      }?> value="strip" value="strip">STRIP</option>
 		 <option <?php if($barang['satuan'] == "tablet") {
      echo "selected";
      }?> value="tablet">TABLET</option>
 		 <option <?php if($barang['satuan'] == "pcs") {
      echo "selected";
      }?> value="pcs" value="pcs">PCS</option>
 		 <option <?php if($barang['satuan'] == "botol") {
      echo "selected";
      }?> value="botol" value="botol">BOTOL</option>
 	</select>
</div>

 <div class="form-group mb-3">
 <label class="form-label">Harga Modal</label>
 <input type="number" value="<?php echo $barang['harga_modal'];?>" class="form-control" name="harga_modal" placeholder="Harga Modal">
 </div>

 <div class="form-group mb-3">
 <label class="form-label">Harga Jual</label>
 <input type="number" value="<?php echo $barang['harga_jual'];?>" class="form-control" name="harga_jual" placeholder="Harga Jual">
 </div>

 <!--<div class="form-group mb-3">
 <div class="form-label">Pilih Supplier</div>
 <select name="kodesupplier" class="form-select" >
 <option value=""></option>
  <?php foreach ($supplier as $s) {?>
    <option <?php if ($barang['kode_supplier'] == $s->kode_supplier) {
      echo "selected";
    }?> value="<?php echo $s->kode_supplier; ?>"><?php echo $s->kode_supplier . " - " . $s->nama_supplier; ?></option>
<?php } ?>
</select>
 </div>-->

 <div class="mb-3">
 	<button type="submit" class="btn btn-primary w-100">
 	<svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><line x1="10" y1="14" x2="21" y2="3" /><path d="M21 3l-6.5 18a0.55 .55 0 0 1 -1 0l-3.5 -7l-7 -3.5a0.55 .55 0 0 1 0 -1l18 -6.5" /></svg>
 	Edit</button>
 </div>

</form>

<script>
	$(function(){
		$('.formBarang').bootstrapValidator({
      fields: {
        kodebarang: {
          message: 'Kode Barang Tidak Valid !',
          validators: {
            notEmpty: {
              message: 'Kode Barang Harus Diisi !'
            }
          }
        },
          namabarang: {
          message: 'Nama Barang Tidak Valid !',
          validators: {
            notEmpty: {
              message: 'Nama Barang Harus Diisi !'
            }
          }
        },
          stok: {
          message: 'Stok Barang Tidak Valid !',
          validators: {
            notEmpty: {
              message: 'Stok Barang Harus Diisi !'
            }
          }
        },
          satuan: {
          message: 'Satuan Barang Tidak Valid !',
          validators: {
            notEmpty: {
              message: 'Satuan Barang Harus Diisi !'
            }
          }
        },
          harga_modal: {
          message: 'Harga Modal Tidak Valid !',
          validators: {
            notEmpty: {
              message: 'Harga Modal Harus Diisi !'
            }
          }
        },
          harga_jual: {
          message: 'Harga Jual Tidak Valid !',
          validators: {
            notEmpty: {
              message: 'Harga Jual Harus Diisi !'
            }
          }
        },
    }
    });

	})
</script>