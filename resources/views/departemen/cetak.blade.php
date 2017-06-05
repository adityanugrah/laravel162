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
	<h2>Laporan Departemen</h2>
	<table>
	 	<thead>
	        <tr>
	        	<th>No.</th>
	            <th>Kode Departemen</th>
	            <th>Nama Departemen</th>
	            <th>Keterangan</th>	        
	        </tr>
	    </thead>
	    <tbody>
	    	<?php $i = 1; ?>
			@foreach($dep as $dep)
	    	<tr class="gradeA">
	    		<td>{{ $i++ }}</td>
	            <td>{{ $dep->KodeDepartemen }}</td>
	            <td>{{ $dep->NamaDepartemen }}</td>
	            <td>{{ $dep->Keterangan }}</td>
	        </tr>
	        @endforeach
	    </tbody>
	</table>
</body>
</html>