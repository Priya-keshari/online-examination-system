<?php
error_reporting(0);
session_start();
if( $time1=gmdate("H:i:s",strtotime($_SESSION["end_time"])-strtotime(date("Y-m-d H:i:s"))));
{
if(strtotime($_SESSION["end_time"])<strtotime(date("Y-m-d H:i:s")))
{
    echo "00:00:00";
}
else{
    echo $time1;
}
}


?>