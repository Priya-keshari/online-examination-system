<!doctype html>
<html class="no" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Online Quiz System</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <nav class="navbar">
<ul class="nav-list">
                    
                    <li>
                        <a href="exam_category.php"> <i></i>Add & Update </a>
                    </li>
                    <li>
                        <a href="add_edit_exam.php"> <i></i>Add & Delete Question</a>
                    </li>
                    <li>
                        <a href="exam_result.php"> <i></i>All Exam Result</a>
                    </li>
                    <li>
                        <a href="admin_logout.php"> <i></i>LogOut</a>
                    </li>
</ul>
</nav>
</head>

<body>
 <style> 
 *{
    margin: 0;
    padding: 0;  
 }
 body{
    margin: 0;
    padding: 0;
    background-image: 
        url(backimage.png);
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
</style>
