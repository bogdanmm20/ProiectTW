<?php
if(isset($_POST['nume']) && isset($_POST['categorie']) && isset($_POST['latitudine']) && isset($_POST['longitudine']) && isset($_POST['oras']) && isset($_POST['tara']) && isset($_POST['descriere']) && !empty($_POST['nume']) && !empty($_POST['categorie']) && !empty($_POST['latitudine']) && !empty($_POST['longitudine']) && !empty($_POST['oras']) && !empty($_POST['tara'])&& !empty($_POST['descriere']))
    {
        $userName = $_POST['nume'];
        $userCategorie = $_POST['categorie'];
		$userLatitudine = $_POST['latitudine'];
		$userLongitudine = $_POST['longitudine'];
		$userOras = $_POST['oras'];
		$userTara = $_POST['tara'];
	    $userDescriere = $_POST['descriere'];
    }
    else
    {
        echo "<script type=\"text/javascript\">
            window.alert('Date incomplete');
            window.location='adauga_locatie.html';
            </script>";        
    }
   
   $conn = oci_connect('student', 'student', 'localhost/XE');
if (!$conn) {
    $e = oci_error();
    trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
}

$stid = oci_parse($conn, 'INSERT INTO locatii_adaugate (nume , categorie , latitudine , longitudine , oras , tara , descriere) VALUES(:v1, :v2 , :v3 ,:v4 ,:v5 , :v6 , :v7)');
oci_bind_by_name($stid, ':v1', $userName);
oci_bind_by_name($stid, ':v2', $userCategorie);
oci_bind_by_name($stid, ':v3', $userLatitudine);
oci_bind_by_name($stid, ':v4', $userLongitudine);
oci_bind_by_name($stid, ':v5', $userOras);
oci_bind_by_name($stid, ':v6', $userTara);
oci_bind_by_name($stid, ':v7', $userDescriere);

$r = oci_execute($stid);  

if ($r) {
    echo "<script type=\"text/javascript\">
            window.alert('Locatie adaugata cu succes');
            window.location='adauga_locatie.html';
            </script>";
}

oci_free_statement($stid);
oci_close($conn);
  
?>


