<?php
if(!defined('SLGH')){
header("HTTP/1.0 404 Not Found");
exit;
}

function protect($string) {
$protection = htmlspecialchars(trim($string), ENT_QUOTES);
return $protection;
}
function checkSession() {
if(isset($_SESSION['sl_uid'])) {
return true;
} else {
return false;
}
}
function statsTodo() {
global $db;
$query = $db->query("SELECT * FROM sl_todo WHERE id");
$stats = $query->num_rows;
return $stats;
}
function statsComplete() {
global $db;
$query = $db->query("SELECT * FROM sl_todo WHERE status='1'");
$stats = $query->num_rows;
return $stats;
}
function success($text) {
return '<div class="section AlertBlock" id="alert-block"><div class="alert alert-success mb-1" role="alert">'.$text.'</div></div>';
}
function error($text) {
return '<div class="section AlertBlock" id="alert-block"><div class="alert alert-danger mb-1" role="alert">'.$text.'</div></div>';
}
function info($text) {
return '<div class="section AlertBlock" id="alert-block"><div class="alert alert-warning mb-1" role="alert">'.$text.'</div></div>';
}
?>
