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
    margin-left:500px;
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
</style>



</head>

<body>
</body>
</html>

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
