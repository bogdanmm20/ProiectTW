<!DOCTYPE html>
<html>
<head>
  <title></title>
</head>
<body>
<?php  
    
    if(isset($_POST['formUname']) && isset($_POST['formPassword']) && !empty($_POST['formUname']) && !empty($_POST['formPassword']))
    {
        $varUname = $_POST['formUname'];
        $varPassword = $_POST['formPassword'];
        //echo nl2br("Logare cu succes: \n");
    }
    else
    {
        //echo "Nu ai introdus toate datele <br>\n";
        header("Location: logare.html");
        //die();
    }

    session_start();
    
    $_SESSION['Username'] = $varUname;

    $conn=oci_connect("student","student","localhost/XE");
    If (!$conn)
      echo 'Failed to connect to Oracle';
    else 
      echo 'Succesfully connected with Oracle DB';
    echo "<br>\n";
 
    $com = oci_parse($conn, "SELECT USERNAME, PASS FROM CONT_USERI where USERNAME = '$varUname' AND PASS = '$varPassword'");
    oci_execute($com, OCI_DEFAULT);
    $ok=0;
    while (oci_fetch($com)) 
    {
      if(oci_result($com, "USERNAME")==$varUname && oci_result($com, "PASS")==$varPassword)  
      {
        echo "Bine ai venit " . oci_result($com, "USERNAME") . "<br>\n";
        $ok=1;
      }
    }
    if($ok==0)
    {
        echo 'Nu e bun ';
        header("Location: logare.html");
        die();
    }

    echo "Conectare reusita";
    header("Location: ../aplicatie/home.html");
    oci_close($conn);

    
?>

</body>
</html><?php




    