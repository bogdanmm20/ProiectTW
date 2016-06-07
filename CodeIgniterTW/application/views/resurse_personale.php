//TO DO
Link catre Adaugare locatie prin admin/add_personalres

<table border="1">
		<tr>
			<th>Id_res</th>
			<th>Nume</th>
			<th>Categorie</th> 
			<th>Latitudine</th>
			<th>Longitudine</th>
			<th>Adresa_strazii</th>
			<th>Cod_postal</th>
			<th>Oras</th>
			<th>Tara</th>
			<th>Descriere</th>
			<th>Proprietar</th>
		</tr>
		<!-- // th_specializ($row['TIP_RES']);
			// echo <th>Telefon</th>;
			// echo <th>Website</th>;
			
			// echo <th>Telefon</th>;
			// echo <th>Program</th>; -->

	<?php foreach($resurces as $res) 
	{ 

	   print '<tr>';

	   foreach ($res as $item) 
	   {
	       print '<td>'.($item !== null ? htmlentities($item, ENT_QUOTES) : '&nbsp').'</td>';

	   } ?>

	   	<td><a href="<?php echo site_url('admin/edit_res/' . $res['ID_RES']) ?>">Edit</a></td>
		<td><a href="<?php echo site_url('admin/delete_resursa/' . $res['ID_RES']) ?>">Delete</a></td>
	   
	  <?php print '</tr>';

	} ?>

</table>