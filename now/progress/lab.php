<?php 
require('./database.php');

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
            height: 30px;
      
            outline:none;
            background:transparent;
           
         } select{
          outline: 5px;
          outline-color: #0e2238;
          width: 120px;
          height:25px;
          min-width:  120px;
          gap: 0;
         } #Submit{
         background: linear-gradient(90deg, #4376A3 0%, #192C3D 100%);
         width: 120px;
         height: 30px;
         /* top: 910px;
         gap: 0px; */
         border-radius: 25px 25px 25px 25px;
         opacity:0px;
         color:white;
       }  thead {
        position: sticky;
        top:0px
       }  .ans{
          border: 1px solid;
          border-color: #0e2238;
          outline: 2px;
          height: 31px;
          
       } label{
          font-size: 12pt;
          padding: 5px;
          font-weight: 700;
          color:  #0e2238;
       }#btn{
         background: linear-gradient(90deg, #4376A3 0%, #192C3D 100%);
         width: 90px;
         height: 30px;
         font-size: 10pt;
         /* top: 910px;
         gap: 0px; */
         border-radius: 25px 0px 0px 25px;
         opacity:0px;
         color:white;
       }#btun{
         background: linear-gradient(90deg, #4376A3 0%, #192C3D 100%);
         width: 90px;
         height: 30px;
         font-size: 10pt;
         /* top: 910px;
         gap: 0px; */
         border-radius: 0px 25px 25px 0px;
         opacity:0px;
         color:white;
       }
    </style>
    </style>
</head>
<body>
<form action="btn.php"  method="POST">
   <div class="container-fluid">
    <div class="col mt-3  me-5 mb-5 text-secondary  " style="width: 100%; min-height:550px">
    <?php 
              if(isset($_SESSION['status'])){
                ?>
                 <div class="alert alert-primary alert-dismissible fade show "  role="alert">
                   <strong>STATUS: </strong> <?php echo $_SESSION['status']  ?>
                   <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                 </div>
                <?php
                      unset($_SESSION['status']);
              }
            ?>
      <p class="fs-2 fw-lighter" style="font-style: italic ;">Laboratory</p>
    
      <div style="max-height:500px;overflow-y:scroll">
       <table class="table table-striped" style="column-gap: 5px;"  >
         <thead   style="background-color:#0e2238; color:white">
                  
                   <th class=" head  fs-6 fw-medium ">Classifications</th>
        <?php  $sqlaccounts ="SELECT Laboratory from inventory where Laboratory is not Null";
           $result = $sqlconnect->query($sqlaccounts);
            while(  $rows = $result->fetch_assoc()){
              $lab[] = $rows['Laboratory'];
              ?>
               
               <th class="head  fs-6 fw-medium" ><?php echo $rows['Laboratory']." Laboratory"  ?></th>
                 
           <?php };
           $_SESSION ['lab'] = $lab ;
          
           ?>
          
         </thead>
         <tbody>
           
            <?php 
            $query  ="SELECT Laboratory from inventory where Laboratory is not null ";
            $rs = $sqlconnect->query($query);
            while ($fieldInfo = mysqli_fetch_array($rs)){
              $data[] = $fieldInfo[0];
            };
            $_SESSION ['data'] = $data;
            $col = count($data);
            $qury = "SELECT * FROM equipment" ;
            $rs = $sqlconnect->query($qury);
            $count = mysqli_num_rows($result);
            while($rows = $rs->fetch_assoc()){
              $class [] = $rows['Classifications'] ;
              ?>
              <tr>
                 
                <td> <?=$rows['Classifications']?></td>
              <?php
            for($i = 0 ;$i <$col; $i++){
            ?>
           
          <td><input type="text" name="<?=$rows['No']?>[]" value="<?= $rows["$data[$i]"]?>" readonly></td>
            
           <?php 
          }?>
              </tr>
          <?php
          } ?>
           
         
         </tbody>
         <?php $_SESSION['class'] = $class  ?>
         </div>
      </table>
      </div>
    </div>
    
  </div>
  <!-- <div class = "btn-group" style="margin-left:85%">
       <input type="submit" name = "submit" value = "UPDATE" id = "Submit"> 
      </div> -->
      <div class="btn-group " style="margin-left:82% ;">
        <input type="submit"  name = "add"  value= "ADD" id="btn"  >
        <input type="submit"  name = "delete"  value= "DELETE" id="btun"   >
      </div>



      
  <div class="modal fade" id="add" tabindex="-1" aria-labelledby="add" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header " style="background-color:#0e2238;">
        <h1 class="modal-title fs-5" id="add" style="color: white;">Add Quantity</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"  ></button>
      </div>
    
      <div class="modal-body">
         
         <div class="display">

         </div>
      </div>
      <div class="modal-footer">
       <input type="submit"  id ="Submit" name = "submit" value="SUBMIT"  >
      </div>
    </div>
  </div>
</div>

     
<div class="modal fade" id="delete" tabindex="-1" aria-labelledby="delete" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header " style="background-color:#0e2238;">
        <h1 class="modal-title fs-5" id="delete" style="color: white;">Delete Quantity</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"  ></button>
      </div>
    
      <div class="modal-body">
         
         <div class="displaydelete">

         </div>
      </div>
      <div class="modal-footer">
       <input type="submit"  id ="Submit" name = "delete" value="SUBMIT"  >
      </div>
    </div>
  </div>
</div>

  
 <?php 
   include('./footer.php')
   ?>
 
 <script src = "jquery.js"> 
</script>
    <script>
        $('document').ready(function(){
           $("#btn").click(function(e){
            e.preventDefault();

       
            var id = $(this).closest('tr').find('.no').val();
             var clas = $(this).closest('tr').find('.class').val();
             var name = $(this).closest('tr').find('.name').val();
           var date = $(this).closest('tr').find('.date').val();
           //var code = $(this).closest('tr').find('.code').val();
           var labs = $(this).closest('tr').find('.labs').val();
           
           $.ajax({
            method:"post",
            url: "xamp2.php",
            data:{
             'addnum':true ,
            //    'class':clas,
            //  'date':date,
            //    'num':id ,
              
            //    'labs':labs,
            //    'name':name,
               

            },
            success:function(response){
           $('.display').html(response);
          $('#add').modal('show');
            }

           })
       
             });
        });


     $(document).ready(function() {
       $('#btun').click(function(e){
           e.preventDefault();

             
           $.ajax({
            method:"post",
            url: "xamp2.php",
            data:{
             'deletnum':true ,
            //    'class':clas,
            //  'date':date,
            //    'num':id ,
              
            //    'labs':labs,
            //    'name':name,
               

            },
            success:function(response){
           $('.displaydelete').html(response);
          $('#delete').modal('show');
            }

           })
           
       })
     })
        
    </script>
 </form>
</body>
  


</html>