<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Laporan Loker</title>
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
			<h2>Laporan Loker</h2>
			<table>
			 	<thead>
			        <tr>
			        	<th>No.</th>
			            <th>Kode Loker</th>
			            <th>Nama Loker</th>
			            <th>Jenis Karyawan</th>	        
			            <th>Keterangan</th>	        
			            <th>Harga Loker</th>	        
			            <th>Stok Loker</th>	        
			            <th>Stok Masuk</th>	        
			            <th>Stok Keluar</th>	        
			            <th>Stok Akhir</th>	        
			        </tr>
			    </thead>
			    <tbody>
			    	<?php $i = 1; ?>
					@foreach($lokers as $loker)
		        	<tr class="gradeA">
		        		<td>{{ $i++ }}</td>
		                <td>{{ $loker->KodeLoker }}</td>
		                <td>{{ $loker->NamaLoker }}</td>
		                <td>{{ $loker->Jeniskar }}</td>
		                <td>{{ $loker->Keterangan }}</td>
		                <td>{{ $loker->HrgLoker }}</td>
		                <td>{{ $loker->StokLoker }}</td>
		                <td>{{ $loker->StokMasuk }}</td>
		                <td>{{ $loker->StokKeluar }}</td>
		                <td>{{ $loker->StokAkhir }}</td>
			        </tr>
			        @endforeach
			    </tbody>
			</table>
		</div>
	</div>
</body>
</html>