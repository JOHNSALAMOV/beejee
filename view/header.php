<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, viewport-fit=cover" />
<meta name="apple-mobile-web-app-capable" content="yes" />
<meta name="apple-mobile-web-app-status-bar-style" content="white-translucent">
<meta name="theme-color" content="#FFF">
<link rel="shortcut icon" type="image/jpg" href="<?php echo $settings['url']; ?>view/assets/icons/32x32.png"/>
<title><?php echo $settings['title']; ?></title>
<link rel="stylesheet" href="<?php echo $settings['url']; ?>view/assets/css/style.css">
</head>
<body>
<div id="loader">
<div class="spinner-border text-primary" role="status"></div>
</div>
<div class="appHeader">
<div class="pageTitle">
<? if(checkSession()){ ?>
<a href="/exit">Выйти</a>
<?
}else{
?>
<a href="/login">Войти</a>
<?
}
?>
</div>
</div>