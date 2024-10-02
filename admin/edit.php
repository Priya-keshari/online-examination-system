
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
}
.total{
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%,-50%);
    width: 400px;
    background-color: white;
    border-radius: 5px;
}
.edit_page{
    text-align:center;
}
.form{
    padding-bottom: 20px;
            margin: 0 20px;
             text-align: center;
}
.form .form2
{
    width: 100%;
             height: 90px;
             font-size: 20px;
             border-radius: 5px;
             box-sizing: border-box;
             padding-left: 10px;
             margin: 7px 0;
}
.form5{
            margin-top:10px;
            
        }
        .form6 {
            margin-top:5px;
        }

.form5 .form-control{
    margin-left:20px;
}
.form6 .form-control{
    margin-left:20px;
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

</style>


<?php
session_start();
include "header.php";
include "../connection.php";
if(!isset($_SESSION["admin"]))
{
    ?>
    <script type="text/javascript">
        window.location="index.php";
    </script>
    <?php
}
$id=$_GET["id"];
$res=mysqli_query($link,"SELECT * FROM exam_category WHERE id=$id");
while($row=mysqli_fetch_array($res))
{
    $exam_category=$row["category"];
    $exam_time=$row["exam_time_in_minutes"];
}
?>


                <div class="total">
                    <div class="edit_page">
                        <h1>Edit Exam</h1>
                    </div>
               

                    <div class="form">
                            <form name="form1"action="" method="POST"</form>
                        <div class="form2">
                                <div class="form5"><label for="company" class=" form-control">Subject</label><input type="text" id="company" class="form-control" value="<?php echo $exam_category;?>" name="examname"></div>
                                    <div class="form6"><label for="vat" class=" form-control">Minutes</label><input type="text" id="vat" class="form-control" value="<?php echo $exam_time;?>" name="examtime"></div>
                                    <div class="form6">
                                        <input type="submit" name="submit" value="Update" class="btn ">      
                                            
                        </div>
                    </div>
                    </div>
</form>



</body>
</html>

<?php
if(isset($_POST["submit"]))
{
    mysqli_query($link,"UPDATE exam_category SET category='$_POST[examname]',exam_time_in_minutes='$_POST[examtime]' WHERE id=$id") or die(mysqli_error($link));
    ?>

    <script type="text/javascript">
        window.location="exam_category.php"

    </script>

    <?php
}
?>
<?php
include "footer.php";

?>