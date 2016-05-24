
<?php
   session_start();
   $_session['Username']='bogdan';
   $name=$_session['Username'];
   
   $conn = oci_connect('student', 'student', 'localhost/XE');
if (!$conn) {
    $e = oci_error();
    trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
}

$query = 'select * from locatii_adaugate';
$stid = oci_parse($conn, $query);
$r = oci_execute($stid);

print '<table border="1">';
while ($row = oci_fetch_array($stid, OCI_RETURN_NULLS+OCI_ASSOC)) {
   print '<tr>';
   foreach ($row as $item) {
       print '<td>'.($item !== null ? htmlentities($item, ENT_QUOTES) : '&nbsp').'</td>';
   }
   print '</tr>';
}
print '</table>';

oci_free_statement($stid);
oci_close($conn);
  
?>

