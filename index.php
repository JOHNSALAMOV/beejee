<?php
define('SLGH',TRUE);
ob_start();
session_start();

include("sql.php");
include("autoload.php");

switch($p) {

case "main": include("view/main.php"); break;
case "edit": include("view/edit.php"); break;
case "login": include("view/login.php"); break;
case "oops": include("view/oops.php"); break;

case "exit":
unset($_SESSION['sl_uid']);
unset($_COOKIE['sl_s_id']);
setcookie("sl_s_id", "", time() - (86400 * 365), '/');
session_unset();
session_destroy();
header("Location: /");
break;

default: include("view/main.php");

}

mysqli_close($db);

?>