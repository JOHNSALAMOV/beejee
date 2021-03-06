<?
include_once "header.php";
?>

<div id="appCapsule">
<div class="section mt-2">
<div class="header-large-title pb-2" style="padding-left: 0;">
<h4 class="subtitle" style="font-weight: 600;">Статистика сервиса</h4>
</div>

<div class="pb-2">
<div class="row">
<div class="col">
<div class="card">
<div class="card-body">
<h5 class="card-title"><? echo statsTodo(); ?></h5>
<p class="card-text"><small>добавленных задач</small></p>
</div>
</div>
</div>

<div class="col">
<div class="card">
<div class="card-body">
<h5 class="card-title"><? echo statsComplete(); ?></h5>
<p class="card-text"><small>выполненных задач</small></p>
</div>
</div>
</div>

</div>
</div>

<? if(!checkSession()){?>
<div class="header-large-title" style="padding-left: 0;">
<h4 class="subtitle" style="font-weight: 600;">Добавление новой задачи</h4>
</div>

<form action="" method="POST" class="pb-2">
<input type="hidden" name="l_csrf" value="<? echo generate_token(); ?>" />
<div class="form-group boxed">
<div class="input-wrapper">
<input type="text" class="form-control" id="todo_name" name="todo_name" placeholder="Название задачи" maxlength="150" required>
<i class="clear-input">
</i>
</div>
</div>
<div class="form-group boxed">
<div class="input-wrapper">
<input type="text" class="form-control" id="name" name="name" placeholder="Ваше имя" maxlength="50" required>
<i class="clear-input">
</i>
</div>
</div>

<div class="form-group boxed">
<div class="input-wrapper">
<input type="email" class="form-control" id="email" name="email" placeholder="Электронная почта" maxlength="30" required>
<i class="clear-input">
</i>
</div>
</div>


<button type="submit" name="todo" id="todo" value="add" class="btn btn-black btn-block btn-lg">ДОБАВИТЬ</button>
</form>
<?}?>

<div class="pb-2">
<div class="header-large-title" style="padding-left: 0;">
<h4 class="subtitle" style="font-weight: 600;">Последние задачи</h4>
</div>
</div>

<div class="row">
<div class="col-md-12">
<div class="card">
<div class="card-body table-responsive">
<table class="table table-striped">
<thead>
<tr>
<th width="45%">Задача</th>
<th width="15%">Имя <a href="/?a=main&type=A-ZN">&#9650;</a> <a href="/?a=main&type=Z-AN">&#9660;</a></th>
<th width="15%">Почта <a href="/?a=main&type=A-ZE">&#9650;</a> <a href="/?a=main&type=Z-AE">&#9660;</a></th>
<th width="10%">Статус <a href="/?a=main&type=A-ZS">&#9650;</a> <a href="/?a=main&type=Z-AS">&#9660;</a></th>
<th width="15%">Дата</th>
</tr>
</thead>
<tbody>

<?
if($query->num_rows>0) {
while($row = $query->fetch_assoc()) {
?>

<tr>
<td><? echo $row['todo']; ?><? if(checkSession()){ echo '<a href="/edit/'.$row['id'].'"> - редактировать</a>'; } ?><br/>
<? if ($row['admin_edit'] == 1){echo '<div class="admin_edited">Отредактировано Администратором</div>';}; ?></td>
<td><? echo $row['name']; ?></td>
<td><? echo $row['email']; ?></td>
<td><? if($row['status'] == 0){echo 'Не выполнено';}else{echo 'Выполнено';} ?></td>
<td><? echo date('d-m-Y в H:i',$row['date']); ?></td>
</tr>

<?
}
} else {
echo '<tr><td colspan="8">Список задач пуст</td></tr>';
}
?>

</tbody>
</table>

<?
$ver = "/main";
if(pagination($ver,$limit,$page)) {
echo pagination($ver,$limit,$page);
}
?>

</div>
</div>
</div>
</div>


<?
include_once "footer.php";
?>
