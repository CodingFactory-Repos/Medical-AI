<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta htttp-equiv="Cache-control" content="no-cache">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Primary Meta Tags -->
    <meta name="title" content="<?= SITE_NAME ?>">
    <meta name="description" content="<?= CARD_DESCRIPTION ?>">
    <link rel="icon" href="<?= URL_ROOT ?>/img/icon.png" type="image/png">

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="<?= URL_ROOT ?>">
    <meta property="og:title" content="<?= SITE_NAME ?>">
    <meta property="og:description" content="<?= CARD_DESCRIPTION ?>">
    <meta property="og:image" content="<?= CARD_IMAGE ?>">

    <!-- Twitter -->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="<?= URL_ROOT ?>">
    <meta property="twitter:title" content="<?= SITE_NAME ?>">
    <meta property="twitter:description" content="<?= CARD_DESCRIPTION ?>">
    <meta property="twitter:image" content="<?= CARD_IMAGE ?>">

    <!-- TabName -->
    <title><?= $data['headTitle'] ? $data["headTitle"] . " - " .  SITE_NAME : SITE_NAME ?></title>

    <!-- Styles -->
    <link rel="stylesheet" href="<?= URL_ROOT ?>/public/css/normalize.css">
    <link rel="stylesheet" href="<?= URL_ROOT ?>/public/css/global.style.css">
    <?php if(isset($data['cssFile'])): ?><link rel="stylesheet" href="<?= URL_ROOT ?>/public/css/<?= $data['cssFile'] ?>.style.css"><?php endif; ?>

    <!-- Load FontAwsome and Jquery -->
    <?= file_get_contents('https://api.headswift.com/cdn/0.1.0/?frameworks=headswift-stats,jquery&version=0.1.0,3.6.0'); ?>
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" crossorigin="anonymous">
</head>
<body>

