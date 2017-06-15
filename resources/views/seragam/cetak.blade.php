<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Laporan Departemen</title>
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
			<h2>Laporan Seragam Baru</h2>
			<table>
			 	<thead>
			        <tr>
			        	<th>No.</th>
			            <th>Kode Seragam</th>
			            <th>Nama Seragam</th>
			            <th>Jenis Karyawan</th>	        
			            <th>Status</th>	        
			            <th>Ukuran</th>	        
			            <th>Keterangan</th>	        
			            <th>Harga Seragam</th>	        
			            <th>Stok Seragam</th>	        
			            <th>Stok Masuk</th>	        
			            <th>Stok Keluar</th>	        
			            <th>Stok Akhir</th>	        
			        </tr>
			    </thead>
			    <tbody>
			    	<?php $i = 1; ?>
					@foreach($seragams as $seragam)
		        	<tr class="gradeA">
		        		<td>{{ $i++ }}</td>
		                <td>{{ $seragam->KodeSeragam }}</td>
		                <td>{{ $seragam->NamaSeragam }}</td>
		                <td>{{ $seragam->JenisKar }}</td>
		                <td>{{ $seragam->Status }}</td>
		                <td>{{ $seragam->Ukuran }}</td>
		                <td>{{ $seragam->Keterangan }}</td>
		                <td>{{ $seragam->HrgSeragam }}</td>
		                <td>{{ $seragam->StokSeragam }}</td>
		                <td>{{ $seragam->StokMasuk }}</td>
		                <td>{{ $seragam->StokKeluar }}</td>
		                <td>{{ $seragam->StokAkhir }}</td>
			        </tr>
			        @endforeach
			    </tbody>
			</table>
		</div>
	</div>
	<script src="{{ asset('js/jquery-2.1.1.js') }}" type='text/javascript'></script>
	<script type="text/javascript">
		n =  new Date();
		y = n.getFullYear();
		m = n.getMonth() + 1;
		d = n.getDate();
		document.getElementById("date").innerHTML = m + "/" + d + "/" + y;
	</script>
</body>
</html>