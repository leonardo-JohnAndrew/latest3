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
           
         }  #Submit{
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
       }.butn{
        background: linear-gradient(90deg, #4376A3 0%, #192C3D 100%);
         width: 80px;
         height: 25px;
         /* top: 910px;
         gap: 0px; */
         border-radius: 25px 25px 25px 25px;
         font-size: 9pt;
         padding :0px 2px 2px 2px;
         opacity:0px;
         color:white;
       } #btn{
        background: linear-gradient(90deg, #4376A3 0%, #192C3D 100%);
         width: 500px;
         height: 40px;
         /* top: 910px;
         gap: 0px; */
         border-radius: 25px 25px 25px 25px;
         margin-left: 90%;
         font-size: 14pt;
         padding :6px 6px 6px 6px;
         opacity:0px;
         color:white;
       }
    </style>
    
</head>

<body>
<form action="add.php"  method="POST">
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
    <p class="fs-2 fw-lighter" style="font-style: italic ; ">Units Reports
     </p>
     <a href="adminreportlist.php"  id ="btn" >Report List</a>
     <div class="mt-3"  style=" max-height:500px;overflow-y:scroll">
       <table class="table table-striped "  >
         <thead  style="background-color:#0e2238; color:white">
           <th  class=" fs-6 fw-medium"style="">NO.</th>
           <th  class=" head  fs-6 fw-medium">Classification</th>
           <th  class=" head  fs-6 fw-medium">Laboratory</th>
           <th  class=" head  fs-6 fw-medium">Problem</th>
           <th  class=" head  fs-6 fw-medium">Date Reported</th>
           <th  class=" head  fs-6 fw-medium">Reported by</th>
           <th  class=" head  fs-6 fw-medium">Action</th>
         </thead>
         <div class="scroll">
         <tbody>
         <?php 
          //query 
          //condition
         ?>
           <tr>
           <?php 
           $sqlaccounts ="SELECT * from unit_reports  where remarks != 'Fixed' or remarks is null  order by No desc";
           $result = $sqlconnect->query($sqlaccounts);
           if(!$result){
               echo"error select";
           }
           while($rows = $result->fetch_assoc()){

         ?>
           <tr>
           <td><input type="text" class="no" value="<?php  echo $rows['No'] ?>" size="3px" readonly></td>
            <td><input type="text" class="equip" name="class_" value="<?php  echo $rows['classification'] ?>" size= "10px" readonly></td>
             <td><input type="text"  class = "code" name="num_" value="<?php  echo $rows['laboratory'] ?>" size="15px" readonly > </td>
             <td><input type="text"  name="name_" value="<?php echo $rows['problem'] ?>" size="20px" readonly></td>
             <td><input type="text" name = ""value="<?php echo $rows['date_report'] ?>" size="15px" readonly></td>
             <td><input type="text"  class="name" value="<?php  echo $rows['reported_by'] ?>" size="17px" readonly></td>
            <td> <button type="button"  id = "modal " class="butn  btn " data-bs-toggle="modal" data-bs-target="#example" data-bs-whatever="@getbootstrap">Respond</button> </td>

            <?php }?>
           </tr>
            <?php ?>
         </tbody>
         </div>
      </table>
     </div>
     
    </div>
  </div>
  <div class="modal fade" id="example" tabindex="-1" aria-labelledby="examplelabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header " style="background-color:#0e2238;">
        <h1 class="modal-title fs-5" id="examplelabel" style="color: white;">Respond</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"  ></button>
      </div>
      <div class="modal-body">
         <div class="display">

         </div>
      </div>
      <div class="modal-footer">
       <input type="submit" class = "butn" name = "submit_report" value="SUBMIT"  >
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
           $(".btn").click(function(e){
            e.preventDefault();
            var id= $(this).closest('tr').find('.no').val();
            var clas = $(this).closest('tr').find('.equip').val();
          var code = $(this).closest('tr').find('.code').val();
        
            var name =$(this).closest('tr').find('.name').val();
           $.ajax({
            method:"POST",
            url: "xamp2.php",
            data:{
               'responre':true ,
              'code':code,
               'num':id ,
               'name':name,
               'class':clas,
               

            },
            success:function(response){
           $('.display').html(response);
          $('#example').modal('show');
            }

           })
            });
           
            
        });

    </script>
 

 </form>
</body>
</html>