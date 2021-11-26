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
            <p><?= $data['issuesResults']['Name'] ?></p>
            <p><?= $data['issuesResults']['Description'] ?></p>
            <p><?= $data['issuesResults']['MedicalCondition'] ?></p>
            <p><?= $data['issuesResults']['PossibleSymptoms'] ?></p>
            <p><?= $data['issuesResults']['ProfName'] ?></p>
            <p><?= $data['issuesResults']['Synonyms'] ?></p>
            <p><?= $data['issuesResults']['TreatmentDescription'] ?></p>
        </div>
    </main>
    <?php
    require APP_ROOT . '/views/script.php';
    ?>
    <?php
    require APP_ROOT . '/views/inc/footer.php';
    ?>
</body>