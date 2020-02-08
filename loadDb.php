<?php
$conn = new mysqli("localhost","root","","mitapp");
$sql="SELECT * FROM readings WHERE 1;";
    $result=mysqli_query($conn,$sql);
    $row=mysqli_fetch_array($result);

   
?>