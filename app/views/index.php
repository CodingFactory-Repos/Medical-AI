<?php
	require APP_ROOT . '/views/inc/head.php';
?>
<body>
    <?php
        require APP_ROOT . '/views/inc/header.php';
    ?>
    <main>
        <div class="searchbar">
            <form action="<?= URL_ROOT; ?>/search" method="post">
                <input type="text" name="search" placeholder="Search..">
                <button type="submit" name="searchBtn"><i class="fas fa-search"></i><span> Search</span></button>
            </form>
        </div>
        <div class="symptomList">
            <h2> <i class="far fa-globe-europe"></i> Popular Symptoms </h2>
            <ul>
                <li class="symptoms">
                    Cough
                </li>
                <li class="symptoms">
                    Fever
                </li>
                <li class="symptoms">
                    Stomach Aches
                </li>
                <li class="symptoms">
                    Aches and Pains
                </li>
                <li class="symptoms">
                    Headache
                </li>
                <li class="symptoms">
                    Vomiting
                </li>
            </ul>
        </div>
        <div class="infosList">
            <h2><i class="fad fa-file-medical-alt"></i> Medical News</h2>
            <div id="info">
                <img src="" alt="">
                <h3 id="articleTitle"></h3>
                <h4 id="name"></h4>
            </div>
        </div>
    </main>
    <?php
        require APP_ROOT . '/views/inc/footer.php';
    ?>
</body>