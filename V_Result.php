	<link rel="stylesheet" href="<?php echo base_url('assets/plugins/dataTables/dataTables.bootstrap.css');?>" />
    <link rel="stylesheet" href="<?php echo base_url('assets/plugins/dataTables/buttons.dataTables.min.css');?>" />
    <link rel="stylesheet" href="<?php echo base_url('assets/plugins/dataTables/extensions/FixedColumns/css/dataTables.fixedColumns.min.css');?>" />
    <link rel="stylesheet" href="<?php echo base_url('assets/plugins/bootstrap/3.3.7/css/bootstrap.css');?>" />
    <script src="<?php echo base_url('assets/plugins/dataTables/jquery.dataTables.min.js');?>"></script>
	<script src="<?php echo base_url('assets/plugins/dataTables/dataTables.bootstrap.js');?>"></script>
	<script type="text/javascript">
		$('.ch_komp_imo').on('click',function(){
			var a = 0;
			var jml = 0;
			var val = '';
			$('input[name="ch_komp[]"]').each(function(){
				if ($(this).is(":checked") === true ) {
					a = 1;
					jml +=1;
					val += $(this).val();
				}
			});
			if (a == 0) {
				$('#btnSelectedIMO').attr("disabled","disabled");
				$('#jmlSlcIMO').text('');
			}else{
				$('#btnSelectedIMO').removeAttr("disabled");
				$('#jmlSlcIMO').text('('+jml+')');
				$('input[name="selectedPicklistIMO"]').val(val);
			}

		});
		$('.checkedAllIMO').on('click', function(){
			var check = 0;
			var a = 0;
			var jml = 0;
			var val = '';
			if ($(this).is(":checked")) {
				check = 1;
			}else{
				check = 0;
			}
			$('input[name="ch_komp[]"]').each(function(){
				if (check == 1) {
					$(this).prop('checked', true);
				}else{
					$(this).prop('checked', false);
				}
			});

			$('input[name="ch_komp[]"]').each(function(){
				if ($(this).is(":checked") === true ) {
					a = 1;
					jml +=1;
					val += $(this).val();
				}
			});
			if (a == 0) {
				$('#btnSelectedIMO').attr("disabled","disabled");
				$('#jmlSlcIMO').text('');
			}else{
				$('#btnSelectedIMO').removeAttr("disabled");
				$('#jmlSlcIMO').text('('+jml+')');
				$('input[name="selectedPicklistIMO"]').val(val);
			}
		});
	</script>
	
 <style type="text/css">
 	.text-bold-cuk{
 		font-weight: bold;
 	}

 	table td{
 		border: 1px solid black;
 	}

 	table th{
 		text-align: center;
 		vertical-align: middle !important;
 	}

 	.hdr {
 		text-align: center;
 		vertical-align: middle;
 	}
 	
 </style>
<table class="table tblResultIMO table-stripe table-bordered table-hover " width="100%">
	<thead>
		<tr class="bg-primary ">
			<th width="5%"> &nbsp;
				<input type="checkbox" class="checkedAllIMO">&nbsp;
			</th>
			<th width="10%">WIP NAME</th>
			<th width="13%">KODE ITEM</th>
			<th width="14%">NAMA ITEM </th>
			<th width="5%">QTY</th>
			<th width="10%">DEPT CLASS</th>
			<th width="20%">DESCRIPTION</th>
			<th width="15%">KETERANGAN</th>
			<th width="8%"></th>
		</tr>
	</thead>
	<tbody>
		<?php  
			if ($requirement):

			$allInvID = array();
			$allQty = array();
			$allUom = array();
			$allJobID = array();
			$allSubInvTo = array();
			$allSubFrom = array();
			$allLocatorTo = array();
			$allLocatorFrom = array();
			$no = 1; foreach ($requirement as $key => $value) {                                                                                                                                                                                                                                   
			$arrErr = array();
			foreach ($value['body'] as $k => $v) {
				if($v['REQUIRED_QUANTITY'] > $v['ATR']) { array_push($arrErr, $v['REQUIRED_QUANTITY']); }
			}

			if($value['header']['KET'] == 0){
				if(count($arrErr) > 0){
					$penanda = 'bg-danger';
					$penandabutton = 1;
					$text_button = '<b>Create Picklist</b>';
				}else{
					$penanda = '';
					$penandabutton = 0;
					$text_button = '<b>Create Picklist</b>';
				}
			}else{
				$penanda = 'bg-success';
				$penandabutton = 0;
				$text_button = '<b>Print Picklist</b>';
			}


		?>
		<tr class="hdr" >
			<td rowspan="2"   class="<?= $penanda ?>" style="vertical-align: top;" >
				<center>
				<?php if ($penandabutton == 1) { ?>
					<b style="color: #c1c1c1"> <?= $no++; ?></b> <br>
						<input type="checkbox"  class="ch_komp_imo" onclick="return false;"
							value="<?= $value['header']['WIP_ENTITY_NAME'].'+'; ?>">
				<?php } else{ ?>
						<b <?= ($value['body']) ? '' : 'style="color: #c1c1c1"' ?>><?= $no++; ?></b> <br>
						<input type="checkbox"  class="ch_komp_imo" <?= ($value['body']) ? ' name="ch_komp[]"' : 'onclick="return false;"' ?>
							value="<?= $value['header']['WIP_ENTITY_NAME'].'+'; ?>">
				<?php } ?>
				</center>
			</td>
			<td class="<?= $penanda ?>" ><b><?= $value['header']['WIP_ENTITY_NAME']; ?></b></td>
			<td class="<?= $penanda ?>" ><?= $value['header']['ITEM_CODE'] ?></td>
			<td class="<?= $penanda ?>" ><?= $value['header']['ITEM_DESC'] ?></td>
			<td class="<?= $penanda ?>" ><?= $value['header']['START_QUANTITY'] ?></td>
			<td class="<?= $penanda ?>" ><?= $value['header']['DEPT_CLASS'] ?></td>
			<td class="<?= $penanda ?>" ><?= $value['header']['DESCRIPTION'] ?></td>
			<td class="<?= $penanda ?>" ><?= ($value['header']['KET'] == 1) ? '<b>Sudah Dibuat Picklist</b>' : 'Belum Dibuat Picklist' ?>
				
			</td>
			<td class="<?= $penanda ?>">
				<?php if ($penandabutton == 1) { ?>
				<button class="btn btn-sm  disabled btn-default " target="_blank" >
						 <?= $text_button; ?> 
				</button>
				<?php } else{ ?>
				<button class="btn btn-sm  <?= ($value['body']) ? 'btn-success' : 'disabled btn-default' ?>" target="_blank"
						 <?= ($value['body']) ? "onclick=document.getElementById('form".$value['header']['WIP_ENTITY_NAME']."').submit();" :'' ?>>
						 <?= $text_button; ?> 
				</button>
				<?php } ?>
			</td>
		</tr>
		<tr>
			<td colspan="8"  class="<?= $penanda ?>" ><span onclick="seeDetailIMO(this,'<?= $key ?>')" class="btn btn-xs btn-primary"> see detail >> </span>
				<div style="margin-top: 5px ; display: none; " id="detail<?= $key ?>" >
				<form method="post" target="_blank" id="form<?= $value['header']['WIP_ENTITY_NAME']; ?>" action="<?= base_url('InventoryManagement/CreateMoveOrder/create') ?>" >
				<table class="table table-sm table-bordered table-hover table-striped table-responsive"  style="border: 2px solid #ddd">
					<thead>
						<tr class="text-center">
							<th>NO.</th>
							<th>Kode Komponen</th>
							<th>Nama Komponen</th>
							<th>Gudang Asal</th>
							<th>Unit</th>
							<th>Jumlah Dibutuhkan</th>
							<th>Jumlah ATR</th>
						</tr>
					</thead>
					<tbody>
						<?php 
						$no2 = 1;
						if ($value['body']):
						foreach ($value['body'] as $kut => $vulue) { ?>
						<tr>
							<td><?= $no2++; ?>
								<input type="hidden" name="no_job" value="<?= $vulue['WIP_ENTITY_NAME'] ?>">
								<input type="hidden" name="invID[]" value="<?= $vulue['INVENTORY_ITEM_ID'] ?>">
								<input type="hidden" name="qty[]" value="<?= $vulue['REQUIRED_QUANTITY'] ?>">
								<input type="hidden" name="uom[]" value="<?= $vulue['PRIMARY_UOM_CODE'] ?>">
								<input type="hidden" name="job_id[]" value="<?= $vulue['JOB_ID'] ?>">
								<input type="hidden" name="subinvto[]" value="<?= $vulue['GUDANG_TUJUAN'] ?>">
								<input type="hidden" name="subinvfrom[]" value="<?= $vulue['GUDANG_ASAL'] ?>">
								<input type="hidden" name="locatorto[]" value="<?= $vulue['LOCATOR_TUJUAN_ID'] ?>">
								<input type="hidden" name="locatorfrom[]" value="<?= $vulue['LOCATOR_ASAL'] ?>">
							</td>
							<td><?= $vulue['KOMPONEN'] ?></td>
							<td><?= $vulue['KOMP_DESC'] ?></td>
							<td><?= $vulue['GUDANG_ASAL'] ?></td>
							<td><?= $vulue['PRIMARY_UOM_CODE'] ?></td>
							<td class="<?= ($vulue['REQUIRED_QUANTITY'] > $vulue['ATR']) ? "bg-danger " : "" ?>"><?= $vulue['REQUIRED_QUANTITY'] ?></td>
							<td class="<?= ($vulue['REQUIRED_QUANTITY'] > $vulue['ATR']) ? "text-danger text-bold-cuk" : "" ?>"><?= $vulue['ATR'] ?></td>
						</tr>
						<?php 
							$allNojob[$no][] =  $vulue['WIP_ENTITY_NAME'];
							$allInvID[$no][] =  $vulue['INVENTORY_ITEM_ID'];
							$allQty[$no][] =  $vulue['REQUIRED_QUANTITY'];
							$allUom[$no][] =  $vulue['PRIMARY_UOM_CODE'];
							$allJobID[$no][] =  $vulue['JOB_ID'];
							$allSubInvTo[$no][] =  $vulue['GUDANG_TUJUAN'];
							$allSubFrom[$no][] =  $vulue['GUDANG_ASAL'];
							$allLocatorTo[$no][] =  $vulue['LOCATOR_TUJUAN_ID'];
							$allLocatorFrom[$no][] =  $vulue['LOCATOR_ASAL'];
						?>
						<?php }
						else:?>
							<tr>
								<td colspan="9">
									Tidak ada komponen..
								</td>
							</tr>
						<?php endif;
						 ?>
					</tbody>
				</table>
							</form>
				</div>
			</td>
		</tr>
		<?php } else: ?>
		<tr>
			<td colspan="9"> No Data Found .. :(  </td>
		</tr>
		<?php endif; ?>
	</tbody>
</table>
<div>
	<?php 
	if ($requirement) { ?>
	<form method="post" target="_blank" action="<?php echo base_url('InventoryManagement/CreateMoveOrder/createall'); ?>">
		<input type="hidden" name="selectedPicklistIMO" value="">
		<?php foreach ($allInvID as $key => $value) { ?>
		<input type="hidden" name="no_job[]" value="<?= implode('<>', $allNojob[$key]) ?>">
		<input type="hidden" name="invID[]" value="<?= implode('<>', $allInvID[$key]) ?>">
		<input type="hidden" name="qty[]" value="<?= implode('<>', $allQty[$key]) ?>">
		<input type="hidden" name="uom[]" value="<?= implode('<>', $allUom[$key]) ?>">
		<input type="hidden" name="job_id[]" value="<?= implode('<>', $allJobID[$key]) ?>">
		<input type="hidden" name="subinvto[]" value="<?= implode('<>', $allSubInvTo[$key]) ?>">
		<input type="hidden" name="subinvfrom[]" value="<?= implode('<>', $allSubFrom[$key]) ?>">
		<input type="hidden" name="locatorto[]" value="<?= implode('<>', $allLocatorTo[$key]) ?>">
		<input type="hidden" name="locatorfrom[]" value="<?= implode('<>', $allLocatorFrom[$key]) ?>">
		<?php } ?>
	<button type="submit" class="btn btn-success pull-right" disabled="disabled" id="btnSelectedIMO"><b> CREATE PICKLIST SELECTED </b><b id="jmlSlcIMO"></b></button>
	<?php } ?>
	</form>
</div>

