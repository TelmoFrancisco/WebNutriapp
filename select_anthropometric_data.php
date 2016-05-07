<?php
include('lock.php');
$pk_variable = $_POST[PK];
$sql = "SELECT * FROM client WHERE PK = '$pk_variable'";
$result = $db->query($sql);
//  echo "<script type='text/javascript'>alert('$_POST[PK]');</script>";

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
      echo "<tr>
              <td><input type=\"hidden\" name=\"NAME\" value=". $row["NAME"]." readonly>". $row["NAME"]."</td>
              <td><input type=\"hidden\" name=\"GENDER\" value=". $row["GENDER"]." readonly>". $row["GENDER"]."</td>
              <td><input type=\"hidden\" name=\"AGE\" value=". $row["AGE"]." readonly>". $row["AGE"]."</td>
              <td><input type=\"hidden\" name=\"OBJECTIVE\" value=". $row["OBJECTIVE"]." readonly>". $row["OBJECTIVE"]."</td>
              <td><input type=\"hidden\" name=\"REVISION\" value=". $row["REVISION"]." readonly>". $row["REVISION"]."</td>
            </td>";
     }
} else {
    echo "0 registos";
}
?>
