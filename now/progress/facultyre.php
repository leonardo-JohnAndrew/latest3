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
    <h2>Unit Request Form</h2>
    <form action="add.php" method="get" id="unitRequestForm">
        <label for="unit_classification">Unit/Classification:</label>
        <select name="unit_class" id="unit_classification"  onchange="checkOther(this)" class="styled-select" required>
            <option value="">Select</option>
         <?php  $sql = "SELECT distinct classifications as class from codes"; 
                 $sqlquery = mysqli_query($sqlconnect,$sql);
                 while($rows = $sqlquery->fetch_assoc()){ ?>

                     <option value="<?php echo $rows['class'] ?>"><?php echo $rows['class'] ?></option>
              <?php   } ?>
        </select>
        <input type="text" name="other_unit_class" id="other_unit_classification" style="display:none;" placeholder="Specify Other Unit/Classification" class="text-input">

        <label for="number_of_units">Number of Units:</label>
        <input type="number" name="number_of_units" id="number_of_units" min="1" max="50" class="text-input" required>

        <label for="office">Office:</label>
        <select name="office" id="office" onchange="checkOther(this)" class="styled-select" required>
            <option value="">Select</option>
            <option value="CCS">CCS</option>
            <option value="BSBA">BSBA</option>
            <option value="COA">COA</option>
            <option value="Other">Other</option>
        </select>
        <input type="text" name="other_office" id="other_office" style="display:none;" placeholder="Specify Other Office" class="text-input">

        <label for="purpose">Purpose:</label>
        <textarea name="purpose" id="purpose" rows="4" placeholder="Enter Purpose" class="text-input" required></textarea>

        <input type="submit" value="Submit" name="submit_faculty" class="submit-btn">

    </form>
</div>

<script>
    function checkOther(selectElement) {
        var otherTextBox = selectElement.nextElementSibling;
        if (selectElement.value === 'Other') {
            otherTextBox.style.display = 'block';
            otherTextBox.required = true;
        } else {
            otherTextBox.style.display = 'none';
            otherTextBox.required = false;
            otherTextBox.value = '';
        }
    }
</script>


</body>
</html>
