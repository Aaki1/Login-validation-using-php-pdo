<?php
$server="localhost";
$uname="root";
$psw="";
$db="uk1";
$con=new PDO("mysql:host=$server;dbname=$db",$uname,$psw);
$email=$_POST['email'];
$pass=$_POST['pwd'];
$query="SELECT * from logv where email=:email";
$stmt=$con->prepare($query);
$stmt->bindparam(":email",$email);
$stmt->execute();

if($row=$stmt->fetchall())
{
	foreach($row as $key => $value)
	{
		$pss=$value[2];
	}
	if($pss==$pass)
	{
		echo"<script>alert('login success')</script>";
	}
	else
	{
		echo"<script>alert('login failed');window.location.href='login.php';</script>";
	}
}
   else
    {
	echo"<script>alert('invalid user');window.location.href='login.php';</script>";
	}
?>