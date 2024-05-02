<?php
session_start();
 require("./database.php");
 $_SESSION['validate']  = "not valid";
 $error = 'password';
if(isset($_POST['login'])){
 $userna = trim($_POST['username']);
 $pass = trim($_POST['pass']);
 
    $queryval = "SELECT unique_id, type,user_name,password, concat(first_name,' ',last_name ) as name From create_users where unique_id = '$userna' and password = '$pass'  ";
    $sqlval = mysqli_query($sqlconnect,$queryval);

    if(mysqli_num_rows($sqlval)>0){
        while($rows = $sqlval->fetch_assoc()){
            $_SESSION['password']=$rows['password'];
            $_SESSION['uname'] = $rows['user_name'];
           $_SESSION['name'] = $rows['name'];
           $_SESSION['id'] = $rows['unique_id'];
           $type = $rows['type'];
           if($type == "Faculty"){
            $_SESSION['validate'] = "accept";
            if($_SESSION['validate'] == "accept"){
              header('location:faculty.php');
            }
           } else{
            $_SESSION['validate'] = "accept";
            if($_SESSION['validate'] == "accept"){
              header('location:index.php');
            }
           }
        }

      
    }else{
        
         $error = 'Incorrect Password!'; ?>
         <style>
          .password::-webkit-input-placeholder{
            color: red;
           }
         </style>
      <?php
    }

}
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="styles.php">
    <title>Document</title>
    <style>
        
@import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');

body{
margin: 0;
background-image: url('./pic/background_1.png');
background-size: cover; /* Zoom the background image to cover the entire element */
background-position: center; /* Center the background image */
background-repeat: no-repeat;
}
header{
    
background-color: #192C3D;
margin: 0;
padding: 5px;
}

header div1 {
width: 40%;

}
.container {
    display: flex; /* Use flexbox for centering */
    justify-content: center; /* Center horizontally */
    align-items: center; /* Center vertically */
    height: 80%; /* Full viewport height */
    
    
}

.rectangle {
    width: 750px; /* Adjust the width as needed */
    height: 425px; /* Adjust the height as needed */
    background-color: #EFEDED; /* Rectangle background color */
    border-radius: 20px; /* Border radius for rounded corners */
    padding: 20px; /* Add padding for spacing */
    
}


.rectangle h1 {
    margin: 0;
    margin-top: 65px;
    margin-left: 5%;
    width: 50%;
    
}

.rectangle h2 {
    width: 50%;
    margin: 0; /* Remove margin for "LABVISION" */
    margin-left: 5%;
    font-size: 50px;
    color: #192C3D; /* Color for "LABVISION" */
}
h1, h2 {
    width: 50%;
    font-family: 'Poppins', sans-serif; /* Specify Poppins font as the font for h1 and h2 */
    letter-spacing: 1px; /* Adjust letter spacing */
    line-height: .9; /* Adjust line height */
    margin-top: 10px; /* Adjust top margin */
    margin-bottom: 10px; /* Adjust bottom margin */
}

.textbox{
    margin-top: 40px;
    margin-left: 40px;
    width: 275px;
    height: 30px;
    border-radius: 8px;
    box-shadow: 1px 4px 3px #181c36
    
}

.password{
    margin-top: 20px;
    margin-left: 40px;
    margin-bottom: 20px;
    width: 275px;
    height: 30px;
    border-radius: 8px;
    box-shadow: 1px 4px 5px #181c36;
}
/* CSS styles for the submit button */
.submit-button {
    padding: 10px 20px; /* Add padding */
    font-size: 16px; /* Set the font size */
    color: #fff; /* Set the text color */
    background-color:#192C3D ; /* Set the background color */
    border: none; /* Remove the border */
    border-radius: 10px; /* Add rounded corners */
    cursor: pointer; /* Change cursor to pointer on hover */
    margin-left: 67px;
    width: 225px;
    margin-top: 35px;
    font-family: 'Poppins', sans-serif;
    
}

/* Change button color on hover */
.forgot-password{
    font-family: 'Poppins', sans-serif;
    margin-left: 47px;
    color: #192C3D;
    font: bold;
    font-size: 60%;
}
.loginpart{
    width: 50%;
}

.rectangle3 {
    width: 46%; /* Adjust the width as needed */
    height: 420px; /* Adjust the height as needed */
    background: linear-gradient(to bottom right, #192C3D, #20356e);
    border-radius: 20px; /* Border radius for rounded corners */
    padding: 25px; /* Add padding for spacing */
    margin-left: 50%;
    margin-top: -395px;
    justify-content: center; /* Center horizontally */
    align-items: center; /* Center vertically */
    
}

h6{
    color: #EFEDED;
    margin-top: 2%;
    margin-left: 16%;
    margin-right: 15%;
    font-size:125%;
    text-align: center;
    font-family: 'Poppins', sans-serif;
    height: auto;
}
.learnmorebutton{
    padding: 10px 20px; /* Add padding */
    font-size: 16px; /* Set the font size */
    color: #e7e8e9; /* Set the text color */
    background-color: #ffffff00; /* Set the background color */
    border-color: #EFEDED;
    border-radius: 10px; /* Add rounded corners */
    cursor: pointer; /* Change cursor  to pointer on hover */
    margin-left: 67px;
    width: 225px;
    margin-top: -5px;
}
    </style>
</head>

<body>
    
    <header>
        
         <div1><img src="logo.png" alt=""></div1>

    </header>


<div class="container">
    
        <div class="rectangle">
                <h1>Welcome to</h1>
                <h2>LABVISION</h2>

                <div class= "loginpart">
                <form class = "login" action="login.php" method = "post"> <!--action oncw the button click and method get their type in text through their name-->
                       
                        <!-- Textbox -->
                        <input type="text" class="textbox" name = 'username' placeholder="user id" required>
                      

                     
                            <!-- Textbox -->
                            <input type="password" class="password" name = 'pass' placeholder="<?php echo $error?>" required>
                            <!--incorrect-->
                            <!-- <span style = "color: red ;margin-left: 50px "><?php // echo $error?></br></span> -->

                        <!-- <a href="#" class="forgot-password">Forgot Password?</a>  -->
          
                        <!-- Submit button -->
                    
                            <input type="submit" class="submit-button" name = 'login' value="Login">
                            
                   
                      </form>
                  
                </div>


                <div class="tryagain">
                    
                    <div class="rectangle3">
                    

                    <h1><img src="logo.png" alt="logopls"></h1>
                    <h6>Virtual Information System for Insightful Observation and Navigation</h6>

                    
                        <input type="submit" class="learnmorebutton" value="Learn More"> 
                    </div>
                  
         </div>
 </div>

    
</body>
</html>