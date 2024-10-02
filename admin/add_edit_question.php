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
 
        .totalform{
            margin-left:500px;
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
             height: 250px;
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
            
            background-color: white;
            border-radius: 5px;
            position: absolute;
            width: 100%;
             box-shadow:0px 0px 0px 10px  whitesmoke;
        }
        .cardtotal .card{
            color:red;   
            text-align:center;  
            font-size:30px;  
            
        }
        
    
</style>




<?php
session_start();
include "header.php";
include "../connection.php";
error_reporting(0);
if(!isset($_SESSION["admin"]))
{
    ?>
    <script type="text/javascript">
        window.location="index.php";
    </script>
    <?php
}
$id=$_GET["id"];
$exam_category='';
$res=mysqli_query($link,"select * from exam_category where id=$id");
while($row=mysqli_fetch_array($res))
{
    $exam_category=$row["category"];
}
?>
            

<div class="totalform">
<div class="center">
                <div class="form">
                    <div class="form-body">
                    <div class="page-title">
                    <h1>Add Question inside  <?php echo  "<font color='red'>".$exam_category."</font>";?></h1>
                </div>

                        <form name="form" action="" method="post">
                                <div class="form1"><label for="addquestion" class="control-label">Question</label> <input  type="text" id="company" class="form-control" name="question" required></div>



                                <div class="form1"><label for="addoption1" class=" control-label">Option1</label><input  type="text" id="company" class="form-control" name="opt1" required></div>


                                <div class="form1"><label for="addoption2" class="control-label">Option2</label><input  type="text" id="company" class="form-control" name="opt2"required></div>


                                <div class="form1"><label for="addoption3" class=" form-control-label">Option3</label><input  type="text" id="company" class="form-control" name="opt3"required></div>


                                <div class="form1"><label for="addoption4" class=" form-control-label">Option4</label><input  type="text" id="company" class="form-control" name="opt4"required></div>


                                <div class="form1"><label for="addanswer" class=" form-control-label">Answer</label><input  type="text" id="company" class="form-control" name="answer"required></div>
                                    
                                    <button  type="submit" name="submit1"  class="btn">Add Question</button>
</form>
                     </div>
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
                                <th width="5%"style='background-color:blue;color:white'>No</th>
                                <th width="25%"style='background-color:blue;color:white'>Question</th>
                                <th width="10%"style='background-color:blue;color:white'>Opt1</th>
                                <th width="10%"style='background-color:blue;color:white'>opt2</th>
                                <th width="10%"style='background-color:blue;color:white'>Opt3</th>
                                <th width="10%"style='background-color:blue;color:white'>Opt4</th>
                               
                                <th width="3%"style='background-color:blue;color:white'>Delete</th>
                               </tr>
                    </div>

                   <?php
                   $res=mysqli_query($link,"SELECT * FROM questions WHERE category='$exam_category' order by question_no asc");
                   while($row=mysqli_fetch_array($res))
                   {
                    ?>
                    <tr>
                    <td><?php echo $row["question_no"];?></td>
                    <td><?php echo $row["question"];?></td>
                    <td><?php echo $row["opt1"];?></td>
                    <td><?php echo $row["opt2"];?></td>
                    <td><?php echo $row["opt3"];?></td>
                    <td><?php echo $row["opt4"];?></td> 
                    
                    <td> <a href="delete_option.php?id=<?php echo $row["id"];?>">Delete</a></td>
                </tr>
                   <?php
                }
                ?>
                
        </table>
</form>
</body>
</html>

<?php
if(isset($_POST["submit1"]))
{
$loop=0;
 
$count=0;

$res=mysqli_query($link,"select * from questions where category='$exam_category' order by id asc") or die(mysqli_error($link));
 $count=mysqli_num_rows($res);

 if($count==0)
 {

 }
 else{
    while($row=mysqli_fetch_array($res))
    {
        $loop=$loop+1;
        mysqli_query($link,"update questions set question_no='$loop' where id=$row[id]");
    }
 }
?>

 <script type=text/javascript>
 window.location="add_edit_question.php?id=<?php echo $id?>";

 </script>
<?php
 $loop=$loop+1;
 mysqli_query($link,"INSERT INTO questions VALUES(NULL,'$loop','$_POST[question]','$_POST[opt1]','$_POST[opt2]','$_POST[opt3]','$_POST[opt4]','$_POST[answer]','$exam_category')") or die(mysqli_error($link));
}

?>