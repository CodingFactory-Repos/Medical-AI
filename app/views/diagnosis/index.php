<?php
require APP_ROOT . '/views/inc/head.php';
?>

<body>
    <?php
    require APP_ROOT . '/views/inc/header.php';
    ?>
    <main>
        <div class="diagnosisList class">
            <h2 class="class-title"><i class="fas fa-search"></i> Results</h2>
            <div class="infos class-body">
                <?php for ($i = 0; $i < count($data['diagnosisResults']); $i++) : ?>
                    <a class="info-content" href="<?= URL_ROOT ?>/diagnosis/<?= $data['diagnosisResults'][$i]['Issue']['ID'] ?>">
                        <h3><?= $data['diagnosisResults'][$i]['Issue']['Name'] ?> <span><?= round($data['diagnosisResults'][$i]['Issue']['Accuracy']) ?>%</span></h3>
                        <p><?= substr(explode(';', $data['diagnosisResults'][$i]['Issue']['IcdName'])[0], 0, 30) ?>...</p>
                    </a>
                <?php endfor; ?>
            </div>
        </div>
    </main>
    <?php
    require APP_ROOT . '/views/script.php';
    ?>
    <?php
    require APP_ROOT . '/views/inc/footer.php';
    ?>
</body>