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
                <p class="searchTag">Vomi <span><i class="fas fa-times"></i></span></p>
                <p class="searchTag">Vomi <span><i class="fas fa-times"></i></span></p>
                <p class="searchTag">Vomi <span><i class="fas fa-times"></i></span></p>

                <input type="text" name="search" placeholder="Search.." id="searchBar">
                <button type="submit" name="searchBtn"><i class="fas fa-search"></i><span> Search</span></button>
            </form>
            <ul class="searchBarResults">
            </ul>
        </div>
        <div class="diagnosisList class">
            <h2 class="class-title"><i class="fas fa-search"></i> Results</h2>
            <div class="infos class-body">
                <?php for ($i = 0; $i < count($data['diagnosisResults']); $i++) : ?>
                    <h3><?= $data['diagnosisResults'][$i]['Issue']['Name'] ?></h3>
                    <p><?= $data['diagnosisResults'][$i]['Issue']['Accuracy'] ?>%</p>
                <?php endfor; ?>
            </div>
        </div>
    </main>
    <?php
    require APP_ROOT . '/views/' . $data['scriptFile'] . '/script.php';
    ?>
    <?php
    require APP_ROOT . '/views/inc/footer.php';
    ?>
</body>