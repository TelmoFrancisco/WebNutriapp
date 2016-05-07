<?php
include('lock.php');
$sql = "INSERT INTO client (name, gender, age, objective, revision)
VALUES ('$_POST[cname]', '$_POST[cgender]', '$_POST[cage]','$_POST[cobject]','$_POST[ccomment]')";

if ($db->query($sql) === TRUE) {
	header("Location: client_create.php");
    echo "New record created successfully";
	exit;
} else {
    echo "Error: " . $sql . "<br>" . $db->error;
}
?>