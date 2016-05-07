<?php
include('lock.php');
$pk_variable = $_POST[PK];
$sql = "SELECT * FROM client where PK = '$pk_variable'";
$result = $db->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "success";
  	     exit;
     }
} else {
    echo "*ERRO* - : " . $sql . "<br>" . $db->error;
}
?>
