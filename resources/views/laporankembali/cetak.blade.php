<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Laporan Pengembalian</title>
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
			<h2>Laporan Transaksi Kembali</h2>
			<table>
			 	<thead>
			        <tr>
			        	<th>No.</th>
			            <th>Kode Kembali</th>
			            <th>Tanggal Pinjam</th>
			            <th>Tanggal Kembali</th>
			            <th>Jenis Barang</th>       
			            <th>Nama Barang</th>        
			            <th>Ukuran</th>        
			            <th>Jumlah Barang</th>	                   
			    </thead>
			    <tbody>
			    	<?php $i = 1; ?>
					@foreach($kembalid as $det)
                    <tr class="gradeA">
                        <td>{{ $i++ }}</td>
                        <td>{{ $det->KodeKembali }}</td>
                        @foreach($kembali as $dets)
                        	<td>{{ $dets->Tgl_Pinjam }}</td>
                        	<td>{{ $dets->Tgl_Kembali }}</td>
                        @endforeach
                        <td>{{ $det->JenisBarang }}</td>
                        <td>{{ $det->NamaBarang }}</td>
                        <td>{{ $det->SizeBarang }}</td>
                        <td>{{ $det->JmlBarang }}</td>
                    </tr>
                    @endforeach
			    </tbody>
			</table>
		</div>
	</div>
</body>
</html>