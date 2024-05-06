<?php
session_start();
include "connection.php";
include "select_exam_header.php";
if(!isset($_SESSION["username"]))
{
    ?>
    <script type=text/javascript>
    window.location="login.php";

    </script>
    <?php
}
?>
<div class="slectsubject">
    <h2>SELECT YOUR SUBJECT</h2>
</div>

        <div class="doo" style="margin: 0px; padding:0px; margin-bottom: 50px;">

            <div class="dodis" style="min-height: 500px; background-color: whitesmoke;">
              <?php
              $res=mysqli_query($link,"SELECT *FROM exam_category");
  
              while($row=mysqli_fetch_array($res))
              {
                  ?>
                  <input type=button class="btn" value="<?php echo $row["category"]?>"style="margin-top:100px; width:200px; margin-left:100px;background-color:#449e10; color:white ;font-size:20px;" onclick="set_exam_type_session(this.value);">
                  <?php
              }
              ?>
        </div>

        </div>




<script type="text/javascript">
function set_exam_type_session(exam_category)
{
    var xmlhttp=new XMLHttpRequest();
    xmlhttp.onreadystatechange=function(){
        if(xmlhttp.readyState==4 && xmlhttp.status==200)
        {
            window.location="dashboard.php";
        }
    };
    xmlhttp.open("GET","forajax/set_exam_type_session.php?exam_category="+exam_category,true);
    xmlhttp.send(null);
}
</script>


