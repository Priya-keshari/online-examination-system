<!doctype html>
<html class="no" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Online Quiz System</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
</head>
<body>
 <style> 
 *{
    margin: 0;
    padding: 0;  
 }
        .totalform{
            position: absolute;
            margin-top:200px;
            left: 30%;
            transform: translate(-50%,-50%);
            width: 400px;
            background-color: white;
            border-radius: 5px;
            box-shadow:0px 0px 0px 10px  whitesmoke;
        }
        .center
        {
              text-align: center;
        	  padding-bottom: 20px;
              border-bottom: 2px solid silver;
        }
        .login{
            font-size:20px;
            margin-top:20px;
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
            background-color:green;
            border-radius: 5px;
            font-size: 20px;
            margin: 7px 0;
            color: white;
            border: 0;
            cursor: pointer;
        }
        .btn:hover
        {
             background-color: rgb(160, 160, 239);
        }
        .cardtotal{
            margin-top:90px;
            margin-left:60%;
            background-color: white;
            border-radius: 5px;
            position: absolute;
            width: 400px;
             box-shadow:0px 0px 0px 10px  whitesmoke;
        }
        .cardtotal .card{
            color:red;   
            text-align:center;    
            
        }
</style>



<?php
session_start();

include "../connection.php";
include "header.php";


?>

<div class="totalform">
		<div class="center">
			<div class="login">
				<h3> Add Exam</h3>

			</div>
				<div class="form">
                    <div class="form-body">
                        <form action="" name="form1" method="POST">
                            <div class="form1">
                                <label class="control-label" for="addexam">Add Subject</label>
                                <input type="text" id="company" required="" value="" name="examname" class="form-control">
                            </div>

                            <div class="form2">
                                <label class="control-label" for="time">Exam_Time</label>
                                <input type="text" required="" value="" name="examtime" id="vat" class="form-control">

                            </div>

                            <button  type="submit" name="submit"class="btn">Add</button>

                        </form>
                    </div>
                </div>

		</div>   
        </div>
        
                    <div class="cardtotal">
                        <div class="card">
                                <strong class="card-title">Exam Categories</strong>
                            </div>
                            <br>
                            <tr>
                                <table border="1" cellspacing="5" width="100%">
                                <th width="10%"style='background-color:blue;color:white'>#</th>
                                <th width="5%"style='background-color:blue;color:white'>Subject</th>
                                <th width="5%"style='background-color:blue;color:white'>Exam_Time</th>
                                <th width="5%"style='background-color:blue;color:white'>Edit</th>
                                <th width="5%"style='background-color:blue;color:white'>Delete</th>
                               </tr>
                    </div>



                                        <?php
                                        $count=0;
                                        $res=mysqli_query($link,"SELECT * FROM exam_category");
                                        while($row=mysqli_fetch_array($res))
                                        {
                                            $count=$count+1;
                                           ?>
                                            <tr>
                                            <th scope="row"><?php echo $count;?></th>
                                            <td><?php echo $row["category"];?></td>
                                            <td><?php echo $row["exam_time_in_minutes"];?></td>
                                            <td><a href="edit.php?id=<?php echo $row["id"];?>">Edit</td>
                                            <td> <a href="delete.php?id=<?php echo $row["id"];?>">Delete</a></td>
                                        </tr>
                                           <?php
                                        }
                                        ?>
<?php
if(isset($_POST["submit"]))
{
    mysqli_query($link,"INSERT INTO exam_category VALUES(NULL,'$_POST[examname]','$_POST[examtime]')") or die(mysqli_error($link));
    ?>

    <script type="text/javascript">

    alert("exam added sucessfully");

    </script>

    <?php
}
?>
<?php
include "footer.php";

?>