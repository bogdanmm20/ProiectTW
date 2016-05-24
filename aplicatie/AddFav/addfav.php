<!DOCTYPE html>
<html>
<head>
  <title>Adaugare Fav</title>
</head>
<body>
<?php  
    
    if(isset($_POST['NumeLocatie']) && !empty($_POST['NumeLocatie']) )
    {
        $varNloc = $_POST['NumeLocatie'];
    }
    else
    {
        header("Location: locatii.html");
        //die();
    }

   $conn=oci_connect("student","student","localhost/XE");
    If (!$conn)
      echo 'Failed to connect to Oracle';
    else 
      echo 'Succesfully connected with Oracle DB';
    echo "<br>\n";
    
 //daca exista locatia 
 $stmt = oci_parse($conn, "SELECT nume FROM resurse r where r.nume= '$varNloc' ");
    oci_execute($stmt, OCI_DEFAULT);
	
    $exist = false;
	//foreach($row as oci_fetch_array($stmt, OCI_ASSOC))
    while (oci_fetch($stmt)) 
    {
      if(oci_result($stmt, "NUME")==$varNloc ) 
	  {
		echo " locatia ".oci_result($stmt, "NUME") ." exista " .  "<br>\n";
		$exist=true; 
		
		
		/***adauga la favorite***
		$sql="insert into resursefav( id_user, nume ) values ('2', '$varNloc')";
		$insFav=oci_parse($conn,$sql);
		// !!!!!!!!!!!!in loc de 2 ar trebui un id_user_session 
		
		oci_execute($insFav, OCI_DEFAULT);
		oci_commit($conn);
		oci_free_statement($insFav);
		*/
		/***adauga la favorite***/
		$insFav=oci_parse($conn,"insert into resursefav(id_user, nume ) values (:id_usr,:nume)");
		//////BINDDDD///// Assign value
        // in loc de 2 ar trebui un id_user_session 
		$doi=2;
        oci_bind_by_name($insFav, ':id_usr', $doi );
        oci_bind_by_name($insFav, ':nume', $varNloc );
		
		oci_execute($insFav, OCI_DEFAULT);
		oci_commit($conn);
		oci_free_statement($insFav);
		//*/
		
		break;
	  }
	}
	// Daca nu exista locatia
	if($exist == false)
	{
		echo "locatia" .$varNloc ." nu exista " .  "<br>\n";
		header("Location: locatii.php");
		
	}
	
	/*$sql  = "SELECT * FROM resurse";
	$stmt = oci_parse($conn, $sql);
	oci_execute($stmt, OCI_DEFAULT);
	oci_fetch_all($stmt, $res);
	echo "<pre>\n";
	var_export($res);
	echo "</pre>\n";
	*/
   

    
    //header("Location: ../aplicatie/home.html");
	oci_free_statement($stmt);
    oci_close($conn);
    
?>

</body>
</html>




    