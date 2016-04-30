<html>
<head><title>Locatii</title></head>
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


$sql  = "SELECT * FROM resurse";
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
