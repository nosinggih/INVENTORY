	<style type="text/css">
		body {
			font-size: 12px;
		}

		.table {
			width: 100%;
		}

		.table-head td {
			padding: 1px 3px;
		}

		.table-line td {
			padding: 4px 3px;
		}

		.table-bordered, .table-bordered td {
			border: 1px solid #8f8f8f;
			border-collapse: collapse;
		}

		.hor-center {
			text-align: center;
		}

		.hor-right {
			text-align: right;
		}

		.ver-center {
			vertical-align: middle;
		}

		.ver-top {
			vertical-align: top;
		}
	</style>

<body>
	
<?= $urut != '0' ? '<pagebreak resetpagenum="1" />' : '' ?>
	<table class="table table-bordered hor-center ver-top" >
	<?php 
	$no=1;
	foreach ($dataall['line'] as $k => $ln) {
		?>
						<tr class=" table-line">
							<td width="4%"><?php echo $no++; ?></td>
							<td width="16%"><?php echo $ln['KODE_KOMPONEN']; ?></td>
							<td width="37%" style="text-align: left;"><?php echo $ln['KODE_DESC']; ?></td>
							<td width="5%"><?php echo $ln['UOM']; ?></td>
							<td width="5%"><?php echo $ln['QTY_UNIT']; ?></td>
							<td width="6%"><?php echo $ln['QTY_MINTA']; ?></td>
							<td width="6%"></td>
							<td width="7%"></td>
							<td width="14%"><?php echo $ln['LOC']; ?></td>
						</tr>
	<?php } ?>
			</table>
</div>
</body>