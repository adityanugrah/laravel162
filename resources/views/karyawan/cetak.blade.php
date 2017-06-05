<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Laporan Karyawan</title>
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
			<h2>Laporan Karyawan</h2>
			<table>
			 	<thead>
			        <tr>
			        	<th>No.</th>
			            <th>Kode Karyawan</th>
			            <th>Nama Karyawan</th>       
			            <th>Status</th>	       
			            <th>Nama Departemen</th>	       
			            <th>Email</th>	       
			    </thead>
			    <tbody>
			    	<?php $i = 1; ?>
					@foreach($kar as $kar)
		        	<tr class="gradeA">
		        		<td>{{ $i++ }}</td>
		                <td>{{ $kar->KodeKaryawan }}</td>
		                <td>{{ $kar->NamaKaryawan }}</td>
		                <td>{{ $kar->Status }}</td>
		                <td>{{ $kar->DepartemenKar }}</td>
		                <td>{{ $kar->email }}</td>
			        </tr>
			        @endforeach
			    </tbody>
			</table>
		</div>
	</div>
</body>
</html>