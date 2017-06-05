<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Laporan Preused</title>
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
			<h2>Laporan Preused Baru</h2>
			<table>
			 	<thead>
			        <tr>
			        	<th>No.</th>
			            <th>Kode Preused</th>
			            <th>Nama Preused</th>
			            <th>Jenis Karyawan</th>	        
			            <th>Status</th>	        
			            <th>Ukuran</th>	        
			            <th>Keterangan</th>	        
			            <th>Harga Preused</th>	        
			            <th>Stok Preused</th>	        
			            <th>Stok Masuk</th>	        
			            <th>Stok Keluar</th>	        
			            <th>Stok Akhir</th>	        
			        </tr>
			    </thead>
			    <tbody>
			    	<?php $i = 1; ?>
					@foreach($preuseds as $preused)
		        	<tr class="gradeA">
		        		<td>{{ $i++ }}</td>
		                <td>{{ $preused->KodePreused }}</td>
		                <td>{{ $preused->NamaPreused }}</td>
		                <td>{{ $preused->JenisKar }}</td>
		                <td>{{ $preused->Status }}</td>
		                <td>{{ $preused->Ukuran }}</td>
		                <td>{{ $preused->Keterangan }}</td>
		                <td>{{ $preused->HrgPreused }}</td>
		                <td>{{ $preused->StokPreused }}</td>
		                <td>{{ $preused->StokMasuk }}</td>
		                <td>{{ $preused->StokKeluar }}</td>
		                <td>{{ $preused->StokAkhir }}</td>
			        </tr>
			        @endforeach
			    </tbody>
			</table>
		</div>
	</div>
</body>
</html>