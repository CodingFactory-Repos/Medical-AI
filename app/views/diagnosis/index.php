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
            <h2><?= $data['issuesResults']['Name'] ?></h2>
            <h3>Description : </h3>
            <p><?= $data['issuesResults']['Description'] ?></p>
            <h3>MedicalCondition : </h3>
            <p><?= $data['issuesResults']['MedicalCondition'] ?></p>
            <h3>PossibleSymptoms : </h3>
            <p><?= $data['issuesResults']['PossibleSymptoms'] ?></p>
            <h3>ProfName : </h3>
            <p><?= $data['issuesResults']['ProfName'] ?></p>
            <h3>Synonyms : </h3>
            <p><?= $data['issuesResults']['Synonyms'] ?></p>
            <h3>TreatmentDescription : </h3>
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