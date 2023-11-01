<?php



 $db_host="sg2nlmysql57plsk.secureserver.net:3306";
  $db_user="uaspl";
  $db_pass="uaspl";
  $db_name="uaspl_sms";

//$db_host="localhost";
//$db_user="root";
//$db_pass="";
//$db_name="UASPL";

//sg2nlmysql57plsk.secureserver.net:3306 (default for Percona, v5.7.26)

$connection= mysqli_connect($db_host,$db_user,$db_pass,$db_name);

if($connection){
 //echo "we are connected";
}

?>