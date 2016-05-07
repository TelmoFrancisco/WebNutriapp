<?php
include('config.php');
session_start();
$user_check=$_SESSION['login_user'];

$ses_sql=mysqli_query($db,"select p_log_username from login where p_log_username='$user_check' ");

$row=mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);

$login_session=$row['p_log_username'];

if(!isset($login_session))
{
header("Location: login.html");
}
?>