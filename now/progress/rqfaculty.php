<?php 
$name =   $_SESSION['name'];
require('./database.php')
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
          input{
            border: 0px solid;
            height: 20px;
            outline:none;
            background:transparent;
           
         }select{
          outline: 5px;
          outline-color: #0e2238;
          width: 120px;
          height:25px;
          min-width:  120px;
          gap: 0;
         } #Submit{
         background: linear-gradient(90deg, #4376A3 0%, #192C3D 100%);
         width: 150px;
         height: 30px;
         /* top: 910px;
         gap: 0px; */
         border-radius: 25px 25px 25px 25px;
         opacity:0px;
         color:white;
       }  thead {
        position: sticky;
        top:0px
       }
    </style>
</head>
<body>
<form action="add.php"  method="get">
   <div class="container-fluid">
    <div class="col mt-3  me-5 mb-5 text-secondary  " style="width: 100%; min-height:550px">
      <p class="fs-2 fw-lighter" style="font-style: italic ;">Units Request
     </p>
     <div style="max-height:500px;overflow-y:scroll">
       <table class="table table-striped "  >
         <thead  style="background-color:#0e2238; color:white">
         <th></th>
           <th>No</th>
           <th  class=" fs-6 fw-medium"style="">Classification</th>
           <th class="fs-6 fw-medium" >No of Units</th>
           <th  class=" head fs-6 fw-medium">Request by</th>
           <th  class=" head  fs-6 fw-medium">Office
           </th>
           <th  class=" head  fs-6 fw-medium">Purpose</th>
           <th  class=" head  fs-6 fw-medium">Date/Time Request</th>
           <th  class=" head  fs-6 fw-medium">Remarks</th>
           <th  class=" head  fs-6 fw-medium">Unit Code</th>
           <th  class=" head fs-6 fw-medium">Recieved</th>
           <th  class=" head fs-6 fw-medium">Returned</th>
         </thead>
         <div class="scroll">
         <tbody>
         <?php 
           $sqlaccounts ="SELECT * from unit_request where request_by = '$name'";
           $result = $sqlconnect->query($sqlaccounts);
           if(!$result){
               echo"error select";
           }
           while($rows = $result->fetch_assoc()){
         ?>
           <tr>
           <td> <input type="checkbox" name ="key[]" value="<?php echo $rows['No'] ?>"></td>
           <td><input type="text" name="no_<?= $rows['No'] ?>" value="<?php  echo $rows['No'] ?>" size="10px" readonly></td>
            <td><input type="text" name="class_<?= $rows['No'] ?>" value="<?php  echo $rows['classification'] ?>" size="10px" readonly></td>
             <td><input type="text" name="num_<?= $rows['No'] ?>" value="<?php  echo $rows['no_units'] ?>" size="10px" readonly></td>
             <td><input type="text" name="name_<?= $rows['No'] ?>" value="<?php echo $rows['request_by'] ?>" size="20px" readonly></td>
             <td><input type="text" name="" value="<?php echo $rows['office'] ?>" size="10px" readonly></td>
             <td><input type="text" name="" value="<?php  echo $rows['purpose'] ?>" size="10px" readonly></td>
             <td><input type="text" name="" value="<?php  echo $rows['date_time_requested'] ?>" size="20px" readonly></td>
             <td><?php echo $rows['remarks'] ?></td> 
             <td><input type="text" name="code_<?= $rows['No']?>" value="<?php echo $rows['unit_code'] ?>" size="10px" readonly></td>
             <td><input type="text" name="received_<?= $rows['No'] ?>" value="<?php echo $rows['received'] ?>" size="10px" readonly> </td>
             <td><input type="text" name="return_<?= $rows['No'] ?>" value="<?php echo$rows['returned'] ?>" size="10px"></td>
             
            <?php }?>
         </tbody>
         </div>
      </table>
     </div>
    </div>
  </div>
 <?php 
   include('./footer.php');


   ?>
 

 </form>
</body>
</html>