<?php
session_start();
include "connection.php";
?>

<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Login</title>
    <meta name="description" content="">
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
        .totalform{
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
              border-bottom: 2px solid silver;
        }
        .login{
            font-size:20px;
        }
        .form{
            padding-bottom: 20px;
            margin: 0 20px;
             text-align: center;

        }
        .form-body{
             width: 100%;
             height: 100px;
             font-size: 18px;
             
             border-radius: 5px;
             box-sizing: border-box;
             padding-left: 10px;
             margin: 7px 0;
        }
        .form1{
            margin-top:10px;
        }
        .form2{
            margin-top:5px;
        }
        .btn{
            margin-top:5px;
            width: 90%;
            height: 30px;
            background-color:#2f88d4;
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



</style>

	<div class="totalform">
		<div class="center">
			<div class="login">
				<h3>LOGIN FORM</h3>

			</div>
				<div class="form">
                    <div class="form-body">
                        <form action="#" name="form1" method="POST">
                            <div class="form1">
                                <label class="control-label" for="username">Username</label>
                                <input type="text" placeholder="username" title="Please enter you username" required="" value="" name="username" id="username" class="form-control">

                            </div>
                            <div class="form2">
                                <label class="control-label" for="password">Password</label>
                                <input type="password" title="Please enter your password" placeholder="******" required="" value="" name="password" id="password" class="form-control">

                            </div>

                            <button  type="submit" name="login"class="btn">Login</button>
                            <a class="btn1" href="register.php">Register</a>

                            <div class="alert-danger"id="failure" style="margin-top:10px;display:none">
                                 <strong> Invalid Username or Password. </strong>
                            </div>

                        </form>
                    </div>
                </div>

		</div>   
    </div>
<?php
if(isset($_POST["login"])){
    $count=0;
    $res=mysqli_query($link,"SELECT * FROM registration WHERE username='$_POST[username]' && password='$_POST[password]'");
    $count=mysqli_num_rows($res);
    if($count==0)
    {
        ?>
        <script type="text/javascript">
            document.getElementById("failure").style.display="block";
        </script>

<?php
    }
    else{
        $_SESSION["username"]=$_POST["username"];
        ?>
        <script type="text/javascript">
            window.location="select_exam.php";

        </script>

        <?php
    }
}

?>

</body>

</html>