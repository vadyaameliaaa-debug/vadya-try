<h2 class="page-title">
     DATA SUPPLIER
</h2>

<div class="row">
	<div class="col-md-12">
		<div class="card">
			<div class="card-body">
				<a href = "#" class="btn btn-success mb-3" id="tambahsupplier">
				<svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><line x1="12" y1="5" x2="12" y2="19" /><line x1="5" y1="12" x2="19" y2="12" /></svg>
				Tambah Data</a>
				<div class="mb-3"><?php echo $this->session->flashdata('msg'); ?></div>
				<table class="table tale-striped table-borderd" id="tabelsupplier">
					<thead>
						<tr>
							<th>NO</th>
							<th>KODE SUPPLIER</th>
							<th>NAMA SUPPLIER</th>
							<th>ALAMAT SUPPLIER</th>
							<th>NOMOR HP SUPPLIER</th>
							<th>EMAIL SUPPLIER</th>
							<th>AKSI</th>
						</tr>
					</thead>
					<tbody>
						<?php 
						$no = 1;
						foreach($supplier as $s) { ?>
						<tr>
							<td><?php echo $no; ?></td>
							<td><?php echo $s->kode_supplier; ?></td>
							<td><?php echo $s->nama_supplier; ?></td>
							<td><?php echo $s->alamat_supplier; ?></td>
							<td><?php echo $s->no_hp_supplier; ?></td>
							<td><?php echo $s->email_supplier; ?></td>
							<td>
                <a href="#" data-kodesupplier="<?php echo $s->kode_supplier; ?>" class="btn btn-sm btn-primary edit">
                  <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M4 20h4l10.5 -10.5a1.5 1.5 0 0 0 -4 -4l-10.5 10.5v4" /><line x1="13.5" y1="6.5" x2="17.5" y2="10.5" /></svg> Edit </a>
                <a href="#" data-href="<?php echo base_url()?>supplier/hapussupplier/<?php echo $s->kode_supplier; ?>" class="btn btn-sm btn-danger hapus">
                  <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><line x1="4" y1="7" x2="20" y2="7" /><line x1="10" y1="11" x2="10" y2="17" /><line x1="14" y1="11" x2="14" y2="17" /><path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" /><path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" /></svg> Hapus </a>
              </td>
						</tr> 
						<?php 
						$no++;
						} ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
 <div class="modal modal-blur fade" id="modalsupplier" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Input Supplier</h5>
            <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <div id="loadforminputsupplier"></div>
        </div>
        </div>
    </div>
    </div>
 <div class="modal modal-blur fade" id="modaleditsupplier" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Edit Supplier</h5>
            <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <div id="loadformeditsupplier"></div>
          </div>
      </div>
      </div>
    </div>
  <div class="modal modal-blur fade" id="modalhapussupplier" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
  <div class="modal-content">
    <div class="modal-body">
      <div class="modal-title">Yakin Ingin Dihapus ? </div>
      <div>Jika Dihapus Data Akan Hilang</div>
    </div>
    <div class="modal-footer">
      <button type="button" class="btn btn-link link-secondary mr-auto" data-dismiss="modal">Cancel</button>
      <a href="#" id="hapussupplier" class="btn btn-danger">Ya, Hapus</a>
    </div>
  </div>
</div>
</div>

    <script>
    	$(function(){
    		$("#tambahsupplier").click(function(){
    			$("#modalsupplier").modal("show");
    			$("#loadforminputsupplier").load("<?php echo base_url(); ?>supplier/inputsupplier");
    		});

    		$(".edit").click(function(){
    			var kodesupplier = $(this).attr("data-kodesupplier");
    			$("#modaleditsupplier").modal("show");
    			$("#loadformeditsupplier").load("<?php echo base_url(); ?>supplier/editsupplier/" + kodesupplier);
    		});


    		$(".hapus").click(function(){
    			var href = $(this).attr("data-href");
    			$("#modalhapussupplier").modal("show");
    			$("#hapussupplier").attr("href" , href);

    		});
			 $('#tabelsupplier').DataTable();
    	});

    </script>