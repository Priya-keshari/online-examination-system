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
 .cardtotal{
            margin-top:90px;
            margin-left:40%;
            background-color: white;
            border-radius: 5px;
            position: absolute;
            width: 400px;
             box-shadow:0px 0px 0px 50px  whitesmoke;
        }
        .cardtotal .card{
            color:red;   
            text-align:center;    
            
        }

</style>

<?php
session_start();
include "header.php";
include "../connection.php";

?>

<div class="cardtotal">
                        <div class="card">
                                <strong class="card-title">Select Subject categories for add and Delete questions</strong>
                            </div>
                            <br>
                            <tr>
                                <table border="1" cellspacing="5" width="100%">
                                <th width="2%"style='background-color:blue;color:white'>#</th>
                                <th width="25%"style='background-color:blue;color:white'>Exam Name</th>
                                <th width="25%"style='background-color:blue;color:white'>Exam Time</th>
                                <th width="25%"style='background-color:blue;color:white'>Select</th>
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
                                            <td><a href="add_edit_question.php?id=<?php echo $row["id"];?>">Select</td>
                                        </tr>
                                           <?php
                                        }
                                        ?>
                                        
                                </table>
                                                  
</body>
</html>
