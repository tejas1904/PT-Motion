<?php

include 'sessionsDeclare.php';
include 'prediction.php';
?>
<!DOCTYPE html>
<html>
<head>
    <title></title>
    
</head>
<body>
<h3 id='motivation'></h3>
<canvas id="myCanvas" width="250" height="250" style="border:1px solid #d3d3d3;">
Your browser does not support the HTML5 canvas tag.</canvas>
<br>
<h3>try and make the square as large as possible</h3>
<br>
<script>

var Xangle=<?php echo $_SESSION['Xangle']; ?>;
var Yangle=<?php echo $_SESSION['Yangle']; ?>;
var maxXAngle=<?php echo  $_SESSION['maxXangle']; ?>;
var maxYAngle=<?php echo  $_SESSION['maxYangle']; ?>;

var sqD=Math.sqrt(Xangle*Xangle);
var sqmaxXD=Math.sqrt(maxXAngle*maxXAngle);

var goal = <?php echo  $goal; ?>;

var c = document.getElementById("myCanvas");
var ctx = c.getContext("2d");
ctx.beginPath();
ctx.strokeStyle = "#000000 ";
ctx.rect(125-sqD,125-sqD,Math.abs(Xangle*2),Math.abs(Xangle*2));
ctx.stroke();
ctx.beginPath();
ctx.strokeStyle = "#FF0000";
ctx.rect(125-sqmaxXD,125-sqmaxXD,Math.abs(maxXAngle*2),Math.abs(maxXAngle*2));
ctx.stroke();

ctx.beginPath();
ctx.strokeStyle = "#FFFF00";
ctx.rect(125-goal,125-goal,Math.abs(goal*2),Math.abs(goal*2));
ctx.stroke();

if(Xangle>goal)
  document.getElementById("motivation").innerHTML = "sucess you have reached your goal";
else if(Xangle>3*goal/4)
   document.getElementById("motivation").innerHTML = "come on you can do it just a littebit left";
  else if(Xangle>goal/2)
       document.getElementById("motivation").innerHTML = "you are halfway there";
      else if(Xangle<goal/4)
           document.getElementById("motivation").innerHTML = "shame on you twist that hand";
       else
       	document.getElementById("motivation").innerHTML = "your doing good";



 </script>


</body>
</html>

