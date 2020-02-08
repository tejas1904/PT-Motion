<?php
include 'loadDb.php';
session_start();
?>
<?php
$_SESSION["Xangle"] = $row['xangle'];
$_SESSION["Yangle"] = $row['yangle'];

if(!isset($_SESSION['maxXangle']))
  $_SESSION['maxXangle']=0;
if(isset($_SESSION['maxXangle']))
{
	if($row['xangle']>$_SESSION['maxXangle']){
    $_SESSION['maxXangle']=$row['xangle'];
}
}

if(!isset($_SESSION['maxYangle']))
   $_SESSION['maxYangle']=0;
if(isset($_SESSION['maxYangle']))
{
	if($row['yangle']>$_SESSION['maxYangle']){
	  $_SESSION['maxYangle']=$row['yangle'];
}
}
/*
echo "<br>X<br>";
echo $_SESSION['Xangle'];
echo "<br>";
echo $_SESSION['maxXangle'];
echo "<br>Y<br>";
echo $_SESSION['Yangle'];
echo "<br>";
echo $_SESSION['maxYangle']; */
?>

