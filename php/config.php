<?php

$servername ="localhost";
$username ="root";
$passsword ="";
$dbname ="pro";


$con = new mysqli($servername,$username,$passsword,$dbname);

if($con->connect_error){

    die ("Connection Faild".$conn->connect_error);

}
else{

    echo "";
}


?>