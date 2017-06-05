<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Laporan Keluar</title>
	<style type="text/css">
		table, td, th {    
		    border: 1px solid #ddd;
		    text-align: left;
		}

		table {
		    border-collapse: collapse;
		    width: 100%;
		}

		th, td {
		    padding: 10px;
		}
	</style>
</head>
<body>
	<div class="row">
		<div class="col-md-8">
			<h1><center>PT. Güntner Indonesia</center></h1>
			<center><b>Jalan Wonokoyo, Beji, Wonokoyo, Beji, Pasuruan, Jawa Timur 67154<b></center><br>
			<hr size="3px">
		</div>
	</div>	
	<div class="row">
		<div class="col-md-12">
			<h2>Laporan Transaksi Keluar</h2>
			<table>
			 	<thead>
			        <tr>
			        	<th>No.</th>
			            <th>Kode Keluar</th>
			            <th>Jenis Barang</th>       
			            <th>Nama Barang</th>       
			            <th>Size Barang</th>        
			            <th>Jumlah Barang</th> 		                   
			    </thead>
			    <tbody>
			    	<?php $i = 1; ?>
					@foreach($keluard as $det)
                    <tr class="gradeA">
                        <td>{{ $i++ }}</td>
                        <td>{{ $det->KodeKeluar }}</td>
                        <td>{{ $det->JenisBrg }}</td>
                        <td>{{ $det->NamaBrg }}</td>
                        <td>{{ $det->Size }}</td>
                        <td>{{ $det->JumlahBrg }}</td>
                    </tr>
                    @endforeach
			    </tbody>
			</table>
		</div>
	</div>
</body>
</html>