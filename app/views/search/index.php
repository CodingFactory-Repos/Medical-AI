<?php
require APP_ROOT . '/views/inc/head.php';
?>

<body>
    <?php
    require APP_ROOT . '/views/inc/header.php';
    ?>
    <main>
        <div class="searchbar">
            <form id="searchForm">
                <input type="text" name="search" placeholder="Search for your symptoms..." id="searchBar">
                <button type="submit" name="searchBtn"><i class="fas fa-search"></i><span> Search</span></button>
            </form>
            <ul class="searchBarResults">
            </ul>
        </div>
        <div class="diagnosisList class">
            <h2 class="class-title"><i class="fas fa-search"></i> Results</h2>
            <div class="infos class-body">
                <?php for ($i = 0; $i < count($data['diagnosisResults']); $i++) : ?>
                    <a class="info-content" href="<?= URL_ROOT ?>/diagnosis/<?= $data['diagnosisResults'][$i]['Issue']['ID'] ?>">
                        <h3><?= $data['diagnosisResults'][$i]['Issue']['Name'] ?> <span><?= round($data['diagnosisResults'][$i]['Issue']['Accuracy']) ?>%</span></h3>
                        <p><?= $data['issuesResults'][$i]['DescriptionShort'] ?></p>
                    </a>
                <?php endfor; ?>

            </div>
        </div>
    </main>
    <?php
    require APP_ROOT . '/views/' . $data['scriptFile'] . '/script.php';
    ?>
    <?php
    require APP_ROOT . '/views/index/script.php';
    ?>
    <?php
    require APP_ROOT . '/views/inc/footer.php';
    ?>
</body>