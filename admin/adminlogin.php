<?php
session_start();
include "../connection.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title> Admin_Login</title>
    <meta name="description" content="Sufee Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body>
    <style>
         body{
    margin: 0;
    padding: 0;
    background-image: 
        url(backimage.png);
}
.total_form{
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%,-50%);
    width: 400px;
    background-color: white;
    border-radius: 5px;
}
.center
{
             text-align: center;
        	  padding-bottom: 20px;
              
}
.login{
            font-size:30px;
        }
        .form1{
            margin-top:20px;
        }
        .form2{
            margin-top:10px;
        }
            .btn{
            margin-top:5px;
            width: 90%;
            height: 30px;
            background-color:#28a745;
            border-radius: 5px;
            font-size: 20px;
            margin: 7px 0;
            color: black;
            border: 0;
            cursor: pointer;
        }
        .btn:hover
        {
             background-color: rgb(160, 160, 239);
        }
        .alert-danger{
            color:red;
        }
        
        

    </style>


    <div class="total_form">
        <div class="center">
            <div class="login">
				<h3>Admin_Login</h3>
			</div>
                <div class="form1">
                    <form name="form-body" action="" method="post">
                        <div class="form1">
                            <label>Username</label>
                            <input type="text" name="username" class="form-control" placeholder="Username" required>
                        </div>
                            <div class="form2">
                                <label>Password</label>
                                <input type="password" name="password" class="form-control" placeholder="Password" required>
                        </div>
                                <button type="submit" name="submit1" class="btn">Sign in</button>

                                <div class="alert-danger"  id="errormess"style="margin-top:10px; display:none">
                            <strong>Invalid!</strong> UserName and Password .
                        </div
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
<?php
if(isset($_POST["submit1"]))
{
    $count=0;
    $username=mysqli_real_escape_string($link,$_POST["username"]);
    $password=mysqli_real_escape_string($link,$_POST["password"]);

    $res=mysqli_query($link,"SELECT * FROM admin_login WHERE username='$username' && password='$password'");
    $count=mysqli_num_rows($res);
    if($count==0)
    {
        ?>
        <script type="text/javascript">
            document.getElementById("errormess").style.display="block";
            </script>
        <?php
    }
    else
    {
        $_SESSION["admin"]=$username;
        ?>
             <script type="text/javascript">
            window.location="exam_category.php";
            </script>
        <?php
    }
}



?>