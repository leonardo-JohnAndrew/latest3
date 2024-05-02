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
           
         } select{
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
<form action="remarks.php"  method="post">
   <div class="container-fluid">
    <div class="col mt-3  me-5 mb-5 text-secondary  " style="width: 100%; min-height:550px">
      <p class="fs-2 fw-lighter" style="font-style: italic ;">Pending</p>
      <div style="max-height:500px;overflow-y:scroll">
       <table class="table table-striped "  >
         <thead   style="background-color:#0e2238; color:white">
           <th  class=" fs-6 fw-medium"style="">NO.</th>
           <th  class=" head fs-6 fw-medium">Laboratory</th>
           <th  class=" head  fs-6 fw-medium">Date&Time
           </th>
           <th  class=" head  fs-6 fw-medium">Classification</th>
           <th  class=" head  fs-6 fw-medium">Code</th>
           <th  class=" head  fs-6 fw-medium">Transaction/Report</th>
           <th  class=" head  fs-6 fw-medium">Sender</th>
           <th  class=" head fs-6 fw-medium">Remarks</th>
         </thead>
         <div class="scroll">
         <tbody>
         <?php 
          //query 
          //condition
         ?>
           <tr>
             <td>1<?php ?></td>
             <td><input type="text" name="[]" value="<?php ?>" size="10px"></td>
             <td><input type="text" name="[]" value="<?php ?>" size="10px"></td>
             <td><input type="text" name="[]" value="<?php ?>" size="10px"></td>
             <td><input type="text" name="[]" value="<?php ?>" size="10px"></td>
             <td><input type="text" name="[]" value="<?php ?>" size="10px"></td>
             <td><input type="text" name="[]" value="<?php ?>" size="10px"></td>
             <td><select style="font-size: smaller;" name="type[]" value = "none">
              <option selected>Remarks</option>
              <option value="Not Working">Not Working
              <option value="Malfunction">Malfunction
              <option value="Other">Other
              <option value="Fixed">Fixed
              </option>
             </select></td>
           </tr>
            <?php ?>
         </tbody>
         </div>
      </table>
      </div>
    </div>
    
  </div>
  <div class = "btn-group" style="margin-left:85%">
       <input type="submit" name = "submit" value = "SUBMIT" id = "Submit"> 
      </div>
 <?php 
   include('./footer.php')
   ?>
 

 </form>
</body>
</html>