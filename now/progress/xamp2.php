<?php  require"./database.php";
if(isset($_GET['respon'])){
   $id = $_GET['num'];
   $name = $_GET['name']; 
   $equip = $_GET['class']?> 
   
   <input type="text" hidden id= "name" value="<?php echo $name ?>" name = "name">
      
    <div class="mb-3">
         <div class="input-group">
          <h5 class="fw-light">Request No:</h5>
         <input  style="font-size:15pt;" id ="id" type="text" value="<?php echo $id ?>" name = "id">
         </div>
    </div>
   <div class="mb-3">
   <h5>Laboratory</h5>
   <select class="form-control" id = "labname" style="font-size: smaller;" name="labname">
   <!-- <option value="" selected = "Select Lab"></option> -->
   <?php  $sql1 = "SELECT Laboratory from inventory where laboratory is not null";
               $quey1 = mysqli_query($sqlconnect,$sql1);
             while($rs = $quey1->fetch_assoc()){?>
         <option value="<?= $rs['Laboratory']?>"><?php echo $rs['Laboratory'] ?></option>
       <?php  } ?>
   </select>
  </div>

  <div class="mb-3">
  <h5>Classification</h5>
  <select class="form-control" id = "classname" style="font-size: smaller;" name="classname" >
  <option value="<?php echo $equip ?>"><?php echo $equip ?></option>
   <?PHP $query = "SELECT distinct classifications from codes " ;
           $sqlquery = mysqli_query($sqlconnect,$query);
           while ($rows = $sqlquery->fetch_assoc()) { 
             ?>
             <option value="<?php echo $rows['classifications'] ?>"><?php echo $rows['classifications'] ?></option>
          <?php }?>
   </select>
  </div>
 
      <div class="mb-3">
      <button type="button" class="btn butn" style="color: white;" >Codes</button>

      </div>
      <div class="mb-3">
    <div class="select">
         <option value=""></option>
</div>
  </div>

  <div class="mb-3">
     <h5>Remark</h5>
     <select style="font-size: smaller;" id="remark"  name="remark" class="form-select" >
     <option value="" selected= ""></option>
    <option value="Approved">Approved</option>
    <option value="Canceled">Canceled</option>
    <option value="Declined">Declined</option>
         </option>
         </option>
        </select>
     </div>


     <div class="mb-3">
    <h5>Password</h5>
       <input type="password" class="form-control" name ="pass"  id="pass" style="height: 35px;" placeholder="Enter your password: ">
     </div>


     <script src = "jquery.js"></script>
<script>
  $(document).ready(function() {
    $(".btn").on("click", function() {
      var labname = $('#labname').val();
      var id =$('#id').val();
      var classname = $('#classname').val();
      var name = $('#name').val();
      var pass = $('#pass').val();
      var remark = $('#remark').val();
        $.ajax({
            url:"xamp.php",
            type : "GET",
            data:
            {
              'lab':labname,
              'class':classname,
              'id':id,
              'name':name,
              'pass':pass,
              'remark':remark
            
            },
            success:function(data){
              $(".select").html(data)
         
            }
        
        })
      
        
    });
});

</script>

    <?php
} if(isset($_GET['view'])){
   $id = $_GET['num'];
   $class =$_GET['class'];
  $sql = "SELECT DISTINCT Laboratory as lab   from barrowed where no_id = $id";
  $sqlq = mysqli_query($sqlconnect,$sql);
  
  while($rs = $sqlq->fetch_assoc()){
      $lab[] = $rs['lab'];
      
  }   ?>
  <input type="text" name="id" value="<?php echo $id ?>" hidden>
  <input type="text" name="class" value="<?php echo $class ?>" hidden>
  <input type="text" name="lab" value="<?php echo $lab[0] ?>" hidden>

    <div class="mb-3">
    <h5>Codes: </h5> 
    <select name="range[]" class= form-control multiple  style="height:300px;overflow-y:scroll" >
    
    <?php  $sql1 = "SELECT code from barrowed where no_id ='$id' and remark is null ";
                       $quey1 = mysqli_query($sqlconnect,$sql1);
                     while($rs = $quey1->fetch_assoc()){?>
               //  <option value="<?= $rs['code']?>"><?php echo $rs['code'] ?></option>
               <?php  }  
               ?>
    </select>
      
    </div>
  

  <?php
}
if(isset($_POST['responre'])){
  $num = $_POST['num'];

  $code = $_POST['code'];
  $name = $_POST['name'];
  $class = $_POST['class'];
 ?>
  <input type="text" name="id" value="<?php echo $id ?>" hidden>
  <input type="text" name="lab" value="<?php echo $code ?>" hidden ><input type="text" name="rename" value="<?php echo $name ?>" hidden >

  <h5>Report No: <input type="text" name = "id" value="<?php echo $num ?>"></h5>


    <div class=" mt-3 mb-3">  
     <h5>Classification: <h5>
     <input type="text" name="classname" class="form-control" style="height: 40px;;" value="<?php echo $class ?>" readonly >
     <!-- <select name="classifications" name="classname" id="" class="form-control" style="height:40px" >
      <option value="<?php //echo $class ?>"><?php  //echo $class ?></option>
      <?PHP  //$querycode = "SELECT distinct(classifications)  as unit_code from codes"; 
          //  $sqlcode = mysqli_query($sqlconnect,$querycode) ;
          //  while($rs = $sqlcode->fetch_assoc()){?>
             <option value="<?php //echo $rs['unit_code']?>"><?php // echo $rs['unit_code']  ?></option>
          <?php // }?>
    </select> -->
     </div>
         
     <div class="mt-3 mb-3">
     
     <h5>Codes: <h5>
      <!-- <input type="text" name="codes" class="form-control" style="height: 40px;;" value="<?php // echo $code?>" > -->
     <select name="codes[]" id="" class="form-control"  multiple style="height:300px;overflow-y:scroll"  >
       <?PHP  $querycode = "SELECT code from report where name = '$name' and remark is null and laboratory = '$code'"; 
             $sqlcode = mysqli_query($sqlconnect,$querycode) ;
              while($rs = $sqlcode->fetch_assoc()){?>
              <option value="<?php  echo $rs['code']?>"><?php echo $rs['code']  ?></option>
           <?php  }?>
     </select>
             </div>

             <div class="mb-3">
       <h5>Remark:</h5>
       <select style="font-size: smaller;height:40px" id="remark"  name="remark" class="form-select"  required>
    <option value="Malfunction">Malfunction</option>
    <option value="Not Working">Not Working</option>
    <option value="Fixed">Fixed</option>
    <option value="Other">Other</option>
         </option>
         </option>
        </select>
     </div>
    
     <div class="mb-3">
       <h5>Password:</h5>
       <input type="password" class="form-control" name ="pass"  id="pass" style="height: 35px;" placeholder="Enter your password: " required>
     </div>
  

  <?php
}
if(isset($_POST['Fixed'])){
   $id = $_POST['num'];
    $date =$_POST['date'];
    $lab = $_POST['labs'];
   
    $class = $_POST['class'];
    $name = $_POST['name'];
   ?>
    <input type="text" name = "name" value="<?php echo $name  ?>" hidden>
  <h5>Report No: <input type="text" name = "id" value="<?php echo $id ?>"></h5>
 <div class="mt-3">
  <h5>Class</h5>
 <input type="text" class="form-control" name ="class"  id="pass" style="height: 35px;"  value="<?php echo $class ?>">
 </div>
 <div class="mt-3">
  <h5>Laboratory
  </h5>
 <input type="text" class="form-control" name ="lab"  id="pass" style="height: 35px;"  value="<?php echo $lab ?>">
 </div>
 <div class="mt-3">
  <h5>Code</h5>
  <select name="codes[]" class="form-control"  multiple style="height:300px;overflow-y:scroll"  >
       <?PHP  $querycode = "SELECT code from report where  name ='$name' and remark != 'Fixed' and laboratory= '$lab' or remark is null"; 
             $sqlcode = mysqli_query($sqlconnect,$querycode) ;
              while($rs = $sqlcode->fetch_assoc()){?>
              <option value="<?php  echo $rs['code']?>"><?php echo $rs['code']  ?></option>
           <?php  }?>
     </select>
 </div>
 <div class="mt-3">
  <h5>Date Reported</h5>
 <input type="text" class="form-control" name ="dates"  id="pass" style="height: 35px;"  value="<?php echo $date ?>">
 </div>
  <div class="mb-3 mt-3">
       <h5>Password:</h5>
       <input type="password" class="form-control" name ="pass"  id="pass" style="height: 35px;" placeholder="Enter your password: " required> 
     </div>
  
<?php }
if (isset($_POST['viewreport'])){
  $id = $_POST['num'];
    $date =$_POST['date'];
    $lab = $_POST['labs'];
   
    $class = $_POST['class'];
    $name = $_POST['name'];
   ?>
    <input type="text" name = "name" value="<?php echo $name  ?>" hidden>

 <div class="mt-3">
  <h5>Class</h5>
 <input type="text" class="form-control" name ="class"  id="pass" style="height: 35px;"  value="<?php echo $class ?>" >
 </div>
 <div class="mt-3">
  <h5>Laboratory
  </h5>
 <input type="text" class="form-control" name ="lab"  id="pass" style="height: 35px;"  value="<?php echo $lab ?>" >
 </div>
 <div class="mt-3">
  <h5>Code</h5>
  <select name="codes[]" class="form-control"  multiple style="height:300px;overflow-y:scroll"  >
       <?PHP  $querycode = "SELECT code ,remark from report where  name ='$name'  and laboratory= '$lab'"; 
             $sqlcode = mysqli_query($sqlconnect,$querycode) ;
              while($rs = $sqlcode->fetch_assoc()){?>
              <option value="<?php  echo $rs['code']?>"><?php echo $rs['code']." ".$rs['remark']  ?></option>
           <?php  }?>
     </select>
 </div>

 <?php 

} if(isset($_POST['addnum'])){ ?>
  <div class="mb-3">
    <h5>Classification: </h5>
    <select name="class" id="" class="form-control" style="height: 40px ;font-size:smaller" >
       <?PHP  $querycode = "SELECT Classifications as code from equipment"; 
             $sqlcode = mysqli_query($sqlconnect,$querycode) ;
              while($rs = $sqlcode->fetch_assoc()){?>
              <option value="<?php  echo $rs['code']?>"><?php echo $rs['code']  ?></option>
           <?php  }?>
     </select>
  </div>

  <div class="mb-3">
    <h5>Laboratory: </h5>
    <select name="lab" id="" class="form-control" style="height: 40px ;font-size:smaller" >
       <?PHP  $querycode = "SELECT distinct(laboratory) as  code from codes"; 
             $sqlcode = mysqli_query($sqlconnect,$querycode) ;
              while($rs = $sqlcode->fetch_assoc()){?>
              <option value="<?php  echo $rs['code']?>"><?php echo $rs['code']  ?></option>
           <?php  }?>
     </select>
  </div>

  <div class="mb-3">
    <h5>Quantity: </h5>
    <input  type="number" name="no" class="form-control" required >
  </div>



  <?php
}  
if(isset($_POST['deletnum'])){
?>
  <div class="mb-3">
  <h5>Classification: </h5>
    <select name="class" id="classname" class="form-control" style="height: 40px ;font-size:smaller" >
       <?PHP  $querycode = "SELECT Classifications as code from equipment"; 
             $sqlcode = mysqli_query($sqlconnect,$querycode) ;
              while($rs = $sqlcode->fetch_assoc()){?>
              <option value="<?php  echo $rs['code']?>"><?php echo $rs['code']  ?></option>
           <?php  }?>
     </select>
  </div>
  <div class="mb-3">
  <h5>Laboratory: </h5>
    <select name="lab" id="labname" class="form-control" style="height: 40px ;font-size:smaller" >
       <?PHP  $querycode = "SELECT distinct(laboratory) as  code from codes"; 
             $sqlcode = mysqli_query($sqlconnect,$querycode) ;
              while($rs = $sqlcode->fetch_assoc()){?>
              <option value="<?php  echo $rs['code']?>"><?php echo $rs['code']  ?></option>
           <?php  }?>
     </select>
  </div>
  <div class="mb-3">
      <button type="button" class="btn butn" style="color: white;background-color:#0e2238; " >Codes</button>

      </div>
      <div class="mb-3">
    <div class="select">
         <option value=""></option>
</div>
  </div>

<script>
  $(document).ready(function() {
    $(".btn").on("click", function() {
      var labname = $('#labname').val();
      var classname = $('#classname').val();
     
        $.ajax({
            url:"ecode.php",
            type : "GET",
            data:
            {
              'lab':labname,
              'class':classname,
            
            
            },
            success:function(data){
              $(".select").html(data)
         
            }
        
        })
      
        
    });
});

</script>

  <?php } 
  if(isset($_POST['addclass'])){?>
 <div class="mb-3">
  <h5>Classification: </h5>
     <input type="text" name = "class" class="form-control" style="height: 40px;" required > 
  </div>
   
  <div class="mb-3">
  <h5>Laboratory: </h5>
    <select name="lab" id="labname" class="form-control" style="height: 40px ;font-size:smaller" >
       <?PHP  $querycode = "SELECT distinct(laboratory) as  code from codes"; 
             $sqlcode = mysqli_query($sqlconnect,$querycode) ;
              while($rs = $sqlcode->fetch_assoc()){?>
              <option value="<?php  echo $rs['code']?>"><?php echo $rs['code']  ?></option>
           <?php  }?>
     </select>
  </div>
     
  <div class="mb-3">
    <h5>Quantity: </h5>
    <input  type="number" name="no" class="form-control" style="height: 40px;" required>
  </div>
 
    <?php
  } if(isset($_POST['deleteclass'])){ ?>
       
       <div class="mb-3">
  <h5>Classification: </h5>
    <select name="class" id="classname" class="form-control" style="height: 40px ;font-size:smaller" >
       <?PHP  $querycode = "SELECT Classifications as code from equipment"; 
             $sqlcode = mysqli_query($sqlconnect,$querycode) ;
              while($rs = $sqlcode->fetch_assoc()){?>
              <option value="<?php  echo $rs['code']?>"><?php echo $rs['code']  ?></option>
           <?php  }?>
     </select>
  </div>
   
  <div class="mb-3">
 <?php
  }
  ?>