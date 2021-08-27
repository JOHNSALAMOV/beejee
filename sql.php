<?php
if(!defined('SLGH')){
header("HTTP/1.0 404 Not Found");
exit;
}
$CONF = array();
$CONF["host"] = "localhost";
$CONF["user"] = "beejee";
$CONF["pass"] = "";
$CONF["name"] = "beejee";

$db = new mysqli($CONF['host'], $CONF['user'], $CONF['pass'], $CONF['name']);
if ($db->connect_errno) {
echo "Failed to connect to MySQL: (" . $db->connect_errno . ") " . $db->connect_error;
exit;
}

$db->set_charset("utf8");
$settingsQuery = $db->query("SELECT * FROM sl_settings ORDER BY id DESC LIMIT 1");
$settings = $settingsQuery->fetch_assoc();
?>
