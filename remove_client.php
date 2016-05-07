<?php
include('lock.php');

if($_POST['PK']){
$pk_variable=$_POST['PK'];
}

// sql to delete a record
$sql = "DELETE FROM client WHERE PK='$pk_variable'";
if ($db->query($sql) === TRUE) {
  echo "success";
    exit;
} else {
  echo "unsuccess";
}

?>
