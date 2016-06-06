<!DOCTYPE html>
<html>
<head>
  <title></title>
</head>
<body>
<?php  
    
    if(isset($_POST['formUname']) && isset($_POST['formEmail']) && isset($_POST['formPassword']) && !empty($_POST['formUname']) && !empty($_POST['formEmail']) && !empty($_POST['formPassword']))
    {
        $varUname = $_POST['formUname'];
        $varEmail = $_POST['formEmail'];
        $varPassword = $_POST['formPassword'];
        //echo nl2br("Logare cu succes: \n");
    }
    else
    {
        echo "<script type=\"text/javascript\">
            window.alert('Date incomplete');
            window.location='creare cont.html';
            </script>";
        //echo "Nu ai introdus toate datele <br>\n";
        //header("Location: creare cont.html");
        die();
    }

    $conn=oci_connect("student","student","localhost/XE");
    If (!$conn)
      //echo 'Failed to connect to Oracle';
        echo "<script type=\"text/javascript\">
            window.alert('Eroare la conectare baza de date');
            window.location='creare cont.html';
            </script>";
    /*else 
      echo 'Succesfully connected with Oracle DB';*/
    echo "<br>\n";
    
    $ok=0;

    // ------ Verific email-ul ------
    $sql = 'BEGIN verifica_email(:email, :ok); END;';
    $comVerificaEmail = oci_parse($conn, $sql);
    // Bind the parameter
    oci_bind_by_name($comVerificaEmail, ':email', $varEmail, 32);
    oci_bind_by_name($comVerificaEmail, ':ok', $ok, 32);
    $ok = 1;

    oci_execute($comVerificaEmail);
    // $ok ia valoarea output
    //print "$id_user";
    if($ok == 0)
    {
        $ok = 1;
        echo "<script type=\"text/javascript\">
            window.alert('Adresa email incorecta');
            window.location='creare cont.html';
            </script>";
        //echo 'Nu e buna adresa mail';
        //header("Location: creare cont.html");
        die();
    }
    else
    {
        $ok = 0;
    }
    // ----------------------------------------

    $comUser = oci_parse($conn, "SELECT USERNAME FROM CONT_USERI where USERNAME = '$varUname'");
    oci_execute($comUser, OCI_DEFAULT);
    $ok = 0;
    while (oci_fetch($comUser)) 
    {
        //echo 'Primul while'.oci_result($comUser, "USERNAME");
        if(oci_result($comUser, "USERNAME")==$varUname)  
        {
           $ok=1;
        }
    }

    $comEmail = oci_parse($conn, "SELECT EMAIL FROM CONT_USERI where EMAIL = '$varEmail'");
    oci_execute($comEmail, OCI_DEFAULT);
    while (oci_fetch($comEmail) && $ok == 0) 
    {
        //echo 'Al doilea while'.oci_result($comEmail, "EMAIL");
        if(oci_result($comEmail, "EMAIL")==$varEmail)  
        {
            $ok=1;
        }
    }

    if($ok == 1)
    {
        echo "<script type=\"text/javascript\">
            window.alert('Date incorecte/Userul exista deja');
            window.location='creare cont.html';
            </script>";
        //echo 'Ceva e gresit ';
        //header("Location: creare cont.html");
        die();
    }
    else
    {
        // ------ Obtin id-ul noului cont ------
        $sql = 'BEGIN id_user_maxim(:id_user); END;';
        $comId = oci_parse($conn, $sql);
        // Bind the output parameter
        oci_bind_by_name($comId, ':id_user', $id_user, 32);
        oci_execute($comId);
        // id_user ia valoarea output
        //print "$id_user";
        // ----------------------------------------

        // ------------ Realizez inserarea ------------
        $sql = 'BEGIN inserare_cont(:id_user, :username, :email, :pass); END;';
        $comInserareCont = oci_parse($conn, $sql);
        // Bind the output parameter
        oci_bind_by_name($comInserareCont, ':id_user', $id_user, 32);
        oci_bind_by_name($comInserareCont, ':username', $varUname, 32);
        // Assign value
        //$username = $varUname;
        oci_bind_by_name($comInserareCont, ':email', $varEmail, 32);
        oci_bind_by_name($comInserareCont, ':pass', $varPassword, 32);

        oci_execute($comInserareCont);
        // id_user ia valoarea output
        //print "$id_user";
        // -------------------------------------------
    }

    echo "<script type=\"text/javascript\">
            window.alert('Creare cont reusita');
            window.location='logare.html';
            </script>";
    //echo "Creare reusita";
    //header("Location: logare.html");
    oci_close($conn);

    
?>

</body>
</html><?php




    