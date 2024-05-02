<?php 
require('./database.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
    <style>
   .content{
        height: 300px;
        border-color:#4376A3;
        border-style: solid;
        border-width: 1px  1px 1px 1px;
        box-shadow: 0px 5px 1px 2px lightslategray;
        border-radius: 20px 20px 20px 20px;
    
       }  .scroll{
        overflow-y: scroll;
        max-height:360px;
        
       }
    
    </style>
</head>
<body>
   <form action="./update.php " method="post">
   <div class=" row container-fluid  ms-2 mt-3 "  >
   <!-- <div class="ms-5 col-11 content text-center" style="height: 500px;margin-bottom:130px" >
       <p class="mt-3 fw-normal fs-2" style="font-style: italic;font-size:larger;color:#4376A3">Happening Now</p>
         <div class=" table"   style="max-height: 430px;overflow-y:scroll ">
          <table class="table table-striped ">
         <thead style="background-color:#0e2238; color:white">
            <th>Laboratory</th>
            <th>Course & Section</th>
            <th>Event or Class</th>
            <th>Status</th>
            <th>Faculty Name</th>
         </thead>
         <tbody>
          <tr>


          </tr>
         </tbody>

          </table>
 
         </div> -->  
        <!-- </div> -->
     
    
       <div class="ms-5 mb-3  col-11  content" id="graph" style="height:400px;max-width:1200px;overflow-x:scroll; ">
       <p class="mt-3 fw-normal" style="font-style: italic;font-size:larger;color:#4376A3">Numbers of Monthly User</p>

     
   <?php include('./xample.php')  ?>
  
       </div>
       <!-- <div class="ms-4 mb-3 col-sm content" >
       <p class="mt-3 fw-normal" style="font-style: italic;font-size:larger;color:#4376A3">Pendings</p>
         <div class="scroll">

         </div>
       </div>
        -->
    <div class="row ms-2">
      <div class="ms-3 col-8 content  ">
      <p class="mt-3 fw-normal" style="font-style: italic;font-size:larger;color:#4376A3">Under Maintenance</p>
  
   
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<div id="carouselWithCaptions" class="carousel slide" data-bs-ride="carousel" >
  <ol class="carousel-indicators">
    <li data-bs-target="#carouselWithCaptions" data-bs-slide-to="0" class="active"></li>
    <li data-bs-target="#carouselWithCaptions" data-bs-slide-to="1"></li>
    <li data-bs-target="#carouselWithCaptions" data-bs-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="pic/background_1.png" class="d-block w-100" alt="Slide 1">
      <div class="carousel-caption d-none d-sm-block">
        <h5>First slide label</h5>
        <p>Nulla vitae elit libero, a pharetra augue mollis interdum.</p>
      </div>
    </div>
    <div class="carousel-item">
     
      <div class="carousel-caption d-none d-sm-block">
        <h5>Second slide label</h5>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
      </div>
    </div>
    <div class="carousel-item">
      <img src="pic/footer3.png" class="d-block w-100" alt="Slide 3">
      <div class="carousel-caption d-none d-sm-block">
        <h5>Third slide label</h5>
        <p>Praesent commodo cursus magna, vel scelerisque nisl consectetur.</p>
      </div>
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselWithCaptions" role="button" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselWithCaptions" role="button" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </a>
</div>
</body>
</html>
    </div>

   
      
       <div class="ms-3 col-sm content">
       <p class="mt-3 fw-normal" style="font-style: italic;font-size:larger;color:#4376A3">Recent Activity</p>
        <div class="" style="max-height: 200px; overflow-y:scroll">
        <?php  $sql = "SELECT * from Recent order by no desc";
                $query = mysqli_query($sqlconnect,$sql);
                while($rows = $query->fetch_assoc()){
                ?> 
             
                  <h6 style="color:#0e2238 ; font-size:11pt;font-weight:100px">	&#8226;
                 <?php echo $rows['name'] ?>
                </h6>
                <div class="input-group">
                <h6 class="ms-1 me-1 fw-bold" style="font-size: 11pt;"><?php echo $rows['Transaction']." ".$rows['equipment']?></h6>      
                 <h6 class="me-1">Action:</h6><h6  class="fw-bold" style="font-size: 11pt;"><?php echo$rows['action']."." ?></h6>
              </div>
             <?php
            
                }
                  ?>

        </div>
       </div>
    </div>
        
   </div>

 <?php 
   include('./footer.php');
   
   ?>
   

</form>

</body>
</html>