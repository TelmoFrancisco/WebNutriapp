<?php
include('lock.php');
$pk_variable = $_POST[PK];
// echo "<script type='text/javascript'>alert('$pk_variable');</script>";
$sql = "SELECT * FROM client where PK = '$pk_variable'";
$result = $db->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
      echo "<li class=\"list-group-item\">Nome Completo: ". $row["NAME"]."</li>
            <li class=\"list-group-item\">Sexo: ". $row["GENDER"]. "</li>
            <li class=\"list-group-item\">Idade: ". $row["AGE"]. "</li>
            <li class=\"list-group-item\">Objetivo: ". $row["OBJECTIVE"]. "</li>
            <li class=\"list-group-item\">Revisao: ". $row["REVISION"]. "</li><br>";
  	   exit;
     }
} else {
    echo "*ERRO* - : " . $sql . "<br>" . $db->error;
}
?>
