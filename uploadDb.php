<?php 
   echo "hello"; echo "<br>";
   $conn = new mysqli("localhost","root","","mitapp");
   $Xangle=$_POST["xangle"];
   $Yangle=$_POST["yangle"];
   
   mysqli_query($conn,"UPDATE readings SET xangle='$Xangle',yangle='$Yangle' WHERE deviceID=1;");

    $sql="SELECT * FROM readings WHERE 1;";
    $result=mysqli_query($conn,$sql);
    $row=mysqli_fetch_array($result);

   
?>


