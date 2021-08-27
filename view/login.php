<?
include_once "header.php";
?>

<div id="appCapCen">
<div class="login-form">
<div class="section">
<h4>Войдите в существующий аккаунт</h4>
</div>
<div class="section mt-3 mb-5">
<form action="" method="POST" class="signup">
<div class="form-group boxed">
<div class="input-wrapper">
<input type="text" class="form-control" name="name" placeholder="Электронная почта" required>
<i class="clear-input">
</i>
</div>
</div><div class="form-group boxed">
<div class="input-wrapper">
<input type="password" class="form-control" name="password" placeholder="Пароль" required>
<i class="clear-input">
</i>
</div>
</div>
<div class="section full mt-3">
<button type="submit" name="sl_login" id="sl_login" value="login" class="btn bg-black btn-block btn-lg">ВОЙТИ</button>
</div>
</form>
</div>
</div>
</div>

<?
include_once "footer.php";
?>