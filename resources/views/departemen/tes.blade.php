
                    <table >
                     	<thead>
		                    <tr>
		                    	<th>No.</th>
		                        <th>Kode Departemen</th>
		                        <th>Nama Departemen</th>
		                        <th>Keterangan</th>
		                        <th>Action</th>
		                    </tr>
	                    </thead>
	                    <tbody>
	                    	<?php $i = 1; ?>
            				@foreach($dep as $dep)
	                    	<tr>
	                    		<td>{{ $i++ }}</td>
		                        <td>
		                        	<a>{{ $dep->KodeDepartemen }}</a>
		                        </td>
		                        <td>{{ $dep->NamaDepartemen }}</td>
		                        <td>{{ $dep->Keterangan }}</td>
		                   
		                    </tr>
		                    @endforeach
	                    </tbody>
                    </table>