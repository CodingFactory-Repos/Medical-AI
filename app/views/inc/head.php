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
    <!--- If we are on the diagnosis page, search for the diagnosis css !-->
    <?php if(isset($data['cssFile']) && $data['cssFile'] == "diagnosis"): ?><link rel="stylesheet" href="<?= URL_ROOT ?>/public/css/diagnosis.style.css"><?php endif; ?>

    <!-- Load FontAwsome and Jquery -->
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
</head>
<body>

