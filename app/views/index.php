<?php
	require APP_ROOT . '/views/inc/head.php';
?>
<body>
    <?php
        require APP_ROOT . '/views/inc/header.php';
    ?>
    <main>
        <div id="searchbar">
            <form action="<?= URL_ROOT; ?>/search" method="post">
                <input type="text" name="search" placeholder="Search..">
                <button type="submit" name="searchBtn"><i class="fas fa-search"></i></button>
            </form>
            
            
        </div>
    </main>
    <?php
        require APP_ROOT . '/views/inc/footer.php';
    ?>
</body>