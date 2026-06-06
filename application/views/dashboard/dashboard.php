<h2 class="page-title">
     DASHBOARD
</h2>
<div class="alert alert-success" role="alert">
  <!-- SVG icon code with class="mr-1" -->
  <svg xmlns="http://www.w3.org/2000/svg" class="icon mr-1" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><circle cx="12" cy="7" r="4" /><path d="M6 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2" /></svg>
  Selamat Datang <b><?php echo $this->session->userdata('nama_lengkap'); ?></b> Sebagai <b><?php echo ucwords ($this->session->userdata('level')); ?></b>
</div>
<div class="column">
<div class="col-md-6">
              <div class="card card-sm">
                <div class="card-body d-flex align-items-center">
                  <span class="bg-green text-white avatar mr-3" style="height: 9rem; width: 9rem;">
                  	<svg xmlns="http://www.w3.org/2000/svg" style="height: 7rem; width: 7rem;" class="icon" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round" ><path stroke="none" d="M0 0h24v24H0z" fill="none"/><circle cx="9" cy="19" r="2" /><circle cx="17" cy="19" r="2" /><path d="M3 3h2l2 12a3 3 0 0 0 3 2h7a3 3 0 0 0 3 -2l1 -7h-15.2" />
                  	</svg>
                  </span>
                  <div class="mr-3">
                    <div class="font-weight-medium">
                      <?php echo $jmlpenjualan; ?> Transaksi 
                    </div>
                    <div class="text-muted">Transaksi Hari Ini</div>
                  </div>
                </div>
              </div>
            </div>
            <br/>
            <br/>
           <div class="col-md-6">
              <div class="card card-sm">
                <div class="card-body d-flex align-items-center" >
                  <span class="bg-blue text-white avatar mr-3" style="height: 9rem; width: 9rem;">
                  	<svg xmlns="http://www.w3.org/2000/svg" style="height: 7rem; width: 7rem;" class="icon" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M16.7 8a3 3 0 0 0 -2.7 -2h-4a3 3 0 0 0 0 6h4a3 3 0 0 1 0 6h-4a3 3 0 0 1 -2.7 -2" /><path d="M12 3v3m0 12v3" /></svg>
                  </span>
                  <div class="mr-3">
                    <div class="font-weight-medium">
                       <?php echo number_format($jmlbayar['totalbayar'] , '0', '' , '.'); ?>
                    </div>
                    <div class="text-muted">Pendapatan Hari Ini</div>
                  </div>
                </div>
              </div>
            </div>


</div>