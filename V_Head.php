<table class="table table-head" style="padding-bottom: 8px">
	<tr>
		<td width="35%">
			<h4>CV. KARYA HIDUP SENTOSA</h4>
		</td>
		<td class="ver-center" rowspan="2">
			<h3>PICK LIST GUDANG (MO) (ODM)</h3>
		</td>
	</tr>
	<tr>
		<td>
			<h4>YOGYAKARTA</h4>
		</td>
	</tr>
</table>
<table class="table table-head" style="margin-top: -10px;">
	<?php foreach ($dataall['head'] as $key => $value) { ?>
				<tr>
					<td width="15%">Tanggal Cetak</td>
					<td width="30%">: <?php echo $value['PRINT_DATE']; ?></td>
					<td width="15%">Hal</td>
					<td width="30%">{PAGENO}/[pagetotal]</td>
					<td width="10%" class="ver-top" rowspan="6" width="15%" style="text-align: center;" >
						<img style="width: 67px; height: auto" src="<?php echo base_url('assets/img/'.$value['MOVE_ORDER_NO'].'.png') ?>">
						<?php 
							if (strlen($value['MOVE_ORDER_NO'])>11) {
								$no_mo = substr_replace($value['MOVE_ORDER_NO'], '<br>', 12, 0);
							}else{
								$no_mo = $value['MOVE_ORDER_NO'];
							}
						?>
						<?= $no_mo; ?>
					</td>
				</tr>
				<tr>
					<td width="15%">Lokasi</td>
					<td width="30%">: <?php echo $value['LOKASI'] ?></td>
					<td width="15%">Job No</td>
					<td>: <?php echo $value['JOB_NO'] ?></td>
				</tr>
				<tr>
					<td>Produk</td>
					<td>: <?php echo $value['KATEGORI_PRODUK'] ?></td>
					<td>Department</td>
					<td>: <?php echo $value['DEPARTMENT'] ?></td>
				</tr>
				<tr>
					<td>Tanggal Dipakai</td>
					<td>: <?php echo $value['DATE_REQUIRED'] ?></td>
					<td>Kode Assembly</td>
					<td>: <?php echo $value['PRODUK'] ?></td>
				</tr>
				<tr>
					<td></td>
					<td></td>
					<td>Nama Assembly</td>
					<td>: <?php  echo $value['PRODUK_DESC']?><br></td>
				</tr>
				<tr>
					<td colspan="2"><?php echo $value['SCHEDULE'] ?></td>
					<td>Total Qty</td>
					<td>: <?php echo $value['START_QUANTITY'] ?></td>
				</tr>
	<?php } ?>
			</table>
			<table class="table table-bordered hor-center ver-center" style="margin-top:<?= (4-$assemblyLength)*13 ?> px" >
		
				<tr style="background-color: #f0f0f0;" class="table-head">
					<td rowspan="2" width="4%">No</td>
					<td rowspan="2" width="16%">Kode Part</td>
					<td rowspan="2" width="37%">Nama Part</td>
					<td rowspan="2" width="5%">UOM</td>
					<td rowspan="2" width="5%">QTY / Unit</td>
					<td colspan="2">Total Qty</td>
					<td rowspan="2" width="7%">TTD</td>
					<td rowspan="2" width="14%">Lokasi</td>
				</tr>
				<tr style="background-color: #f0f0f0;" class="table-head">
					<td width="6%">Minta</td>
					<td width="6%">Serah</td>
				</tr>
	</table>