<h2 class="page-title">
     DATA PENJUALAN
</h2>

<div class="row">
	<div class="col-md-12">
		<div class="card">
			<div class="card-body">
				<a href = "<?php echo base_url(); ?>penjualan/inputpenjualan" class="btn btn-success mb-3">
				<svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><line x1="12" y1="5" x2="12" y2="19" /><line x1="5" y1="12" x2="19" y2="12" /></svg>
				Tambah Data</a>
				<div class="mb-3"><?php echo $this->session->flashdata('msg'); ?></div>
				<table class="table tale-striped table-borderd" id="tabelpenjualan">
					<thead>
						<tr>
							<th>NO</th>
							<th>NOMOR FAKTUR</th>
							<th>TANGGAL TRANSAKSI</th>
							<th>NAMA PELANGGAN</th>
							<th>JENIS TRANSAKSI</th>
							<th>KODE BARANG</th>
							<th>QTY</th>
							<th>TOTAL PENJUALAN</th>
							<th>KASIR</th>
							<th>AKSI</th>
						</tr>
					</thead>
					<tbody>
						<?php
							$no=1;
							foreach($penjualan as $p){
							?>
							<tr>
								<td align="middle"><?php echo $no; ?></td>
								<td align="middle"><?php echo $p->no_faktur; ?></td>
								<td align="middle"><?php echo $p->tgltransaksi; ?></td>
								<td align="middle"><?php echo $p->nama_pelanggan; ?></td>
								<td align="middle"><?php echo $p->jenis_transaksi; ?></td>
								<td align="middle"><?php echo $p->kode_barang; ?></td>
								<td align="middle"><?php echo $p->qty; ?></td>
								<td align="right"><?php echo number_format($p->totalakhir, '0' , '' , '.'); ?></td>
								<td align="middle"><?php echo $p->nama_lengkap; ?></td>
								<td>
									<a href="<?php echo base_url(); ?>penjualan/cetakpenjualan/<?php echo $p->no_faktur; ?>"  target="_blank" class="btn btn-sm btn-primary">
										<svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M17 17h2a2 2 0 0 0 2 -2v-4a2 2 0 0 0 -2 -2h-14a2 2 0 0 0 -2 2v4a2 2 0 0 0 2 2h2" /><path d="M17 9v-4a2 2 0 0 0 -2 -2h-6a2 2 0 0 0 -2 2v4" /><rect x="7" y="13" width="10" height="8" rx="2" /></svg>Cetak
									</a>
								</td>
							</tr>
							<?php 
								$no++;
							}
							?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
  <script>
    	$(function(){
    		 $('#tabelpenjualan').DataTable();
    	});

    </script>

