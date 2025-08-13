<!DOCTYPE html>
<html>
<head>
<style>
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

th {
  border: 1px solid #000000;
  padding: 8px;
  font-size: 12px;
}
td {
  border: 1px solid #000000;
  padding: 8px;
  font-size: 12px;
}

/* tr:nth-child(even) {
  background-color: #dddddd;
} */
p {
	margin : 5px;
}.center {
  margin-left: 50px;
  margin-right: auto;
}
</style>
</head>
<body>
<p style="text-align:center;font-size: 18px;margin-top:30px;"><b>Laporan Booking Kendaraan <b></p>
<p style="text-align:center;font-size: 16px"><b>TRACK ASTRA <b></p>

<table  class="center" style="width:50%;text-align: left;margin-left:0px">
	<tr>
		<th width="20px" style="text-align:center;">No</th>
		<th width="100px" style="text-align:center;">Kendaraan</th>
		<th width="80px" style="text-align:center;">Plat Nomor</th>
		<th width="200px" style="text-align:center;">Tanggal Booking</th>
		<th width="100px" style="text-align:center;">Nama Pemesan</th>
		<th width="100px" style="text-align:center;">Hp</th>
		<th width="100px" style="text-align:center;">Alamat</th>
		<th width="100px" style="text-align:center;">Status</th>
		<th width="80px" style="text-align:center;">Harga</th>
	</tr>
	<?php 
	$x =1;
	$total =0;
	foreach ($laporan as $key => $value) {
		$total += $value['total_price'];
		if($value['date_start'] == $value['date_end']){
		$tgl = date('d F Y',strtotime($value['date_start']));
		}else{ 
		$tgl = date('d F Y',strtotime($value['date_start']))." sampai ".date('d F Y',strtotime($value['date_end']));
		}
	?>
	<tr>
		<td style="text-align:center;"><?=$x++?></td>
		<td style="text-align:center;"><?=$value['transport_name'];?></td>
		<td style="text-align:center;"><?=$value['plat_number'];?></td>
		<td style="text-align:center;"><?=$tgl;?></td>
		<td style="text-align:center;"><?=$value['booking_name'];?></td>
		<td style="text-align:center;"><?=$value['booking_phone'];?></td>
		<td style="text-align:center;"><?=$value['booking_address'];?></td>
		<td style="text-align:center;"><?=$value['status'];?></td>
		<td style="text-align:center;"><?=number_format($value['total_price']);?></td>
	</tr>
	<?php } ?>
	
	
	<tr>
		<td colspan="8" style="text-align:center;">TOTAL</td>
		<td style="text-align:center;"><?=number_format($total);?></td>
	</tr>
	
</table>


<p style="margin-top:30dp;font-size:8px">Printed Date : <?=date('d-M-Y H:i:s')?></p>
</body>
</html>

