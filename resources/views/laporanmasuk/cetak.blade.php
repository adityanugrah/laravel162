<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Laporan Masuk</title>
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
			<h2>Laporan Transaksi Masuk</h2>
			<table>
			 	<thead>
			        <tr>
			        	<th>No.</th>
			            <th>Kode Masuk</th>
			            <th>Nama Supplier</th>
			            <th>Jenis Barang</th>       
			            <th>Nama Barang</th>        
			            <th>Jumlah Barang</th>        
			            <th>Harga Barang</th>		                   
			    </thead>
			    <tbody>
			    	<?php $i = 1; ?>
					@foreach($masukd as $det)
                    <tr class="gradeA">
                        <td>{{ $i++ }}</td>
                        <td>{{ $det->KodeMasuk }}</td>
                        @foreach($masuk as $kem1)                          
                            <td>{{ $kem1->Tgl_Masuk }}</td>
                        @endforeach
                        <td>{{ $det->NamaSupplier }}</td>
                        <td>{{ $det->JenisBrg }}</td>
                        <td>{{ $det->NamaBrg }}</td>
                        <td>{{ $det->JumlahBrg }}</td>
                        <td>{{ $det->HargaBrg }}</td>
                    </tr>
                    @endforeach
			    </tbody>
			</table>
		</div>
	</div>
</body>
</html>