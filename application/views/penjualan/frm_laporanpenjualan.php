<h2 class="page-tittle">
Laporan Penjualan
</h2>
<div class="row mt-3">
	<div class="col-md-6 w-100">
		<div class="card">
		<div class="card-body">
			<form action="<?php echo base_url(); ?>penjualan/cetaklaporanpenjualan" method="POST">
				<div class="row">
					<div class="col-md-6">
						<div class="input-icon mb-3">
							<span class="input-icon-addon">
								 <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><rect x="4" y="5" width="16" height="16" rx="2" /><line x1="16" y1="3" x2="16" y2="7" /><line x1="8" y1="3" x2="8" y2="7" /><line x1="4" y1="11" x2="20" y2="11" /><line x1="11" y1="15" x2="12" y2="15" /><line x1="12" y1="15" x2="12" y2="18" /></svg>
							</span>
							<input type="date" class="form-control" name="dari" id="dari" placeholder="Dari">
						</div>
					</div>
					<div class="col-md-6">
						<div class="input-icon mb-3">
							<span class="input-icon-addon">
					 			<svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><rect x="4" y="5" width="16" height="16" rx="2" /><line x1="16" y1="3" x2="16" y2="7" /><line x1="8" y1="3" x2="8" y2="7" /><line x1="4" y1="11" x2="20" y2="11" /><line x1="11" y1="15" x2="12" y2="15" /><line x1="12" y1="15" x2="12" y2="18" /></svg>
							</span>
							<input type="date" class="form-control" name="sampai" id="sampai" placeholder="Sampai">
						</div>
					</div>
				</div>
					<div class="mb-3">
						<div class="row">
								<button type="sumbit" name="sumbit" class="btn btn-primary w-100">	
									<svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M17 17h2a2 2 0 0 0 2 -2v-4a2 2 0 0 0 -2 -2h-14a2 2 0 0 0 -2 2v4a2 2 0 0 0 2 2h2" /><path d="M17 9v-4a2 2 0 0 0 -2 -2h-6a2 2 0 0 0 -2 2v4" /><rect x="7" y="13" width="10" height="8" rx="2" /></svg>Cetak
								</button>
							</div>
						</div>
					</div>		
				</div>
			</form>
		</div>
	</div>
	</div>
</div>	
<script>
	document.addEventListener("DOMContentLoaded" , function(){
		flatpickr(document.getElementById('dari'),{});
		flatpickr(document.getElementById('sampai'),{});

	});
</script>
