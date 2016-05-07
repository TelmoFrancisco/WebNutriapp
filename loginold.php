<?php
echo '<script type="text/javascript">';
echo 'function myFunction(){ event.preventDefault();
	 $(\'form\').fadeOut(500);
	 $(\'.wrapper\').addClass(\'form-success\'); };';
echo '</script>';
include("config.php");
session_start();
if($_SERVER["REQUEST_METHOD"] == "POST")
{
// username and password sent from Form
$myusername=mysqli_real_escape_string($db,$_POST['p_log_username']); 
$mypassword=mysqli_real_escape_string($db,$_POST['p_log_password']); 

$sql="SELECT p_log_id FROM login WHERE p_log_username='$myusername' and p_log_password='$mypassword'";
$result=mysqli_query($db,$sql);
$row=mysqli_fetch_array($result,MYSQLI_ASSOC);
$active=$row['active'];
$count=mysqli_num_rows($result);


// If result matched $myusername and $mypassword, table row must be 1 row
if($count==1)
{
session_register("myusername");
$_SESSION['login_user']=$myusername;

// header("location: welcome.php");
	echo '<BODY onLoad="myFunction()">';
}
else 
{
$error="Your Login Name or Password is invalid";
echo $error;
}
}
?>
<html>
  <head>
    <meta charset="UTF-8">
    <title>NUTRIÇÃO APP</title>
        <link rel="stylesheet" href="css/style.css">
  </head>
  <body>
    <div class="wrapper">
	<div class="container">
		<h1>Welcome</h1>
		<form action="" method="post">
			<input type="text" name="p_log_username"/><br />
			<input type="password" name="p_log_password"/><br/>
			<button type="submit">Login</button>
		</form>
	</div>
	<ul class="bg-bubbles">
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
	</ul>
</div>
  </body>
</html>
