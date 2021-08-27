<?
if(!checkSession()) {
$redirect = $settings['url'];
header("Location: $redirect");
}
include_once "header.php";
?>

<div id="appCapsule">
<div class="section mt-2">
<div class="header-large-title" style="padding-left: 0;">
<h4 class="subtitle" style="font-weight: 600;">Редактирование задачи</h4>
</div>

<?
$query = $db->query("SELECT * FROM sl_todo WHERE id='$id'");
$row = $query->fetch_assoc();
?>

<form action="" method="POST" class="pb-2">
<input type="hidden" name="l_csrf" value="<? echo generate_token(); ?>" />
<div class="form-group boxed">
<div class="input-wrapper">
<input type="text" class="form-control" id="todo_name" name="todo_name" value="<? echo $row['todo']; ?>" maxlength="150" required>
<i class="clear-input">
</i>
</div>
</div>

<select class="form-control form-control-lg mb-3" name="todo_complete">
<option value="0">Не выполнено</option>
<option value="1">Выполнено</option>
</select>

<button type="submit" name="todo" id="todo" value="save" class="btn btn-black btn-block btn-lg">СОХРАНИТЬ</button>
<div class="section full mt-3">
<a href="/" class="btn bg-b-black btn-block btn-lg">НА ГЛАВНУЮ</a>
</div>
</form>

<?
include_once "footer.php";
?>