<?php
session_start();
include "dashboard_header.php";
if(!isset($_SESSION["username"]))
{
    ?>
    <script type=text/javascript>
    window.location="login.php";

    </script>
    <?php
}

?>

        <!-----start--->
        <br>
        <div class="total">
            <br>
            <div class="total_center">
                <div id="current_que"style="float:left">0</div>
                <div style="float:left"></div>
                <div id="total_que"style="float:left">0</div>
            </div>
            <div class="total1">
                <div class="total2">
                    <div class="question"style="min-height:300px;background-color:white"id="load_questions">
                </div>
            </div>
            <div class="next" style="margin-top:10px">
            <div class="nexttotal" style="min-height:50px">
            <div class="nextcenter">
                <input type="button" class="btn1" value="Previous" onclick="load_previous();">&nbsp;
                <input type="button" class="btn" value="Next" onclick="load_next();">
            </div>
        </div>
        </div>
            </div>
    
        <!--end her editng-->

<script type="text/javascript">
    function load_total_que()
    {
        var xmlhttp=new XMLHttpRequest();
    xmlhttp.onreadystatechange=function(){
        if(xmlhttp.readyState==4 && xmlhttp.status==200)
        {
            document.getElementById("total_que").innerHTML=xmlhttp.responseText;
        }
    };
    xmlhttp.open("GET","forajax/load_total_que.php",true);
    xmlhttp.send(null);
    }

    var questionno="1";
    load_questions(questionno);
    function load_questions(questionno)
    {
        document.getElementById("current_que").innerHTML="questionno";
        var xmlhttp=new XMLHttpRequest();
    xmlhttp.onreadystatechange=function(){
        if(xmlhttp.readyState==4 && xmlhttp.status==200)
        {
            if(xmlhttp.responseText=="over")
            {
                window.location="result.php";
            }
            else{
                document.getElementById("load_questions").innerHTML=xmlhttp.responseText;
                load_total_que();
            }
        }
    };
    xmlhttp.open("GET","forajax/load_question.php?questionno="+questionno,true);
    xmlhttp.send(null);
    }

    function radioclick(radiovalue,questionno)
    {
        var xmlhttp=new XMLHttpRequest();
    xmlhttp.onreadystatechange=function(){
        if(xmlhttp.readyState==4 && xmlhttp.status==200)
        {
            
        }
    };
    xmlhttp.open("GET","forajax/save_answer_in_session.php?questionno="+questionno +"&value1="+radiovalue,true);
    xmlhttp.send(null);
    } 
    

    function load_previous()
    {
        if(questionno=="1"){
            load_questions(questionno);
        }
        else{
            questionno=eval(questionno)-1;
            load_questions(questionno);
        }
    }
    function load_next()
    {
        questionno=eval(questionno)+1;
            load_questions(questionno);
    }

    </script>
