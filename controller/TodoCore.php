<?php
if(!defined('SLGH')){
header("HTTP/1.0 404 Not Found");
exit;
}

if(isset($_GET['p'])){
$p = protect($_GET['p']);
}

if(isset($_GET['id'])){
$id = protect($_GET['id']);
}

function generate_token() {
$token = bin2hex(random_bytes(32));
return $token;
}

if(!isset($_SESSION['lastToken'])) {
$_SESSION['lastToken'] = generate_token();
}

if(!checkSession()) {
if(isset($_POST['l_csrf'])) {
if ($_POST['l_csrf'] == $_SESSION['lastToken']){
}else{
$_SESSION['lastToken'] = $_POST['l_csrf'];
$FormBTN = isset($_POST['todo']);
if($FormBTN == "add") {
$todo = protect($_POST['todo_name']);
$name = protect($_POST['name']);
$email = protect($_POST['email']);
if(empty($todo) or empty($name) or empty($email)) {
echo error("Все поля обязательные к заполнению");
} else {
$ip = $_SERVER['REMOTE_ADDR'];
$time = time();
$insert = $db->query("INSERT sl_todo (todo,name,email,ip,date) VALUES ('$todo','$name','$email','$ip','$time')");
echo success("Задача успешно добавлена");
$redirect = $settings['url'];
}
}
}
}
}

if(checkSession()) {
if(isset($_POST['l_csrf'])) {
if ($_POST['l_csrf'] == $_SESSION['lastToken']){
}else{
$_SESSION['lastToken'] = $_POST['l_csrf'];
$FormBTN = isset($_POST['todo']);
if($FormBTN == "save") {
$todo = protect($_POST['todo_name']);
$complete = protect($_POST['todo_complete']);
$edited = 1;
if(empty($todo)) {
echo error("Поле не должно быть пустым");
} else {
$ip = $_SERVER['REMOTE_ADDR'];
$time = time();
if($complete == '0'){
$update = $db->query("UPDATE sl_todo SET todo='$todo',admin_edit='$edited',status='0' WHERE id='$id'");
}else{
$update = $db->query("UPDATE sl_todo SET todo='$todo',admin_edit='$edited',status='1' WHERE id='$id'");
}
echo success("Задача успешно изменена");
$redirect = $settings['url'];
}
}
}
}
}

$FormBTN = isset($_POST['sl_login']);
if($FormBTN == "login") {
$user = protect($_POST['name']);
$pass = protect($_POST['password']);
$CheckLogin = $db->query("SELECT * FROM sl_users WHERE user='$user'");
$login = $CheckLogin->fetch_assoc();
if(empty($user)) {
echo error("Имя пользователя не введено");
} elseif($CheckLogin->num_rows==0) {
echo error("Такого аккаунта у нас нет");
} elseif($pass !== $login['password']) {
echo error("Пароль не подходит для данного аккаунта");
} else {
$_SESSION['sl_uid'] = $login['id'];
setcookie("sl_s_id", $login['id'], time() + (86400 * 90), '/');
$redirect = $settings['url'];
header("Location: $redirect");
}
}

$page = (int) (!isset($_GET["page"]) ? 1 : $_GET["page"]);
$limit = 3;
$startpoint = ($page * $limit) - $limit;
if($page == 1) {
$i = 1;
} else {
$i = $page * $limit;
}

if(isset($_GET['type'])){
if(protect($_GET['type']) == 'A-ZN'){
$query = $db->query("SELECT * FROM sl_todo ORDER BY name ASC LIMIT {$startpoint} , {$limit}");
}elseif(protect($_GET['type']) == 'Z-AN'){
$query = $db->query("SELECT * FROM sl_todo ORDER BY name DESC LIMIT {$startpoint} , {$limit}");
}elseif(protect($_GET['type']) == 'A-ZE'){
$query = $db->query("SELECT * FROM sl_todo ORDER BY email ASC LIMIT {$startpoint} , {$limit}");
}elseif(protect($_GET['type']) == 'Z-AE'){
$query = $db->query("SELECT * FROM sl_todo ORDER BY email DESC LIMIT {$startpoint} , {$limit}");
echo 'ASZ';
}elseif(protect($_GET['type']) == 'A-ZS'){
$query = $db->query("SELECT * FROM sl_todo ORDER BY status ASC LIMIT {$startpoint} , {$limit}");
}elseif(protect($_GET['type']) == 'Z-AS'){
$query = $db->query("SELECT * FROM sl_todo ORDER BY status DESC LIMIT {$startpoint} , {$limit}");
echo 'ASZ';
}
}else{
$query = $db->query("SELECT * FROM sl_todo ORDER BY id DESC LIMIT {$startpoint} , {$limit}");
}
