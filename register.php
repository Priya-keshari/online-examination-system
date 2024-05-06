<?php
include "connection.php";

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Registration_Form</title>
    

</head>

<body>
   <style>
    *
{
    padding: 0;
    margin: 0;
    box-sizing: border-box;
    
}
body {
        background-image: 
        url(backimage.png);
        
    }
.container
{
    max-width: 500px;
    width: 100%;
    background-color: rgba(152, 146, 149, 0.899);
    margin: 20px auto;
    padding: 30px;
    box-shadow: 5px 5px 5px rgba(0,0,0,0.5);
}
.container .title
{
    font-size: 24px;
    font-weight: 700;
    margin-bottom: 25px;
    text-transform: uppercase;
    text-align: center;
}
.container .form {
    width: 100%;  
}
.container .form .input_field
{
    margin-bottom: 15px;
    display: flex;
    align-items: center;
}
.container .form .input_field label{
    width: 200px;
    margin-right: 10px;
    font-size: 14px;
}
.container .form .input_field .input
{
    width: 100%;
    outline: none;
    border: 2px solid rgb(202, 163, 163); ;
    
    font-size: 15px;
    padding: 4px 8px;
    border-radius: 4px;
    transition: all 0.5s ease;
}
.container .form .input_field .selectbox
{
    position: relative;
    width: 100%;
    outline: none;
    border: 2px solid rgb(202, 163, 163);
    font-size: 15px;
    padding: 4px 8px;
    border-radius: 4px;
    transition: all 0.5s ease;
}
.container .form .input_field .input:focus
{
    border: 2px solid rgb(207, 101, 63);
}
.container .form .input_field p{
    font-size: 15px;
    color:black;
}
.container .form .input_field .check
{
    width: 15px;
    height: 15px;
    position: relative;
    display: block;
    cursor: pointer;
}
.container .form .input_field .button
{
    width: 100%;
    padding: 8px 10px ;
    font-size: 15px;
    border-color: rgb(218, 225, 233);
    background-color: rgb(173, 149, 224) ;
    cursor: pointer;
    border-radius: 4px;
    outline: none;
}
.container .form .input_field .button: :last-child
{
    margin: bottom 0;
}
.container .form .input_field .button:hover
{
    background-color: rgb(187, 182, 199);
}
.alert_success{
    color:green;
}
.alert_danger
{
    color:red;
}

@media (max-width: 470px)
{
    .container{
        width:"80%";
    }
}

    </style>

    <form aciton =""  method="POST">
        <div class="container">
            <div class="title">
                Registration Form
            </div>
        <div class="form">
        <div class="input_field" id="name">
            <label>User_Name</label>
             <input type="text" name="firstname"placeholder="FirstName" class="input" required>
        </div>
    <div class="input_field" id="last">
        <label>User_Id</label>
        <input type="text" name="username" placeholder="Username" class="input " required>
    </div>
    <div class="input_field" id="last">
        <label>Password</label>
        <input type="password" name="password" placeholder="*******" class="input " required>
    </div>


        <div class="input_field" id="email">
            <label>Email Address</label>
             <input type="email" name="email" placeholder="Email_Address"class="input" required>
        </div>

        <div class="input_field" id="phone">
            <label>Contact</label>
            <input type="text"name="contact" placeholder="Phone_Number" class="input" required>
        </div>
        
        <div class="input_field">
            <input type="submit" value="Register" class="button" name="submit1">
        </div>
        </div>
 <div class="alert_success"id="success" style="margin-top:10px;display:none">
        <strong>success</strong> Account Registration Successfully.
</div>
 <div class="alert_danger"id="failure" style="margin-top:10px;display:none">
 <strong>Already Exist!</strong>    This username is Already Exist.
</div>
    </div>
    

</form>
              

    <?php
    if(isset($_POST["submit1"]))
    {
        $res=mysqli_query($link,"SELECT * FROM `registration` WHERE username='$_POST[username]'") or die(mysqli_error($link));

        $count=mysqli_num_rows($res);

        if($count>0)
        {
            ?>
            <script type="text/javascript">
                document.getElementById("success").style.display="none";
                document.getElementById("failure").style.display="block";
            </script>

            <?php
        }
        else{
            mysqli_query($link,"INSERT INTO registration VALUES(NULL,'$_POST[firstname]','$_POST[username]','$_POST[password]','$_POST[email]','$_POST[contact]')") or die(mysqli_error($link));
            ?>
            <script type="text/javascript">
                document.getElementById("success").style.display="block";
                document.getElementById("failure").style.display="none";
            </script>

            <?php
        }
    }



?>

</body>

</html>