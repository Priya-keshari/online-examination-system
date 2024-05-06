<!doctype html>
<html  lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Online Quiz System</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <nav class="navbar">
<ul class="nav-list">
<div class="logo"><img src="logo.jpg" alt="logo"></div>
<li><a href="select_exam.php" class="nav-link">Select Exam</a></li>
<li><a href="old_exam_result.php" class="nav-link">Last Result</a></li>
<li><a href="logout.php." class="nav-link">LogOut</a></li>
<span class="username_name"><?php echo $_SESSION["username"];?></span>
</ul>
</nav>
<style> 
 *{
    margin: 0;
    padding: 0;  
 }
 .nav-list .username_name{
    font-size:30px;
    color:white;
    margin-left:300px;
 }
.logo img{
    width: 20%;
    border: 3px solid #a85b44;
    border-radius: 9px;
}
.navbar{
    display: flex;
    align-items: center;
    justify-content: center;
    position: sticky;
    top: 0;
    cursor: pointer;
}
.nav-list{
    width: 100%;
    background-color: rgb(211, 63, 22);
    display: flex;
    align-items: center;

}
.nav-list li{
    list-style: none;
    padding: 13px 50px;
}

.nav-list li a{
    text-decoration: none;
    color:white;
}
.nav-list li a:hover{
    text-decoration: none;
    color: rgb(56, 46, 44);
}
.timer{
    color:black;
    margin-left:1200px;
    margin-top:50px;
}
.total{
    background-color:white;
}
.total_center{
    color:black;
    margin-left:1000px;
}
.nextcenter{
    margin-left:400px;
}
.nextcenter .btn{
    color:black;
    font-size:20px;
    width:100px;
    background-color:#27a305;
    margin-left:100px;
    border-radius:10px;
}
.nextcenter .btn1{
    color:black;
    font-size:20px;
    width:100px;
    background-color:#e38512;
    border-radius:10px;
}
.total2{
    color:black;
    margin-left:400px;
}
</style>


</head>

<body>

                    <div class="timer">
                         <ul class="timer-center">
                            <li><div id="countdowntimer" style="display:block;"></div>
                             </li>
                          </ul>
                 </div>

        <script type="text/javascript">
        setInterval(function(){
            timer();
        },1000);
        function timer()
{
    var xmlhttp=new XMLHttpRequest();
    xmlhttp.onreadystatechange=function(){
        if(xmlhttp.readyState==4 && xmlhttp.status==200)
        {
           if(xmlhttp.responseText=="00:00:01")
           {
            window.location="result.php";
           }
           document.getElementById("countdowntimer").innerHTML=xmlhttp.responseText;
        }
    };
    xmlhttp.open("GET","forajax/load_timer.php" ,true);
    xmlhttp.send(null);
}
        </script>
