<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Laporan Tools</title>
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
		<?php
			$tgl=date('l, d F Y, h:i:sa');
			echo $tgl;
		?>
		<div class="col-md-12">
			<h2>Laporan Tools Baru</h2>
			<table>
			 	<thead>
			        <tr>
			        	<th>No.</th>
			            <th>Kode Tools</th>
			            <th>Nama Tools</th>
			            <th>Jenis Karyawan</th>	        
			            <th>Keterangan</th>	        
			            <th>Harga Tools</th>	        
			            <th>Stok Tools</th>	        
			            <th>Stok Masuk</th>	        
			            <th>Stok Keluar</th>	        
			            <th>Stok Akhir</th>	        
			        </tr>
			    </thead>
			    <tbody>
			    	<?php $i = 1; ?>
					@foreach($tool as $tools)
		        	<tr class="gradeA">
		        		<td>{{ $i++ }}</td>
		                <td>{{ $tools->KodeTools }}</td>
		                <td>{{ $tools->NamaTools }}</td>
		                <td>{{ $tools->JenisKar }}</td>
		                <td>{{ $tools->Keterangan }}</td>
		                <td>{{ $tools->HrgTools }}</td>
		                <td>{{ $tools->StokTools }}</td>
		                <td>{{ $tools->StokMasuk }}</td>
		                <td>{{ $tools->StokKeluar }}</td>
		                <td>{{ $tools->StokAkhir }}</td>
			        </tr>
			        @endforeach
			    </tbody>
			</table>
		</div>
	</div>
</body>
</html>