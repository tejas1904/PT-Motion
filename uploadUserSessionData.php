<?php
session_start();
include 'prediction.php';
?>

<?php 
   
   $conn = new mysqli("localhost","root","","mitapp");
   $uploadThis=$_SESSION['maxXangle'];
   $uploadThisToo=$_SESSION['maxYangle'];
   mysqli_query($conn,"UPDATE readings SET maxxangle=".$uploadThis." WHERE deviceID=1;");
   mysqli_query($conn,"UPDATE readings SET maxyangle=".$uploadThisToo." WHERE deviceID=1;");

   $n1 = $n +1;
   //pred upload
   mysqli_query($conn,"INSERT INTO pred(deviceID, day, x) VALUES (1,".$n1.",".$uploadThis.");");
   
   


?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Analytics</title>

     <!-- Font Awesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
  <!-- Bootstrap core CSS -->
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <!-- Material Design Bootstrap -->
  <link href="css/mdb.min.css" rel="stylesheet">
  <!-- Your custom styles (optional) -->
  <link href="css/style.css" rel="stylesheet">


   
  </head>
  <body>

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
<div class='container'>
  <div class='row'>
    <div class="col"> <br><h1> Health Report</h1>
   </div>
  </div>
  <div class='row'>
    <div class='col-md-6'><br><br>
      <div class="card" style="width: 30rem;">
        <canvas id="myChart"></canvas>
      </div>
    </div>
    <div class='col-md-6'><br><br>
      <div class="card" style="width: 30rem;">
        <div class="card-body">
        <h3 class="card-title">Healing Factor(HF): &nbsp;<?php echo round($pp);?></h3>
        <h6 class="card-subtitle mb-2 text-muted">  </h6>
        <p class="card-text">If Healing Index is positive, it means you are healing<br>If Healing Index is negative, it means you are injuring yourself</p>
        </div>
       </div> 
    </div>
  </div>
  <div class=row>
    <div class='col-md-6'><br><br>
       <div class="card" style="width: 30rem;">
        <div class="card-body">
        <h3 class="card-title">Goal: <?php echo round(abs($goal)) ?>°</h3>
        <p class="card-text"> Goal is your objective to beat in the next session </p>
        <div class="card-subtitle mb-2 text-muted"">Current ROM: <?php echo round(abs($uploadThis)); ?></div>
        </div>
       </div> 
      </div>
    <div class='col-md-6'> <br><br>
      <div class="card" style="width: 30rem;">
        <div class="card-body">
        <h4 class="card-title">Diagnosis: </h4>
        <h6 class="card-subtitle mb-2 text-muted"> Diagnosis based on your ROM and HF </h6>
        <p class="card-text"> <?php if($pp>0)
                                      echo "<span style='color:green'>You are healing well! Good job!</span>";
                                    else {
                                      echo "<span style='color:red'>You are injuring yourself in the process or you are lacking motivation. Either way, Go visit a Doctor</span>"; } ?> 
                                    
        </p>
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
  

<script src="https://cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/web-animations/2.2.2/web-animations.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
<script>

  
var ctx = document.getElementById('myChart').getContext('2d');
var chart = new Chart(ctx, {
    // The type of chart we want to create
    type: 'line',

    // The data for our dataset
    data: {
        labels: [<?php echo $n-5;?>,<?php echo $n-4;?>,<?php echo $n-3;?>,<?php echo $n-2;?>,<?php echo $n-1;?>,<?php echo $n-0;?>],
        datasets: [{
            label: 'Progress',
            backgroundColor: 'rgb(255, 99, 132)',
            borderColor: 'rgb(255, 99, 132)',
            data: [<?php echo $x[$n-6]; ?>,<?php echo $x[$n-5]; ?>, <?php echo $x[$n-4]; ?>, <?php echo $x[$n-3]; ?>, 
            <?php echo $x[$n-2]; ?>, <?php echo $x[$n-1]; ?>]
        }]
    },

    
    options: {}
});


</script>
 </body> 





</html>

