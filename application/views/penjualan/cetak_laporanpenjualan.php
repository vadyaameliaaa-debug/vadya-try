<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, intial-scale=1.0">
	<title>Laporan Penjualan</title>
	<style>
		body{

			font-family: Tahoma;
		}

		table,
		th,
		td {
			border-collapse: collapse;
			border: 2px solid black;
		}

		table, 
		th, 
		td {
			padding: 10px;
		}


		th {
			font-size: 14px;
			background-color: #9698f2;
			color: white;
		}

	</style>
</head>
<body>
	<h3>LAPORAN PENJUALAN <br>

		PERIODE <?php echo $dari ?> s/d <?php echo $sampai; ?>
	</h3>
</body>
<br>
<table>
	<tr>
	<th>No</th>
	<th>NO FAKTUR</th>
	<th>TANGGAL TRANSAKSI</th>
	<th>NAMA PELANGGAN</th>
	<th>JENIS TRANSAKSI</th>
	<th>KODE BARANG</th>
	<th>QTY</th>
	<th>TOTAL PENJUALAN</th>
	<th>KASIR</th>
	</tr>
	<?php $no = 1; 
		$total=0;
		foreach($laporanpnj as $d) {
		$total += $d->total;
	?>
	<tr>
		<td align="center"><?php echo $no; ?></td>
		<td align="center"><?php echo $d->no_faktur; ?></td>
		<td align="center"><?php echo $d->tgltransaksi; ?></td>
		<td align="center"><?php echo $d->nama_pelanggan; ?></td>
		<td align="center"><?php echo $d->jenis_transaksi; ?></td>
		<td align="center"><?php echo $d->kode_barang; ?></td>
		<td align="center"><?php echo $d->qty; ?></td>
		<td align="right"><?php echo number_format($d->total, '0', '', '.'); ?></td>
		<td align="center"><?php echo $d->nama_lengkap; ?></td>
	</tr>
	<?php
		$no++;
	} ?>
	<tr>
		<th style="font-weight: bold; font-size:16;" colspan="7">TOTAL</th>
		<th align="right"><?php echo number_format($total, '0', '', '.'); ?></th>
		<th colspan="1"></th>
	</tr>

</table>
</html>