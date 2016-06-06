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

	<?php foreach($resurces as $res) 
	{ 

	   print '<tr>';

	   foreach ($res as $item) 
	   {
	       print '<td>'.($item !== null ? htmlentities($item, ENT_QUOTES) : '&nbsp').'</td>';

	   } ?>
	   
	  <?php print '</tr>';

	} ?>

</table>