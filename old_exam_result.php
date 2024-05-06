<?php
session_start();
include "connection.php";
include "old_exam_header.php";
?>

        <div class="row" style="margin: 0px; padding:0px; margin-bottom: 50px;">

            <div class="col-lg-6 col-lg-push-3" style="min-height: 500px; background-color: white;">
            <center>
            <h1> Old Exams Result</h1>
        </center>
            <?php
            $count=0;
            $res=mysqli_query($link,"SELECT *FROM exam_result WHERE username='$_SESSION[username]' order by id desc");
            $count=mysqli_num_rows($res);
            
            if($count==0)
            {
                ?>
                <center><h1>No Result Found</h1></center>

                <?php
            }
            else{
                ?>
                <br><center><table border="1" cellspacing="5" width="35%"></center>
                 <tr>
                     <th width="5%"style='background-color:blue;color:white'>Username</th>
                     <th width="5%"style='background-color:blue;color:white'>Exam_type</th>
                     <th width="5%"style='background-color:blue;color:white'>Total_question</th>
                     <th width="5%"style='background-color:blue;color:white'>Correct_answer</th>
                     <th width="5%"style='background-color:blue;color:white'>Wrong_answer</th>
                     <th width="10%"style='background-color:blue;color:white'>Exam_Date</th>
                 </tr>
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
