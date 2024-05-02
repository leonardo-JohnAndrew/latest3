<?php

// adding new equipment
 require "./database.php";
// for($i = 1;$i<=2; $i++){
//  if($i<10){
//   $query = "INSERT INTO codes (classifications,code,laboratory)values('Aircon','E-011-INSPIRE-0$i','INSPIRE') ";
//  } else{
//   $query = "INSERT INTO codes (classifications,code,laboratory)values('Aircon','E-011-INSPIRE-$i','INSPIRE') ";
//  }
//   $sql = mysqli_query($sqlconnect,$query);
//   if($sql){
//     echo "go";
//   }
// }


?>
<html>
  <head>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  </script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        <?php  $column = array('Month','ITLAB','PRIME','SPARK','INSPIRE','FELTA')?>
        var data = google.visualization.arrayToDataTable([
          ['Month', 'ITLAB', 'PRIME', 'SPARK','INSPIRE','FELTA'],

          <?php $query = "SELECT *from monthly";
                $sqlquery =mysqli_query($sqlconnect,$query);
                while($res = $sqlquery->fetch_assoc()){
                   $month = $res['months'];
                   $itlab = $res['ITLAB'];
                   $prime = $res['PRIME'];
                   $spark = $res['SPARK'];
                   $inspire = $res['INSPIRE'];
                   $felta = $res['FELTA'];
              ?>
              ['<?php echo $month ?>', <?php echo $itlab?>, <?php echo $prime?>, <?php echo $spark  ?>,<?php echo $inspire?>,<?php echo $felta ?>],
          <?php
                };
          ?>
          // ['January', 70, 80, 60,79,90],
          // ['February', 89, 50, 25,96,80],
          // ['March', 50, 100, 80,88,76],
          // ['April', 89, 70, 90,57,65],
          // ['May', 50, 80, 89,58,64],
          // ['June', 65, 54, 35,79,78],
          // ['July', 103, 54, 67,58,85],
          // ['August', 105, 57, 38,80,65],
          // ['September', 35, 98, 70,80,53],
          // ['October', 73, 79, 85,90,64],
          // ['November', 58, 43, 60,53,56],
          // ['December', 45, 55, 35,54,66],
        ]); 

        var options = {
        
          chart: {
          
            subtitle: 'Monthly Usage' ,
          },
          bars: 'vertical' // Required for Material Bar Charts.
        };

        var chart = new google.charts.Bar(document.getElementById('barchart_material'));

        chart.draw(data, google.charts.Bar.convertOptions(options));
      }
      $(window).resize(function(){
          drawChart();
      });
        
    </script>
  </head>
  <body>

    <div id="barchart_material" class="position-sticky" style="height:300px; width: 1100px;"  ></div>
 
    
  
  </body>
</html>
