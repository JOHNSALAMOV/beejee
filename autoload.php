<?php

if(!defined('SLGH')){
header("HTTP/1.0 404 Not Found");
exit;
}

include("model/web.php");
include("model/pagination.php");
include("controller/TodoCore.php");

?>