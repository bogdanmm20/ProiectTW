<html>
<head><title>Oracle demo</title></head>
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

$sql="insert into resursefav( id_user, nume ) values ('2', 'coco')";
		$insFav=oci_parse($conn,$sql);
		// !!!!!!!!!!!!in loc de 2 ar trebui un id_user_session 
		echo "se face insert-ul". "<br>";
		oci_execute($insFav, OCI_DEFAULT);
		oci_free_statement($insFav);
		echo "s-a facut insert-ul". "<br>";
		
		
		
		/*
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
*/

/*
oci_fetch_all($stmt, $res);
echo "<pre>\n";
var_export($res);
echo "</pre>\n";
*/
//header("Location: ../h.php");
oci_close($conn);
?>

</body>
</html>
