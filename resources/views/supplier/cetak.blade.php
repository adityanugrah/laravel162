<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Laporan Supplier</title>
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
			<h2>Laporan Supplier Baru</h2>
			<table>
			 	<thead>
			        <tr>
			        	<th>No.</th>
			            <th>Kode Supplier</th>
			            <th>Nama Supplier</th>        
			            <th>Keterangan</th>	           
			            <th>Alamat</th>	           
			            <th>Kota</th>	        
			        </tr>
			    </thead>
			    <tbody>
			    	<?php $i = 1; ?>
					@foreach($suppliers as $supplier)
		        	<tr class="gradeA">
		        		<td>{{ $i++ }}</td>
		                <td>{{ $supplier->KodeSupplier }}</td>
		                <td>{{ $supplier->NamaSupplier }}</td>
		                <td>{{ $supplier->Keterangan }}</td>
		                <td>{{ $supplier->Alamat }}</td>
		                <td>{{ $supplier->KotaSupplier }}</td>
			        </tr>
			        @endforeach
			    </tbody>
			</table>
		</div>
	</div>
</body>
</html>