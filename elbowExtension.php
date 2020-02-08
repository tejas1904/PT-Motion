<?php
session_start();
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Home - AppName</title>

 

  </head>
  <body >


    <style>
  .topnav {
  background-color: #231489;
  overflow: hidden;
}

/* Style the links inside the navigation bar */
.topnav a {
  float: right;
  color: #f2f2f2;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  font-size: 17px;
}

/* Change the color of links on hover */
.topnav a:hover {
  background-color: #ddd;
  color: black;
}

/* Add a color to the active/current link */
.topnav a.active {
  background-color: #4CAF50;
  color: white;
}

#rcorners1 {
  border-radius: 25px;
  background: #73AD21;
  padding: 20px;
  width: 200px;
  height: 150px;
}
 </style>

<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
  <a class="navbar-brand" href="#">PT Motion</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="collapsibleNavbar">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="#">Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Insight</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Link</a>
      </li>    
    </ul>
  </div>  
</nav>
     
 <div class="container">

</div>
  <div class="row">
    <div class="col-md-6" style="text-align: center;">
      <br><button onclick="setInterval(function () {$('#show').load('graphics.php')}, 50);" id='startButton'class="btn btn-success">Start Excercise</button>
    
    <p id='show'></p>
    
    <button onclick="window.location.href='uploadUserSessiondata.php'" id='endButton' class="btn btn-success">End Excercise</button>
    </div>
    <div class="col-md-6">
      <div class="row">
        <div class="col">
          <br><br>  
        <div class="card" style="width: 20rem;">
        <div class="card-body">
        <h4 class="card-title">Know your game</h4>
        <h6 class="card-subtitle mb-2 text-muted"> ROM-range of motion </h6>
        <div class="card-text">The <span style="color: black;font-weight: bold">black</span> square represents your current ROM</div>
        <div class="card-text">The <span style="color: red;font-weight: bold">Red</span> square represents your maximum ROM </div>
        <div class="card-text">The <span style="color: #f7c911;font-weight: bold">Yellow</span> is todays goal   click <span style="color: green;font-weight: bold">start</span> when ready</div>
        </div>
       </div> 
        </div>
      <div class="col">
      <br><br>  
        <div class="card" style="width: 20rem;">
        <div class="card-body">
        <h4 class="card-title">Elbow extension</h4>
        <h6 class="card-subtitle mb-2 text-muted">all you need to know </h6>
        <p class="card-text">To improve your ability to fully straighten your elbow, you must work on elbow extension</p>
        <p class="card-text">repeat this 3 to 4 times</p>
        <a href="https://en.wikipedia.org/wiki/Elbow" target="_blank" class="card-link">learn more here</a>
        </div>
       </div> 
</div>
      </div>
      <div class="row">
        <div id='col'>
          <br><br>
          <h3>Doc's tips: </h3><br>
        <h4 id='tips'>start slow no need to hurry</h4>
      </div>
      </div>
    </div>
      
    </div>
  </div>
    








    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>

<script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script type="text/javascript">

         /* {$(document).ready(function() {
            setInterval(function () {$('#show').load('graphics.php')}, 50);
            });} */
            $(document).ready(function() {
  $("#startButton").click(function () {
   $("#endButton").show()
   $("#startButton").hide()
  });
     $("#endButton").hide()
 });
     </script>

      <script>
        var example = ["even 1 degree increase in Range of motion is good", 'take ample rest', 'try and holding the position for 5 seconds', 'eat well'];

        textSequence(0);
        function textSequence(i) {

            if (example.length > i) {
                setTimeout(function() {
                    document.getElementById("tips").innerHTML = example[i];
                    textSequence(++i);
                }, 3000); // 1 second (in milliseconds)

            } else if (example.length == i) { // Loop
                textSequence(0);
            }

        }
    </script>