<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <title></title>
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script type="text/javascript">

          {$(document).ready(function() {
            setInterval(function () {$('#show').load('sessionsDeclare.php')}, 150);
            });}
    </script>
    
</head>
<body>
<p id='show'></p>
<h4>sessions</h4>
<?php echo $_SESSION['Xangle']; ?>

<canvas></canvas>

<script type="text/javascript">
  var context, rectangle, loop;

context = document.querySelector("canvas").getContext("2d");

context.canvas.height = 180;
context.canvas.width = 320;

rectangle = {

  height:32,
  width:32,
  x:0,
  y:72, // Center of the canvas

};

loop = function() {
  var lol=<?php echo $_SESSION['Xangle']; ?>;
  console.log(lol);
  rectangle.x += 1;

  context.fillStyle = "#202020";
  context.fillRect(0, 0, 320, 180);// x, y, width, height
  context.fillStyle = "#ff0000";// hex for red
  context.beginPath();
  context.rect(rectangle.x, rectangle.y, rectangle.width, rectangle.height);
  context.fill();

  if (rectangle.x > 320) {// if rectangle goes past right boundary

    rectangle.x = -32;

  }

  // call update when the browser is ready to draw again
  window.requestAnimationFrame(loop);

};

window.requestAnimationFrame(loop);
</script>
</body>
</html>

