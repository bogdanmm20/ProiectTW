<html>
<head><title>Locatii Favorite</title></head>
<body>
	<?php 
	$conn=oci_connect("student","student","localhost/XE");//'//192.168.1.113:1521/ORCL'
	If (!$conn)
		{$m = oci_error();
		echo $m['message'], "\n";    exit;
		//echo 'Failed to connect to Oracle';
		}
	else 
		echo 'Succesfully connected with Oracle DB'."<br>";


$sql  = "SELECT r.tip_res, r.nume, r.oras, r.descriere FROM resurse r 
join resursefav rf on rf.nume=r.nume 
join cont_useri c on c.id_user=rf.id_user
where rf.id_user=2 ";

$stmt = oci_parse($conn, $sql);
oci_execute($stmt, OCI_DEFAULT);

 while ($row = oci_fetch_array($stmt, OCI_ASSOC)) {
    //echo "<br>"; print_r($row);
	echo  "Tip resursa: ".$row['TIP_RES']."<br>";
	echo  "Nume: " . $row['NUME']."<br>";
	echo  "Oras: " . $row['ORAS']."<br>";
	if(isset($row['DESCRIERE']))
	echo  "Descriere: ". $row['DESCRIERE']."<br>";
echo "<br>";
}
oci_free_statement($stmt);

oci_close($conn);
?>

</body>
</html>
