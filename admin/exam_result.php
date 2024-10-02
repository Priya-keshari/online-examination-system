<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Login</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

   
</head>
<style>
    .table{
        background-color:white;
    }
    .examresult{
        background-color:white;
    }

</style>
<body>

</body>


<?php
session_start();
include "header.php";
include "../connection.php";
if(!isset($_SESSION["admin"]))
{
    ?>
    <script type="text/javascript">
        window.location="../index.php";
    </script>
    <?php
}
?>

                <div class="examresult">
                   <center> <h1>ALL  Exam Results</h1><center>
                </div>
          
  
        
            <?php
            $count=0;
            $res=mysqli_query($link,"SELECT *FROM exam_result order by id desc");
            $count=mysqli_num_rows($res);
            
            if($count==0)
            {
                ?>
                <center><h3>No Result Found</h3></center>

                <?php
            }
            else{
                ?>
                <div class="table">
                <br><center><table border="1" cellspacing="5" width="35%"></center>
                 <tr>
                     <th width="5%"style='background-color:blue;color:white'>Username</th>
                     <th width="5%"style='background-color:blue;color:white'>exam_type</th>
                     <th width="5%"style='background-color:blue;color:white'>total_question</th>
                     <th width="5%"style='background-color:blue;color:white'>correct_answer</th>
                     <th width="5%"style='background-color:blue;color:white'>wrong_answer</th>
                     <th width="10%"style='background-color:blue;color:white'>exam_date</th>
                 </tr>
            </div>
                <?php
                while($row=mysqli_fetch_array($res))
                {
                    echo "<tr>
                    <td>".$row['username']."</td>
                    <td>".$row['exam_type']."</td>
                    <td>".$row['total_question']."</td>
                    <td>".$row['correct_answer']."</td>
                    <td>".$row['wrong_answer']."</td>
                    <td>".$row['exam_time']."</td>
                    </tr>";
                }
                echo "</table>";
            }
            
            
            
            
            ?>
                     