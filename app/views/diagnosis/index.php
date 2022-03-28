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
            <h2 class="diseaseName"><?= $data['issuesResults']['Name'] ?></h2>
            <h3>Description : </h3>
            <p class="diseaseDesc"><?= $data['issuesResults']['Description'] ?></pc>
            <h3> Détails : </h3>
            <p class="diseaseLongDesc"> <?= $data['issuesResults']['MedicalCondition'] ?></p>
            <h3>Symptômes possibles : </h3>
            <table class="diseaseListSymptoms">
                <?= $Symptoms = $data['issuesResults']['PossibleSymptoms'];
                echo gettype($Symptoms)
                // for ($i = 0; $i < count($Symptoms); $i++) {
                //     echo $Symptoms[$i];
                // }
                ?>
            </table>
            <h3>Nom scientifique : </h3>
            <p class="diseaseProName"><?= $data['issuesResults']['ProfName'] ?></p>
            <h3>Synonymes : </h3>
            <p class="diseaseSynonyms"><?= $data['issuesResults']['Synonyms'] ?></p>
            <h3>Traitement : </h3>
            <p class="diseaseTreatment"><?= $data['issuesResults']['TreatmentDescription'] ?></p>
        </div>
    </main>
    <?php
    require APP_ROOT . '/views/script.php';
    ?>
    <?php
    require APP_ROOT . '/views/inc/footer.php';
    ?>
</body>