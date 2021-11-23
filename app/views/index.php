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
        <div class="symptomList class">
            <h2 class="class-title"><i class="far fa-globe-europe"></i> Popular Symptoms</h2>
            <ul class="class-body">
                <?php for($i = 0; $i < count($data['symptomsRandomList']); $i++): ?>
                    <li class="symptoms" id="<?= $data['symptomsRandomList'][$i]['ID'] ?>"><?= $data['symptomsRandomList'][$i]["Name"] ?></li>
                <?php endfor; ?>
            </ul>
        </div>
        <div class="infosList class">
            <h2 class="class-title"><i class="fad fa-file-medical-alt"></i> Medical News</h2>
            <div class="infos class-body">
                <?php for ($i = 0; $i < 8; $i++) : ?>
                    <a class="infos-container" style="background: linear-gradient(rgba(0, 0, 0, 0), rgba(0, 0, 0, 1)), url('<?= $data['articles']['articles'][$i]['urlToImage'] ?>');" href="<?= $data['articles']['articles'][$i]['url'] ?>" target="_blank">
                        <img src="http://www.getfavicon.org/get.pl?url=<?= $data['articles']['articles'][$i]['url'] ?>">
                        <div class="infos-text">
                            <h3 class="articleTitle visible"><?= substr($data['articles']['articles'][$i]['title'], 0, 27) ?>...</h3>
                            <h3 class="articleTitle hidden"><?= $data['articles']['articles'][$i]['title'] ?></h3>
                            <h4 class="authorName"><?= $data['articles']['articles'][$i]['author'] ?> - <?= $data['articles']['articles'][$i]['source']['name'] ?></h4>
                        </div>
                    </a>
                <?php endfor; ?>
            </div>
        </div>
    </main>
    <?php
    require APP_ROOT . '/views/inc/footer.php';
    ?>
</body>