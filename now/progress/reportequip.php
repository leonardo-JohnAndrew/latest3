<?php require "./database.php" ?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Unit Request Form</title>
<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f4f4f4;
        margin: 0;
        padding: 0;
    }

    .container {
        width: 400px;
        margin: 50px auto;
        background-color: #fff;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0px 0px 10px 0px rgba(0,0,0,0.1);
    }

    h2 {
        text-align: center;
        margin-bottom: 20px;
    }

    label {
        display: block;
        margin-bottom: 5px;
        margin-left: 150px;
        font-weight: bold;
    }

    .styled-select {
        width: 80%;
        margin-left:140px;
        padding: 10px;
        margin-bottom: 30px;
        border: 1px solid #ccc;
        border-radius: 5px;
        box-sizing: border-box;
    }

    .text-input {
        width: 80%;
        padding: 10px;
        margin-left: 140px;
        margin-bottom: 30px;
        border: 1px solid #ccc;
        border-radius: 5px;
        box-sizing: border-box;
    }

    .submit-btn {
        background-color: #0e2238;
        color: white;
        padding: 12px 20px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        margin-left: 350px;
        margin-bottom:  100px; ;
        width: 50%;
        margin-top: 80px;
    }

    .submit-btn:hover {
    background-color: #fff;
    color: #0e2238;
    border: 1px solid #0e2238;
    }
    

    
</style>
</head>
<body>

<div class="container-fluid me-3 mt-5">
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
    <h2>Equipment Report Form</h2>
    <form action="add.php" method="POST" id="unitRequestForm">
 

        <label for="number_of_units">Name:</label>
        <input type="text" name="name" id="name" class="text-input" value="<?php echo $_SESSION['name']?>">  
          
    
        <label for="unit_classification">Equipment:</label>
        <select name="equip" id="equip"   onchange="checkOther(this)" class="styled-select" required>
           
         <?php  $sql = "SELECT distinct classifications as class from codes"; 
                 $sqlquery = mysqli_query($sqlconnect,$sql);
                 while($rows = $sqlquery->fetch_assoc()){ ?>

                     <option value="<?php echo $rows['class'] ?>"><?php echo $rows['class'] ?></option>
              <?php   } ?>
        </select>
        <input type="text" name="other_unit_class" id="other_unit_classification" style="display:none;" placeholder="Specify Other Unit/Classification" class="text-input">
           
        <label for="lab">Laboratory:</label>
        <select name="lab" id="lab"   onchange="checkOther(this)" class="styled-select" required>
       
         <?php  $sql = "SELECT distinct laboratory as class from codes"; 
                 $sqlquery = mysqli_query($sqlconnect,$sql);
                 while($rows = $sqlquery->fetch_assoc()){ ?>

                     <option value="<?php echo $rows['class'] ?>"><?php echo $rows['class'] ?></option> 
              <?php   } ?>
        </select></br>
         
        <button type="button" class="btn butn mb-3"  style="color: white; margin-left:12%" >Codes</button>

        <div class="select styled-select">
         <option value=""></option>
       </div>
      
       <label for="number_of_units">Problem:</label>
        <input type="text" name="prob" id="prob" class="text-input" >  
         

        <input type="submit" value="Submit" name="report" class="submit-btn">
    </form>
</div>



</body>
<script src = "jquery.js"></script>
<script>
  $(document).ready(function() {
    $(".btn").on("click", function() {
      var labname = $('#lab').val();
      var classname = $('#equip').val();
      var name = $('#name').val();
     var prob = $('#prob').val();
    
        $.ajax({
            url:"code2.php",
            type : "POST",
            data:
            {

              'lab':labname,
              'class':classname,
              //'id':id,
             // 'name':name,
              //'pass':pass,
            //  'remark':remark
            
            },
            success:function(data){
              $(".select").html(data)
         
            }
        
        })
      
        
    });
});

</script>

</html>
